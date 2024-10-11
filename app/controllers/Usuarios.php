<?php

class UsuarioController
{


	// mostrar todos los usuarios
	public function listar()
	{
		$users = Flight::db()->fetchAll('SELECT * FROM users');
		echo Flight::json($users);
	}

	// mostrar un registro en específico
	public function buscar($id)
	{
		$db = Flight::db();
		$row = $db->fetchRow("SELECT * FROM users WHERE id = ?", [$id]);
		echo Flight::json($row);
	}

	// guardar usuario
	public function guardar()
	{

		try {
			$usuario = Flight::request()->data->usuario;
			$password = Flight::request()->data->password;
			$estatus = Flight::request()->data->estatus;
			$nivel = Flight::request()->data->nivel;

			// Ejecutar la consulta de inserción
			Flight::db()->runQuery(
				"INSERT INTO users (usuario, password, estatus, nivel) VALUES (?, ?, ?, ?)",
				[$usuario, $password, $estatus, $nivel]
			);

			// Obtener el ID del último registro insertado
			$insert_id = Flight::db()->lastInsertId();

			// Comprobar si se insertó el registro
			if ($insert_id) {
				Flight::json(['message' => 'Usuario insertado exitosamente']);
			} else {
				Flight::json(['message' => 'Error al insertar el usuario']);
			}
		} catch (Exception $e) {
			// Manejar la excepción y enviar un mensaje de error
			Flight::json(['message' => 'Error al insertar el usuario. Verifica la información que intentas guardar']);
		}
	}

	// actualizar usuario
	public function actualizar($id)
	{
		try {
			// Obtener los datos del cuerpo de la solicitud
			$usuario = Flight::request()->data->usuario;
			$password = Flight::request()->data->password;
			$estatus = Flight::request()->data->estatus;
			$nivel = Flight::request()->data->nivel;

			// Ejecutar la consulta de actualización
			$affectedRows = Flight::db()->runQuery(
				"UPDATE users SET usuario = ?, password = ?, estatus = ?, nivel = ? WHERE id = ?",
				[$usuario, $password, $estatus, $nivel, $id]
			);

			// Comprobar si se actualizó algún registro
			if ($affectedRows) {
				Flight::json(['message' => 'Usuario actualizado exitosamente']);
			} else {
				Flight::json(['message' => 'No se encontró el usuario o no se realizaron cambios']);
			}
		} catch (Exception $e) {
			// Manejar la excepción y enviar un mensaje de error
			Flight::json(['message' => 'Error al actualizar el usuario']);
		}

	}

	// borrar usuario
	public function eliminar($id)
	{
		$consulta = Flight::db()->runQuery("DELETE FROM users WHERE id = ?", [$id]);
		$cantidad = $consulta->rowCount();

		Flight::json([
			'msg' => 'Registros eliminados: ' . $cantidad
		]);
	}
}
