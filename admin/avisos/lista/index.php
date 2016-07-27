<?php

require_once '../../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

try {

  $sql = "SELECT * FROM tb_aviso";

  $ps = $pdo->prepare($sql);
  $ps->execute();

} catch (PDOException $e) {

  die("No se ha podido obtener los datos de los avisos: " . $e->getMessage());

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $datos_avisos[] = $row;

}

if (isset($_GET['del_aviso'])) {

  $id_aviso = htmlspecialchars($_POST['id_aviso'], ENT_QUOTES, 'UTF-8');

  try {

    $sql = "DELETE FROM tb_aviso WHERE id = :id_aviso";

    $ps = $pdo->prepare($sql);
    $ps->bindValue(':id_aviso', $id_aviso);
    $ps->execute();

  } catch (PDOException $e) {

    die("No se ha podido borrar el aviso. Error: " . $e->getMessage());

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
