<?php

require_once '../../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

try {

  $sql = "SELECT * FROM tb_usuario";

  $ps = $pdo->prepare($sql);
  $ps->execute();

} catch (PDOException $e) {

  die("No se ha podido obtener los datos de los usuarios: " . $e->getMessage());

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $datos_usuarios[] = $row;

}

if (isset($_GET['del_user'])) {

    $id_user = htmlspecialchars($_POST['id_user'], ENT_QUOTES, 'UTF-8');

    try {

      $sql = "DELETE FROM tb_usuario WHERE id = :id_user";

      $ps = $pdo->prepare($sql);
      $ps->bindValue(':id_user', $id_user);
      $ps->execute();

    } catch (PDOException $e) {

      die("No se ha podido borrar el usuario. Error: " . $e->getMessage());

    }

    header('Location: .');
    exit();
}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home . 'user/login');

}


require_once 'lista.html.php';
