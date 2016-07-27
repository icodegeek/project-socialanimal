<?php

require_once '../../../location/util.php';
require_once '../../../db/validacion.php';
require_once '../../../db/datadb.php';
require_once '../../../db/connectdb.php';

session_start();

// Cerrar la sesión

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}

require_once 'exito.html.php';
