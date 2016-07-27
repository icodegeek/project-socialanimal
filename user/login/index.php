<?php

require_once '../../location/util.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';
require_once '../../db/usuarios.php';

session_start();

if ( isset($_GET['login']) ) {

  $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
  $password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

  $errores = [];

  if ($email == "") {

    $errores['email']['vacio'] = true;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errores['email']['format'] = true;
  }

  if ($password == "") {

    $errores['password']['vacio'] = true;
  }

  $usuario = usuarioLogin($email, $password);

  if ( $usuario ) {

    $_SESSION['user'] = [

      'id' => $usuario['id'],
      'nombre' => $usuario['nombre'],
      'apellidos' => $usuario['apellidos'],
      'password' => $usuario['password'],
      'email' => $usuario['email'],
      'telefono' => $usuario['telefono'],
      'facebook' => $usuario['facebook'],
      'twitter' => $usuario['twitter']

    ];

    // /*La función verifica si la conexión se realiza desde un proxy o desde un IP compartido y
    // según el resultado nos devuelve el valor del IP.*/
    //
    // function getRealIP() {
    //
    //     if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    //     if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     return $_SERVER['REMOTE_ADDR'];
    //   }

    try {

      $sql = "INSERT INTO tb_login (usuario_id, ip, navegador) VALUES (:usuario_id, :ip, :navegador)";

      $ps = $pdo->prepare($sql);
      $ps->bindValue(':usuario_id', $_SESSION['user']['id']);
      $ps->bindValue(':ip', $_SERVER['REMOTE_ADDR']);
      $ps->bindValue(':navegador', $_SERVER['HTTP_USER_AGENT']);
      $ps->execute();


    } catch (PDOException $e) {

      die("No se ha podido guardar los datos de login en la base de datos: " . $e->getMessage());

    }


    if ($_SESSION['user']['email'] == 'admin@root.com' && $_SESSION['user']['password'] == '2e3856b7619c21b7fc8379e02cb27a7f') {

      header('Location: ' . $home . 'admin');
      exit();

    }else{

      header('Location: ' . $home);
      exit();
    }


  }else{

    $error = [];
  }

}

require_once 'login.html.php';
