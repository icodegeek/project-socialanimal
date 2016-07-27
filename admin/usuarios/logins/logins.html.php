<?php

  require_once $base_path . 'admin/templates/header.html.php';

  if ($_SESSION['user']['email'] != 'admin@root.com' || $_SESSION['user']['password'] != '2e3856b7619c21b7fc8379e02cb27a7f') {

    header('Location: ' . $home . 'admin/error');
  }

 ?>

<div class="container">
  <div class="row" style="background: #CBE2E7; margin-top: -10px;">
    <h3 id="title">Logins</h3>
    <hr>
    <div class="row">
      <?php foreach ($datos_logins as $dato_login): ?>
        <div class="col-lg-4" style="margin-bottom: 25px">
          <div class="col-lg-offset-1">
            <h3 style="margin-bottom: 30px"><u>Conexión id="<?=$dato_login['id']?>"</u></h3>
            <p><strong>Id Usuario: </strong><?=$dato_login['usuario_id']?></p>
            <p><strong>Ip: </strong><?=$dato_login['ip']?></p>
            <p><strong>Navegador: </strong><?=$dato_login['navegador']?></p>
            <p><strong>Conexión: </strong><?=$dato_login['conexion']?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

</body>
</html>
