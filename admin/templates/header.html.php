<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Socialanimal | Admin</title>
  <link rel="stylesheet" href="<?=$home?>css/font-awesome.min.css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="<?=$home?>css/normalize.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" media="screen" charset="utf-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" media="screen" title="no title" charset="utf-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" charset="utf-8"></script>
  <link rel="stylesheet" href="<?=$home?>admin/css/styles.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <header>
    <div class="container">
      <div class="row" id="fondo-header">
        <div class="col-lg-2">
          <img src="<?=$home?>assets/LogoSocialAnimal2.png" id="logo-admin" alt="logo admin" />
        </div>
        <div class="col-lg-10" id="titulo">
          <p><strong>Admin</strong></p>
          <form action="?logout" method="post">
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="text-center">
          <nav>
            <ul>
              <li><a href="<?=$home?>admin/usuarios"><i class="fa fa-user" aria-hidden="true"></i> Crear usuario</a></li>
              <li><a href="<?=$home?>admin/usuarios/lista"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista de usuarios</a></li>
              <li><a href="<?=$home?>admin/avisos"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Crear aviso</a></li>
              <li><a href="<?=$home?>admin/avisos/lista"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista de avisos</a></li>
              <li><a href="<?=$home?>admin/usuarios/logins"><i class="fa fa-cog" aria-hidden="true"></i> Logins</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
