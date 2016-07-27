<?php

require_once '../../location/util.php';
require_once '../../db/validacion.php';
require_once '../../db/datadb.php';
require_once '../../db/connectdb.php';

session_start();

if (isset($_GET['mod_datos']) ) {

	$nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
  $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
	$facebook = htmlspecialchars($_POST['facebook'], ENT_QUOTES, 'UTF-8');
  $twitter = htmlspecialchars($_POST['twitter'], ENT_QUOTES, 'UTF-8');
	$user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');

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

	if (!validarTelefono($telefono) ) {

      $errores['telefono']['valida'] = true;
  }

	if (empty($errores) ) {

		try {

			$sql = "UPDATE tb_usuario SET nombre = :nombre, apellidos = :apellidos, email = :email,

							telefono = :telefono, facebook = :facebook, twitter = :twitter WHERE id = :id";

							$ps = $pdo->prepare($sql);
							$ps->bindValue(':nombre', $nombre);
							$ps->bindValue(':apellidos', $apellidos);
							$ps->bindValue(':email', $email);
							$ps->bindValue(':telefono', $telefono);
							$ps->bindValue(':facebook', $facebook);
							$ps->bindValue(':twitter', $twitter);
							$ps->bindValue(':id', $user_id);
							$ps->execute();

		} catch (PDOException $e) {

				die('No se pudo modificar los datos del usuario. Error: '.$e->getMessage() );
		}

		header('Location: exito.html.php');

	}else{

		require_once 'misdatos.html.php';
		exit();
	}

}

if (isset($_GET['mod_password'])) {

	$actual_password = htmlspecialchars($_POST['actual_password'], ENT_QUOTES, 'UTF-8');
	$new_password1 = htmlspecialchars($_POST['new_password1'], ENT_QUOTES, 'UTF-8');
	$new_password2 = htmlspecialchars($_POST['new_password2'], ENT_QUOTES, 'UTF-8');
	$user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');

	$errores = [];

	if ($actual_password == "") {

		$errores['password']['vacio'] = true;

	}

	//Recupero la contraseña actual del usuario de la base de datos
		try {

			$sql = 'SELECT * FROM tb_usuario WHERE id = :id';
			$ps = $pdo->prepare($sql);
			$ps->bindValue(':id', $user_id);
			$ps->execute();

		} catch (PDOException $e) {

			die('No se pudo obtener el campo password de la base de datos. Error: '.$e->getMessage() );

		}

	$oldPass = $ps->fetch(PDO::FETCH_ASSOC);

	$contrasenia_BBDD = md5($actual_password.$salt);

	if ($oldPass['password'] != $contrasenia_BBDD) {

		$errores['password']['diferentes'] = true;
	}

	if ($new_password1 == "") {

		$errores['newpass']['vacio'] = true;
	}

	if (strlen($new_password1) < 5) {

		$errores['newpass']['longitud'] = true;
	}

	if ($new_password2 == "") {

		$errores['newpass2']['vacio'] = true;
	}

	if ($new_password1 != $new_password2) {

		$errores['coincidente'] = true;
	}

	if (empty($errores)) {

		$nuevoPassword = md5($new_password1.$salt);

		try {

			$sql = "UPDATE tb_usuario SET password = :password WHERE id = :id";

			$ps = $pdo->prepare($sql);
			$ps->bindValue(':id', $user_id);
			$ps->bindValue(':password', $nuevoPassword);
			$ps->execute();

		} catch (PDOException $e) {

			die("No se ha podido guardar la nueva contraseña del usuario en la base de datos: " . $e->getMessage());

		}

		header('Location: ' . $home . 'user/perfil/exito');

	}else{

		require_once 'misdatos.html.php';
		exit();
	}

}


if (isset($_GET['logout']) ) {

	 unset($_SESSION['user']);

	 session_destroy();

	 header('Location: ' . $home);

}


require_once 'misdatos.html.php';
