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

			// validar datos
			$data = Flight::request()->data;

			// Validar los datos
			$validacion = $this -> validarUsuario($data);

			// Si la validación no pasa, devolver un mensaje de error
			if ($validacion !== true) {
				Flight::json(['message' => $validacion]);
				return;
			}

			$usuario = Flight::request()->data->usuario;
			$password = Flight::request()->data->password;
			$estatus = Flight::request()->data->estatus;
			$nivel = Flight::request()->data->nivel;

			// Ejecutar la consulta de inserción
			$resultado = Flight::db()->runQuery(
				"INSERT INTO users (usuario, password, estatus, nivel) VALUES (?, ?, ?, ?)",
				[$usuario, $password, $estatus, $nivel]
			);

			// Comprobar si se insertó el registro
			if ($resultado) {
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

			// validar datos
			$data = Flight::request()->data;

			// Validar los datos
			$validacion = $this -> validarUsuario($data);

			// Si la validación no pasa, devolver un mensaje de error
			if ($validacion !== true) {
				Flight::json(['message' => $validacion]);
				return;
			}

			// Obtener los datos del cuerpo de la solicitud
			$usuario = Flight::request()->data->usuario;
			$password = Flight::request()->data->password;
			$estatus = Flight::request()->data->estatus;
			$nivel = Flight::request()->data->nivel;

			// Ejecutar la consulta de actualización
			$resultado = Flight::db()->runQuery(
				"UPDATE users SET usuario = ?, password = ?, estatus = ?, nivel = ? WHERE id = ?",
				[$usuario, $password, $estatus, $nivel, $id]
			);

			// Comprobar si se actualizó algún registro
			if ($resultado) {
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
			'message' => 'Registros eliminados: ' . $cantidad
		]);
	}

	public function validarUsuario($data) {

		// Verificar si los campos están presentes y son del tipo correcto
		if (empty($data->usuario)) {
			return "El nombre de usuario es requerido";
		}

		if (empty($data->password)) {
			return 'La contraseña es requerida';
		}

		if (!isset($data->estatus) || !in_array($data->estatus, ['activo', 'inactivo'])) {
			return "El estatus es requerido y debe ser activo o inactivo.";
		}

		if (!isset($data->nivel) || !in_array($data->nivel, ['admin', 'user'])) {
			return "El nivel es requerido y debe ser admin o user.";
		}

		// Si todas las validaciones pasan, retornar true
		return true;
	}

}
