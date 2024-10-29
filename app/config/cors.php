<?php

header('Access-Control-Allow-Origin: http://localhost:5173');
// Métodos permitidos
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// Headers permitidos
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Accept, Authorization');
// Permitir envío de credenciales (cookies, headers de autenticación)
header('Access-Control-Allow-Credentials: true');

// Manejar preflight (OPTIONS) antes de otras solicitudes
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Dar respuesta exitosa a las solicitudes OPTIONS
    header('HTTP/1.1 204 No Content');
    exit();
}

