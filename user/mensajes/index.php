<?php

require_once '../../location/util.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';

session_start();

try {

	$id_user = $_SESSION['user']['id'];

	$sql = "SELECT tb_mensajes.id, tb_mensajes.usuario_remitente_id, tb_mensajes.usuario_destinatario_id,
	tb_mensajes.asunto, tb_mensajes.texto, tb_mensajes.creado, tb_usuario.nombre, tb_usuario.apellidos,
	tb_usuario.email FROM tb_mensajes INNER JOIN tb_usuario ON tb_mensajes.usuario_destinatario_id = tb_usuario.id
	WHERE usuario_destinatario_id = :id_user";

	$ps = $pdo->prepare($sql);
	$ps->bindValue(':id_user', $id_user);
	$ps->execute();

} catch (PDOException $e) {

	die('No se pudo obtener los mensajes del usuario. Error: '.$e->getMessage() );

}


while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $mensajes_recibidos[] = $row;

}

try {

	$id_user = $_SESSION['user']['id'];

	$sql = "SELECT tb_mensajes.id, tb_mensajes.usuario_remitente_id, tb_mensajes.usuario_destinatario_id,
	tb_mensajes.asunto, tb_mensajes.texto, tb_mensajes.creado, tb_usuario.nombre, tb_usuario.apellidos,
	tb_usuario.email FROM tb_mensajes INNER JOIN tb_usuario ON tb_mensajes.usuario_destinatario_id = tb_usuario.id
	WHERE usuario_remitente_id = :id_user";

	$ps = $pdo->prepare($sql);
	$ps->bindValue(':id_user', $id_user);
	$ps->execute();

} catch (PDOException $e) {

	die('No se pudo obtener los mensajes del usuario. Error: '.$e->getMessage() );

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $mensajes_enviados[] = $row;

}

//borrar mensaje recibido

if (isset($_GET['delete_recibido'])) {

	$mensaje_id = htmlspecialchars($_POST['mensaje_recibido_id'], ENT_QUOTES, 'UTF-8');

	try {

		$sql = "DELETE FROM tb_mensajes WHERE id = :mensaje_id";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':mensaje_id', $mensaje_id);
		$ps->execute();

	} catch (PDOException $e) {

		die('No se pudo borrar el mensaje. Error: '.$e->getMessage() );
	}

	header('Location: .');
	exit();

}

//borrar mensaje enviado

if (isset($_GET['delete_enviado'])) {

	$mensaje_id = htmlspecialchars($_POST['mensaje_enviado_id'], ENT_QUOTES, 'UTF-8');

	try {

		$sql = "DELETE FROM tb_mensajes WHERE id = :mensaje_id";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':mensaje_id', $mensaje_id);
		$ps->execute();

	} catch (PDOException $e) {

		die('No se pudo borrar el mensaje. Error: '.$e->getMessage() );
	}

	header('Location: .');
	exit();
}


if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}


require_once 'mensajes.html.php';
