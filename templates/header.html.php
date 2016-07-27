<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Socialanimal | Buscando a tu mascota</title>
  <link rel="stylesheet" href="<?=$home?>css/font-awesome.min.css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="<?=$home?>css/normalize.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" media="screen" charset="utf-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js" charset="utf-8"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="../js/gmaps.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" media="screen" title="no title" charset="utf-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" charset="utf-8"></script>
  <link rel="stylesheet" href="<?=$home?>css/styles.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" charset="utf-8"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
  <header>

    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        <a href="<?=$home?>"><img src="<?=$home?>assets/Logo_home.png" id="logo-home" title="Logo Socialanimal" /></a>
        </div>
        <div class="col-lg-6">
          <img src="<?=$home?>assets/banner.jpg" id="banner" alt="" />
        </div>
        <?php if (isset($_SESSION['user'])): ?>
          <div class="col-lg-3" id="login">
              <p><i class="fa fa-user" aria-hidden="true"></i> Bienvenido/a <b><?=$_SESSION['user']['nombre']?> <?=$_SESSION['user']['apellidos']?></b>!
                <form action="?logout" method="post">
                  <button type="submit" class="btn btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</button>
                </form>
              </p>
            <div class="div-boton-aviso" style="margin: 30px 0 -35px;">
              <a href="<?=$home?>user/aviso" id="btn-link-aviso">Crear aviso</a>
            </div>
            <div>
              <ul class="soc">
                  <li><a class="soc-facebook" href="https://www.facebook.com/"></a></li>
                  <li><a class="soc-twitter" href="https://twitter.com/"></a></li>
                  <li><a class="soc-google" href="https://plus.google.com"></a></li>
                  <li><a class="soc-tumblr soc-icon-last" href="https://www.tumblr.com/"></a></li>
              </ul>
            </div>
          </div><!-- end .col-lg-3-->
        </div><!-- end .row-->
        <div class="row">
          <div class="text-center">
            <nav>
              <ul>
                <li><a href="<?=$home?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="<?=$home?>mascotas/perdidas"><i class="fa fa-search" aria-hidden="true"></i> Mascotas Perdidas</a></li>
                <li><a href="<?=$home?>mascotas/encontradas"><i class="fa fa-paw" aria-hidden="true"></i> Mascotas Encontradas</a></li>
                <li><a href="<?=$home?>user/lista-avisos"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Mis Avisos</a></li>
                <li><a href="<?=$home?>user/mensajes"><i class="fa fa-envelope" aria-hidden="true"></i> Mis mensajes</a></li>
                <li><a href="<?=$home?>user/perfil"><i class="fa fa-user" aria-hidden="true"></i> Mi Perfil</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div><!--end container-->
    </header>
        <?php else: ?>
        <div class="col-lg-3" id="login">
          <a href="<?=$home?>user/login" id="link-sesion">Inicia Sesión </a>||
          <a href="<?=$home?>user/registro" id="link-registro"> Regístrate</a>
          <div style="margin-top: 37px;">
            <p style="font-size: 15px;">¡<strong>Regístrate</strong> o <strong>inicia sesión</strong> para poder crear un aviso!</p>
          </div>
          <div>
            <ul class="soc" style="margin-top: 45px">
                <li><a class="soc-facebook" href="https://www.facebook.com/"></a></li>
                <li><a class="soc-twitter" href="https://twitter.com/"></a></li>
                <li><a class="soc-google" href="https://plus.google.com"></a></li>
                <li><a class="soc-tumblr soc-icon-last" href="https://www.tumblr.com/"></a></li>
            </ul>
          </div>
        </div><!-- end .col-lg-3-->
      </div><!-- end .row-->
      <div class="row">
        <div class="text-center">
          <nav>
            <ul>
              <li><a href="<?=$home?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
              <li><a href="<?=$home?>mascotas/perdidas"><i class="fa fa-search" aria-hidden="true"></i> Mascotas Perdidas</a></li>
              <li><a href="<?=$home?>mascotas/encontradas"><i class="fa fa-paw" aria-hidden="true"></i> Mascotas Encontradas</a></li>
              <li><a href="<?=$home?>user/registro"><i class="fa fa-wpforms" aria-hidden="true"></i> Regístrate</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div><!--end container-->
  </header>
    <?php endif; ?>

    <div class="container">
      <div class="row">
        <aside class="col-lg-2">
          <div class="sidebar">
            <h5>Links de interés</h5>
            <div class="">
              <p>Especialidades Médicas</p>
            </div>
            <div class="">
              <ul>
                <li><a href="http://topveterinarios.com/veterinarios-en/sevilla-sevilla/6150">Veterinarios</a></li>
                <li><a href="http://www.cediagvet.com/">Centros de diagnóstico</a></li>
                <li><a href="http://www.paginasamarillas.es/laboratorio-veterinario/all-ma/sevilla/all-is/all-ci/all-ba/all-pu/all-nc/1">Laboratorios</a></li>
              </ul>
            </div>
            <div class="">
              <p>Servicios</p>
            </div>
            <div class="">
              <ul>
                <li><a href="http://paseadordeperros.com/es/sevilla/">Paseadores</a></li>
                <li><a href="http://www.mascotify.es/peluquerias-en-Sevilla.html">Peluquerías</a></li>
                <li><a href="http://www.adiestradorescaninos.es/">Adiestradores</a></li>
                <li><a href="#">Traslados</a></li>
              </ul>
            </div>
          </div>
        </aside>
