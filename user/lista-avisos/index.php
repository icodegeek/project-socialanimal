<?php

require_once '../../location/util.php';
require_once '../../db/validacion.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';


session_start();

//extraigo de la base de datos la información de los avisos que ha creado el usuario.

try {

  $usuario_id = $_SESSION['user']['id'];

  $sql = 'SELECT * FROM tb_aviso WHERE usuario_id = :usuario_id';

  $ps = $pdo->prepare($sql);
  $ps->bindValue(':usuario_id', $usuario_id);
  $ps->execute();

} catch (PDOException $e) {

  die('No se pudo obtener los avisos del usuario. Error: '. $e->getMessage() );

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $avisos_user[] = $row;

}


if (isset($_GET['delete']) ) {

  $aviso_id = htmlspecialchars($_POST['aviso_id'], ENT_QUOTES, 'UTF-8');

  if (is_numeric($aviso_id) ) {

    try {

      $sql = 'DELETE FROM tb_aviso WHERE id = :aviso_id';
      $ps = $pdo->prepare($sql);
      $ps->bindValue(':aviso_id', $aviso_id);
      $ps->execute();

    } catch (PDOException $e) {

      die("No se ha podido borrar el aviso de la base de datos:". $e->getMessage());

    }
  }

  header('Location: .');
  exit();
}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}

require_once 'lista.html.php';
