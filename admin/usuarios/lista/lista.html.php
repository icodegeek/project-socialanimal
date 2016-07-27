<?php

  require_once $base_path . 'admin/templates/header.html.php';

  if ($_SESSION['user']['email'] != 'admin@root.com' || $_SESSION['user']['password'] != '2e3856b7619c21b7fc8379e02cb27a7f') {

    header('Location: ' . $home . 'admin/error');
  }

 ?>

<div class="container">
<div class="row" style="background: #CBE2E7; margin-top: -10px;">
  <h3 id="title">Lista de usuarios</h3>
  <hr>
  <div class="row">
    <?php if (isset($datos_usuarios)): ?>
      <?php foreach ($datos_usuarios as $dato_usuario): ?>
        <div class="col-lg-4">
          <div class="col-lg-offset-1">
            <h3 style="margin-bottom: 30px"><u>Usuario id="<?=$dato_usuario['id']?>"</u></h3>
            <p><strong>Nombre: </strong><?=$dato_usuario['nombre']?></p>
            <p><strong>Apellidos: </strong><?=$dato_usuario['apellidos']?></p>
            <p><strong>Password: </strong><?=$dato_usuario['password']?></p>
            <p><strong>E-mail: </strong><?=$dato_usuario['email']?></p>
            <p><strong>Teléfono: </strong><?php echo (isset($dato_usuario['telefono'])) ? $dato_usuario['telefono'] : 'No disponible'?></p>
            <p><strong>Facebook: </strong><?php echo (isset($dato_usuario['facebook'])) ? $dato_usuario['facebook'] : 'No disponible'?></p>
            <p><strong>Twitter: </strong><?php echo (isset($dato_usuario['twitter'])) ? $dato_usuario['twitter'] : 'No disponible'?></p>
            <p><strong>Fecha/Hora de alta:</strong> <?=$dato_usuario['alta']?></p>
            <form action="<?=$home?>admin/usuarios/lista/editar/" method="post">
              <input type="hidden" name="id_user" value="<?=$dato_usuario['id']?>">
              <button type="submit" class="btn btn-primary btn-sm btn-mod-user pull-left" name="button">Editar datos</button>
            </form>
            <form class="" action="?del_user" method="post">
              <input type="hidden" name="id_user" value="<?=$dato_usuario['id']?>">
              <button type="submit" class="btn btn-primary btn-sm btn-del-user pull-left" style="margin: 15px 0 0 15px" name="button">Borrar usuario</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
        <h2>*En estos momentos no existe ningún usuario registrado en la aplicación.</h2>
    <?php endif; ?>
  </div>
</div>
</div><!--end .container-->

</body>
</html>
