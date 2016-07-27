<?php

  require_once '../../location/util.php';

  if (isset($_SESSION['user'])) {

    header('Location: ' . $home);
  }

  if (isset($errores)) {

    if (!empty($errores['email']) ) {

      $error_email = "has-error";

    }else{

      $error_email = " ";
    }

    if (!empty($errores['password']) && empty($errores['email']) ) {

      $error_password = 'has-error';

    }else{

      $error_password = " ";
    }

  }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Socialanimal | Login</title>
  <link rel="stylesheet" href="<?=$home?>css/font-awesome.min.css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="<?=$home?>css/normalize.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="<?=$home?>css/styles.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-4">
          <a href="<?=$home?>"><img src="<?=$home?>assets/Logo_login.png" id="logo-login" title="Logo Socialanimal" /></a>
        </div>
      </div>
    </div>
  </header>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <div class="account-wall">
              <form action="?login" method="post" class="form-signin">
              <div class="form-group <?=$error_email?>">
                <label for="email" class="control-label"><i class="fa fa-envelope" aria-hidden="true"></i> Email:</label>
                <input type="text" name="email" class="form-control" placeholder="Introduzca su email" value="<?php if (isset($email)) echo $email;?>"><br>
                <?php if ( isset($errores['email']['vacio']) ): ?>
                  <p class="help-block"><i>Por favor, Introduzca un e-mail.</i></p>
                <?php elseif (isset($errores['email']['format']) ):?>
                  <p class="help-block"><i>Por favor, Introduzca un e-mail válido.</i></p>
                <?php endif; ?>
              </div>
              <div class="form-group <?=$error_password?>">
                <label for="password" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Introduzca su password">
                <?php if ( isset($errores['password']['vacio']) && empty($errores['email'])): ?>
                  <p class="help-block" style="margin-top: -5px"><i>Por favor, Introduzca una contraseña.</i></p>
                <?php endif; ?>
                <?php if (isset($error) && empty($errores)): ?>
                  <p class="help-block"><i><span style="color: #a94442">El e-mail o la contraseña no coincide.</span></i></p>
                <?php endif; ?>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  Iniciar sesión</button>
              </form>
          </div>
        </div>
      </div>
      <div class="row">
        <p id="p-login">Red social de búsqueda de animales - 2016. <a href="<?=$home?>">&copy;Socialanimal.com</a></p>
      </div>
    </div>
</body>
</html>
