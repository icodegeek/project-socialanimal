<?php

require_once '../../location/util.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';

session_start();

//Consulta para obtener los perros perdidos de la base de datos

try {

  $sql = "SELECT * FROM tb_aviso WHERE tipo_aviso = 'perdido' AND tipo_animal = 'perro'";

  $ps = $pdo->prepare($sql);
	$ps->execute();

} catch (PDOException $e) {

  die('No se pudo obtener los avisos de perros perdidos de la base de datos. Error: '.$e->getMessage() );

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

	$perros_perdidos[] = $row;

}


//Consulta para obtener los gatos perdidos de la base de datos

try {

  $sql = "SELECT * FROM tb_aviso WHERE tipo_aviso = 'perdido' AND tipo_animal = 'gato'";

  $ps = $pdo->prepare($sql);
	$ps->execute();

} catch (PDOException $e) {

  die('No se pudo obtener los avisos de los gatos perdidos de la base de datos. Error: '.$e->getMessage() );

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

	$gatos_perdidos[] = $row;

}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}

require_once 'avisos.html.php';
