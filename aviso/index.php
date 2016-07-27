<?php

require_once '../location/util.php';
require_once '../db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

if (isset($_GET['id'])) {

	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

	try {

		$sql = 'SELECT * FROM tb_aviso INNER JOIN tb_usuario ON tb_aviso.usuario_id = tb_usuario.id

		WHERE tb_aviso.id = :aviso_id';

		$ps = $pdo->prepare($sql);
		$ps->bindValue(':aviso_id', $id);
		$ps->execute();

	} catch (PDOException $e) {

		die('No se pudo obtener el aviso de la base de datos. Error: '.$e->getMessage() );

	}

	$avisoDatos = $ps->fetch(PDO::FETCH_ASSOC);

	//Consulta para obtener los comentarios de los avisos

	try {

		$aviso_id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

		$sql = "SELECT * FROM tb_comentarios INNER JOIN tb_usuario ON tb_comentarios.usuario_id = tb_usuario.id WHERE aviso_id = :aviso_id";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':aviso_id', $aviso_id);
		$ps->execute();

	} catch (PDOException $e) {

		die('No se pudo obtener los comentarios de la base de datos. Error: '.$e->getMessage() );

	}

	while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {

	  $comentarios[] = $row;

	}

	require_once 'detalles.html.php';
	exit();

}

if (isset($_GET['comment']) ) {

	$usuario_id = htmlspecialchars($_POST['usuario_id'], ENT_QUOTES, 'UTF-8');
	$aviso_id = htmlspecialchars($_POST['aviso_id'], ENT_QUOTES, 'UTF-8');
	$texto = htmlspecialchars($_POST['texto'], ENT_QUOTES, 'UTF-8');

	$error = [];

	if ($texto == "") {

		$error['texto']= true;
	}

	if (empty($error)) {

		try {

			$sql = "INSERT INTO tb_comentarios (usuario_id, aviso_id, texto) VALUES (:usuario_id, :aviso_id, :texto)";

			$ps = $pdo->prepare($sql);
			$ps->bindValue(':usuario_id', $usuario_id);
			$ps->bindValue(':aviso_id', $aviso_id);
			$ps->bindValue(':texto', $texto);
			$ps->execute();

		} catch (PDOException $e) {

			die('No se pudo insertar los datos en la base de datos. Error: '.$e->getMessage() );

		}

		require_once 'exito/exito.html.php';
		exit();

	}else {

		require_once 'detalles.html.php';
		exit();
	}

}


if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}

require_once 'detalles.html.php';
