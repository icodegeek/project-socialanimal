<?php

require_once '../../location/util.php';
require_once $base_path . 'db/datadb.php';
require_once $base_path . 'db/connectdb.php';

session_start();

if (isset($_GET['create_aviso'])) {

  $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
  $animal = htmlspecialchars($_POST['animal'], ENT_QUOTES, 'UTF-8');
  $nombre_animal = htmlspecialchars($_POST['nombre_animal'], ENT_QUOTES, 'UTF-8');
  $raza = htmlspecialchars($_POST['raza'], ENT_QUOTES, 'UTF-8');
  $color = htmlspecialchars($_POST['color'], ENT_QUOTES, 'UTF-8');
  $edad = htmlspecialchars($_POST['edad'], ENT_QUOTES, 'UTF-8');
  $sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'UTF-8');
  $provincia = htmlspecialchars($_POST['provincia'], ENT_QUOTES, 'UTF-8');
  $localidad = htmlspecialchars($_POST['localidad'], ENT_QUOTES, 'UTF-8');
  $calle = htmlspecialchars($_POST['calle'], ENT_QUOTES, 'UTF-8');
  $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
  $sugerencia = htmlspecialchars($_POST['sugerencia'], ENT_QUOTES, 'UTF-8');
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

  $imagen_nombre = $_FILES['imagen']['name'];
  $imagen_tmp = $_FILES['imagen']['tmp_name'];
  $folder = $base_path . 'imagenes';

  move_uploaded_file($imagen_tmp, $folder . '/' . $imagen_nombre);

  $bytesArchivo = file_get_contents($folder . '/' . $imagen_nombre);

  try {

    $sql = "INSERT INTO tb_aviso (usuario_id, tipo_aviso, tipo_animal, nombre_animal, raza, color_pelo, edad, sexo, provincia, localidad, calle, fecha, sugerencia, imagen)

    VALUES (:id, :tipo_aviso, :tipo_animal, :nombre_animal, :raza, :color_pelo, :edad, :sexo, :provincia, :localidad, :calle, :fecha, :sugerencia, :imagen)";

    $ps = $pdo->prepare($sql);
    $ps->bindValue(':id', $id);
    $ps->bindValue(':tipo_aviso', $tipo);
    $ps->bindValue(':tipo_animal', $animal);
    $ps->bindValue(':nombre_animal', $nombre_animal);
    $ps->bindValue(':raza', $raza);
    $ps->bindValue(':color_pelo', $color);
    $ps->bindValue(':edad', $edad);
    $ps->bindValue(':sexo', $sexo);
    $ps->bindValue(':provincia', $provincia);
    $ps->bindValue(':localidad', $localidad);
    $ps->bindValue(':calle', $calle);
    $ps->bindValue(':fecha', $fecha);
    $ps->bindValue(':sugerencia', $sugerencia);
    $ps->bindValue(':imagen', $bytesArchivo);
    $ps->execute();

  } catch (PDOException $e) {

    die("No se ha podido guardar el usuario en la base de datos: " . $e->getMessage());

  }

  header('Location: .');

}

if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home . 'user/login');

}


require_once 'avisos.html.php';
