<?php


Flight::route('/', function(){
	echo '¡Bienvenido a mi API!';
});


Flight::group('/api', function () {
    Flight::route('GET /users', ['UsuarioController', 'listar']);
    Flight::route('GET /users/@id', ['UsuarioController', 'buscar']);
    Flight::post('/users', ['UsuarioController', 'guardar']);
    Flight::put('/users/@id', ['UsuarioController', 'actualizar']);
    Flight::delete('/users/@id', ['UsuarioController', 'eliminar']);
});

