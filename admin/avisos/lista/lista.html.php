<?php

  require_once $base_path . 'admin/templates/header.html.php';

  if ($_SESSION['user']['email'] != 'admin@root.com' || $_SESSION['user']['password'] != '2e3856b7619c21b7fc8379e02cb27a7f') {

    header('Location: ' . $home . 'admin/error');
  }
 ?>

<div class="container">
  <div class="row" style="background: #CBE2E7; margin-top: -10px;">
    <h3 id="title">Lista de avisos</h3>
    <hr>
    <?php if (isset($datos_avisos)): ?>
      <?php foreach ($datos_avisos as $dato_aviso): ?>
      <div class="row">
          <div class="col-lg-5 col-lg-offset-1">
            <h3 style="margin-bottom: 35px;"><u>Aviso id="<?=$dato_aviso['id']?>"</u></h3>
            <p><strong>Tipo aviso: </strong><?=$dato_aviso['tipo_aviso']?></p>
            <p><strong>Tipo animal: </strong><?=$dato_aviso['tipo_animal']?></p>
            <p><strong>Nombre: </strong><?php echo (!empty($dato_aviso['nombre_animal'])) ? $dato_aviso['nombre_animal'] : 'No disponible'?></p>
            <p><strong>Raza: </strong><?=$dato_aviso['raza']?></p>
            <p><strong>Color de pelo: </strong><?=$dato_aviso['color_pelo']?></p>
            <p><strong>Edad: </strong><?=$dato_aviso['edad']?></p>
            <p><strong>Sexo: </strong><?=$dato_aviso['sexo']?></p>
            <p><strong>Provincia: </strong><?=$dato_aviso['provincia']?></p>
            <p><strong>Localidad: </strong><?=$dato_aviso['localidad']?></p>
            <p><strong>Calle: </strong><?=$dato_aviso['calle']?></p>
            <p><strong>Fecha: </strong><?=$dato_aviso['fecha']?></p>
            <p><strong>Sugerencia: </strong><?php echo (!empty($dato_aviso['sugerencia'])) ? $dato_aviso['sugerencia'] : 'No disponible'?></p>
            <form action="<?=$home?>admin/avisos/lista/editar/" method="post">
              <input type="hidden" name="id_aviso" value="<?=$dato_aviso['id']?>">
              <button type="submit" class="btn btn-primary btn-sm pull-left" style="margin-top: 15px;"name="button">Editar aviso</button>
            </form>
            <form action="?del_aviso" method="post">
              <input type="hidden" name="id_aviso" value="<?=$dato_aviso['id']?>">
              <button type="submit" class="btn btn-primary btn-sm pull-left" style="margin: 15px 0 0 15px;" name="button">Borrar aviso</button>
            </form>
          </div>
          <div class="col-lg-5">
            <div class="thumbnail" style="margin-top: 22px;">
    					<?php if (!empty($dato_aviso['imagen'])): ?>
    						<img class="img-responsive" src="data:image/jpg; base64, <?php echo base64_encode($dato_aviso['imagen']); ?>" alt="imagen animal" />
    					<?php else: ?>
    						<img src="<?=$home?>assets/nophoto-800x600.png" alt="Imagen no disponible" />
    					<?php endif; ?>
            </div>
          </div>
      </div>
      <hr>
      <?php endforeach; ?>
      <?php else: ?>
        <h2>*En estos momentos no existe ningún aviso en la aplicación.</h2>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
