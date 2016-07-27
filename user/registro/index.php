<?php

require_once '../../location/util.php';
require_once '../../db/validacion.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';

session_start();

if ( isset($_GET['registro']) ) {

  $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $password1 = htmlspecialchars($_POST['password1'], ENT_QUOTES, 'UTF-8');
  $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES, 'UTF-8');
  $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
  $facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES, 'UTF-8');
  $twitter = htmlspecialchars($_POST['twitter'], ENT_QUOTES, 'UTF-8');

  $errores = [];

  if ($nombre == "") {

      $errores['nombre']['vacio'] = true;
  }

  if (!validarUsuario($nombre) ) {

      $errores['nombre']['valida'] = true;
  }

  if ($apellidos == "") {

      $errores['apellidos']['vacio'] = true;
  }

  if (!validarUsuario($apellidos)) {

      $errores['apellidos']['valida'] = true;
  }

  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {

      $errores['email']['format'] = true;
  }

  if (strlen($password1) < 5){

      $errores['password']['longitud'] = true;
  }

  if($password1 != $password2){

      $errores['password']['diferentes'] = true;
  }

  if (!validarTelefono($telefono) ) {

      $errores['telefono']['valida'] = true;
  }

  if (empty($errores) ) {

    //Guardo el HASH de la contraseña
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

    header('Location: ' . $home . 'user/registro/exito');

  }else{

    require_once 'registro.html.php';
    exit();
  }

}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}


require_once 'registro.html.php';
