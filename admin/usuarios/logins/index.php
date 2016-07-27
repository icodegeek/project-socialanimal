<?php

require_once '../../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

try {

  $sql = "SELECT * FROM tb_login";

  $ps = $pdo->prepare($sql);
  $ps->execute();

} catch (PDOException $e) {

  die("No se ha podido obtener los datos de los logins de usuarios: " . $e->getMessage());

}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {

  $datos_logins[] = $row;

}



if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home . 'user/login');

}



require_once 'logins.html.php';
