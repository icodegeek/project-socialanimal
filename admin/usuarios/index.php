<?php

require_once '../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

if (isset($_GET['create_user']) ) {

  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
  $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
  $facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES, 'UTF-8');
  $twitter = htmlspecialchars($_POST['twitter'], ENT_QUOTES, 'UTF-8');

  $password = md5($password1.$salt);

  try {

    $sql = "INSERT INTO tb_usuario (nombre, apellidos, password, email, telefono, facebook, twitter)
            VALUES (:nombre, :apellidos, :password, :email, :telefono, :facebook, :twitter)";

            $ps = $pdo->prepare($sql);
            $ps->bindValue(':nombre', $nombre);
            $ps->bindValue(':apellidos', $apellidos);
            $ps->bindValue(':password', $password);
            $ps->bindValue(':email', $email);
            $ps->bindValue(':telefono', $telefono);
            $ps->bindValue(':facebook', $facebook);
            $ps->bindValue(':twitter', $twitter);
            $ps->execute();

  } catch (PDOException $e) {

      die("No se ha podido guardar el usuario en la base de datos: " . $e->getMessage());
  }

  header('Location: .');
  exit();
}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home . 'user/login');

}

require_once 'usuarios.html.php';
