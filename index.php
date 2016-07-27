<?php

require_once 'location/util.php';
require_once $base_path . 'db/connectdb.php';

session_start();

//Extraigo los avisos de la base de datos

try {

	$sql = 'SELECT * FROM tb_aviso ORDER BY creado DESC';
	$ps = $pdo->prepare($sql);
	$ps->execute();

} catch (PDOException $e) {

	die('No se pudo obtener los avisos de la base de datos. Error: '.$e->getMessage() );

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

	$avisos[] = $row;

}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}


require_once 'home.html.php';
