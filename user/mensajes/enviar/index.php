<?php

require_once '../../../location/util.php';
require_once '../../../db/datadb.php';
require_once '../../../db/connectdb.php';

session_start();


$destino_id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

try {

	$sql = "SELECT * FROM tb_usuario WHERE id = :id";

	$ps = $pdo->prepare($sql);
	$ps->bindValue(':id', $destino_id);
	$ps->execute();

} catch (PDOException $e) {

	die('No se pudo obtener los datos del usuario. Error: '.$e->getMessage() );

}

$datos_destinatario = $ps->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['enviado'])) {

	$id_receptor = htmlspecialchars($_POST['id_receptor'], ENT_QUOTES, 'UTF-8');
	$id_emisor = htmlspecialchars($_POST['id_emisor'], ENT_QUOTES, 'UTF-8');
	$asunto = htmlspecialchars($_POST['asunto'], ENT_QUOTES, 'UTF-8');
	$texto= htmlspecialchars($_POST['texto'], ENT_QUOTES, 'UTF-8');

	$errores = [];

	if ($asunto == "") {

		$errores['asunto'] = true;
	}

	if ($texto == "") {

		$errores['texto'] = true;
	}

	if (empty($errores)) {

		try {

			$sql = "INSERT INTO tb_mensajes (usuario_remitente_id, usuario_destinatario_id, asunto, texto)

							VALUES (:usuario_remitente_id, :usuario_destinatario_id, :asunto, :texto)";

			$ps = $pdo->prepare($sql);
			$ps->bindValue(':usuario_remitente_id', $id_emisor);
			$ps->bindValue(':usuario_destinatario_id', $id_receptor);
			$ps->bindValue(':asunto', $asunto);
			$ps->bindValue(':texto', $texto);
			$ps->execute();

		} catch (PDOException $e) {

			die("No se ha podido guardar el mensaje en la base de datos: " . $e->getMessage());

		}

		header('Location: ' . $home . 'user/mensajes/enviar/exito');
		exit();

	}else{

		require_once 'enviar.html.php';
		exit();
	}

}


if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}


require_once 'enviar.html.php';
