<?php

require_once '../../../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

try {

  $id_user = htmlspecialchars($_POST['id_user'], ENT_QUOTES, 'UTF-8');

  $sql = "SELECT * FROM tb_usuario WHERE id = :id_user";

  $ps = $pdo->prepare($sql);
  $ps->bindValue(':id_user', $id_user);
  $ps->execute();

} catch (PDOException $e) {

  die("No se ha podido obtener los datos de los usuarios: " . $e->getMessage());

}

$user_data = $ps->fetch(PDO::FETCH_ASSOC);


if (isset($_GET['edit_user'])) {

  $id_usuario = htmlspecialchars($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');

  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
	$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
	$facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES, 'UTF-8');
  $twitter = htmlspecialchars($_POST['twitter'], ENT_QUOTES, 'UTF-8');

  $password = md5($password.$salt);

  try {

    $sql = "UPDATE tb_usuario SET nombre = :nombre, apellidos = :apellidos, password = :password, email = :email,

            telefono = :telefono, facebook = :facebook, twitter = :twitter WHERE id = :id_usuario";

            $ps = $pdo->prepare($sql);
            $ps->bindValue(':nombre', $nombre);
            $ps->bindValue(':apellidos', $apellidos);
            $ps->bindValue(':password', $password);
            $ps->bindValue(':email', $email);
            $ps->bindValue(':telefono', $telefono);
            $ps->bindValue(':facebook', $facebook);
            $ps->bindValue(':twitter', $twitter);
            $ps->bindValue(':id_usuario', $id_usuario);
            $ps->execute();

  } catch (PDOException $e) {

      die('No se pudo modificar los datos del usuario. Error: '.$e->getMessage() );
  }

  header('Location: ' . $home . 'admin/usuarios/lista');
  exit();

}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home . 'user/login');

}


require_once 'editar.html.php';
