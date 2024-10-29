<?php

// sleep( 1 );


require './app/config/cors.php';
require 'vendor/autoload.php';
require './app/controllers/Usuarios.php';
require './app/routes/routes.php';
require './app/config/bd.php';

Flight::start();
