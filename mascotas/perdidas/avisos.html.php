<?php

  require_once '../../location/util.php';
  require_once $base_path.'templates/header.html.php';

 ?>

<div class="col-lg-10">
  <div class="title-aviso-perdidos">
    <p>Mascotas perdidas</p>
  </div>
  <div class="title-tipo-animal">
    <h4 style="text-align: center; color: #153535; margin-top: 35px">- Perros perdidos (<?php echo (!empty($perros_perdidos)) ? count($perros_perdidos) : '0';?>) -</h4>
    <hr>
  </div>
  <div class="row">
    <?php if (!empty($perros_perdidos)): ?>
      <?php foreach ($perros_perdidos as $perro_perdido): ?>
        <div class="col-sm-6 col-md-4 fila-avisos">
          <div class="thumbnail">
            <?php if (!empty($perro_perdido['imagen'])): ?>
              <a href="<?=$home?>aviso/?id=<?=$perro_perdido['id']?>"><img src="data:image/jpg; base64, <?php echo base64_encode($perro_perdido['imagen']); ?>" alt="imagen animal" /></a>
            <?php else: ?>
              <a href="<?=$home?>aviso/?id=<?=$perro_perdido['id']?>"><img src="../../assets/nophoto-800x600.png" alt="Imagen no disponible" /></a>
            <?php endif; ?>
            <div class="caption">
              <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?=$perro_perdido['tipo_animal']?> <?=$perro_perdido['tipo_aviso']?></h4>
              <hr>
              <?php if ($perro_perdido['nombre_animal'] != NULL): ?>
                <p><strong>Nombre: </strong><?=$perro_perdido['nombre_animal']?></p>
              <?php endif; ?>
              <p><strong>Fecha: </strong><?=$perro_perdido['fecha']?></p>
              <p><strong>Localidad: </strong><?=$perro_perdido['localidad']?></p>
              <p><strong>Provincia: </strong><?=$perro_perdido['provincia']?></p>
              <hr>
              <a href="<?=$home?>aviso/?id=<?=$perro_perdido['id']?>" class="link-detalles"><i class="fa fa-search" aria-hidden="true"></i> Más detalles</a>
              <?php if (isset($_SESSION['user'])): ?>
                <a href="<?=$home?>user/mensajes/enviar/?id=<?=$perro_perdido['usuario_id']?>" class="link-detalles pull-right"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
        <div class="col-lg-12">
          <p style="text-align: center"><i>*En estos momentos no existe ningún aviso de algún perro perdido.</i></p>
        </div>
    <?php endif; ?>
  </div>
  <div class="title-tipo-animal">
    <h4 style="text-align: center; color: #153535; margin-top: 35px">- Gatos perdidos (<?php echo (!empty($gatos_perdidos)) ? count($gatos_perdidos) : '0';?>) -</h4>
    <hr>
    <div class="row">
      <?php if (!empty($gatos_perdidos)): ?>
        <?php foreach ($gatos_perdidos as $gato_perdido): ?>
          <div class="col-sm-6 col-md-4 fila-avisos">
            <div class="thumbnail">
              <?php if (!empty($gato_perdido['imagen'])): ?>
                <a href="<?=$home?>aviso/?id=<?=$gato_perdido['id']?>"><img src="data:image/jpg; base64, <?php echo base64_encode($gato_perdido['imagen']); ?>" alt="imagen animal" /></a>
              <?php else: ?>
                <a href="<?=$home?>aviso/?id=<?=$gato_perdido['id']?>"><img src="../../assets/nophoto-800x600.png" alt="Imagen no disponible" /></a>
              <?php endif; ?>
              <div class="caption">
                <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?=$gato_perdido['tipo_animal']?> <?=$gato_perdido['tipo_aviso']?></h4>
                <hr>
                <?php if ($gato_perdido['nombre_animal'] != NULL): ?>
                  <p><strong>Nombre: </strong><?=$gato_perdido['nombre_animal']?></p>
                <?php endif; ?>
                <p><strong>Fecha: </strong><?=$gato_perdido['fecha']?></p>
                <p><strong>Localidad: </strong><?=$gato_perdido['localidad']?></p>
                <p><strong>Provincia: </strong><?=$gato_perdido['provincia']?></p>
                <hr>
                <a href="<?=$home?>aviso/?id=<?=$gato_perdido['id']?>" class="link-detalles"><i class="fa fa-search" aria-hidden="true"></i> Más detalles</a>
                <?php if (isset($_SESSION['user'])): ?>
                  <a href="<?=$home?>user/mensajes/enviar/?id=<?=$gato_perdido['id']?>" class="link-detalles pull-right"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
          <div class="col-lg-12">
            <p style="text-align: center">*En estos momentos no existe ningún aviso de algún gato perdido.</p>
          </div>
      <?php endif; ?>
    </div>
  </div>
</div>

</div><!--end .row-->
</div><!--end .container-->

<?php

  require_once $base_path . 'templates/footer.html.php';
