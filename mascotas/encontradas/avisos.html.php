<?php

  require_once '../../location/util.php';
  require_once $base_path.'templates/header.html.php';

 ?>


<div class="col-lg-10">
  <div class="title-aviso-encontrados">
    <p>Mascotas encontradas</p>
  </div>
  <div class="title-tipo-animal">
    <h4 style="text-align: center; color: #153535; margin-top: 35px">- Perros encontrados (<?php echo (!empty($perros_encontrados)) ? count($perros_encontrados) : '0';?>) -</h4>
    <hr>
  </div>
  <div class="row">
    <?php if (!empty($perros_encontrados)): ?>
      <?php foreach ($perros_encontrados as $perro_encontrado): ?>
        <div class="col-sm-6 col-md-4 fila-avisos">
          <div class="thumbnail">
            <?php if (!empty($perro_encontrado['imagen'])): ?>
              <a href="<?=$home?>aviso/?id=<?=$perro_encontrado['id']?>"><img src="data:image/jpg; base64, <?php echo base64_encode($perro_encontrado['imagen']); ?>" alt="imagen animal" /></a>
            <?php else: ?>
              <a href="<?=$home?>aviso/?id=<?=$perro_encontrado['id']?>"><img src="../../assets/nophoto-800x600.png" alt="Imagen no disponible" /></a>
            <?php endif; ?>
            <div class="caption">
              <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?=$perro_encontrado['tipo_animal']?> <?=$perro_encontrado['tipo_aviso']?></h4>
              <hr>
              <?php if ($perro_encontrado['nombre_animal'] != NULL): ?>
                <p><strong>Nombre: </strong><?=$perro_encontrado['nombre_animal']?></p>
              <?php endif; ?>
              <p><strong>Fecha: </strong><?=$perro_encontrado['fecha']?></p>
              <p><strong>Localidad: </strong><?=$perro_encontrado['localidad']?></p>
              <p><strong>Provincia: </strong><?=$perro_encontrado['provincia']?></p>
              <hr>
              <a href="<?=$home?>aviso/?id=<?=$perro_encontrado['id']?>" class="link-detalles"><i class="fa fa-search" aria-hidden="true"></i> Más detalles</a>
              <?php if (isset($_SESSION['user'])): ?>
                <a href="<?=$home?>user/mensajes/enviar/?id=<?=$perro_encontrado['usuario_id']?>" class="link-detalles pull-right"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
        <div class="col-lg-12">
          <p style="text-align: center"><i>*En estos momentos no existe ningún aviso de algún perro encontrado.</i></p>
        </div>
    <?php endif; ?>
  </div>
  <div class="title-tipo-animal">
    <h4 style="text-align: center; color: #153535; margin-top: 35px">- Gatos encontrados (<?php echo (!empty($gatos_encontrados)) ? count($gatos_encontrados) : '0';?>) -</h4>
    <hr>
    <div class="row">
      <?php if (!empty($gatos_encontrados)): ?>
        <?php foreach ($gatos_encontrados as $gato_encontrado): ?>
          <div class="col-sm-6 col-md-4 fila-avisos">
            <div class="thumbnail">
              <?php if (!empty($gato_encontrado['imagen'])): ?>
                <a href="<?=$home?>aviso/?id=<?=$gato_encontrado['id']?>"><img src="data:image/jpg; base64, <?php echo base64_encode($gato_encontrado['imagen']); ?>" alt="imagen animal" /></a>
              <?php else: ?>
                <a href="<?=$home?>aviso/?id=<?=$gato_encontrado['id']?>"><img src="../../assets/nophoto-800x600.png" alt="Imagen no disponible" /></a>
              <?php endif; ?>
              <div class="caption">
                <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?=$gato_encontrado['tipo_animal']?> <?=$gato_encontrado['tipo_aviso']?></h4>
                <hr>
                <?php if ($gato_encontrado['nombre_animal'] != NULL): ?>
                  <p><strong>Nombre: </strong><?=$gato_encontrado['nombre_animal']?></p>
                <?php endif; ?>
                <p><strong>Fecha: </strong><?=$gato_encontrado['fecha']?></p>
                <p><strong>Localidad: </strong><?=$gato_encontrado['localidad']?></p>
                <p><strong>Provincia: </strong><?=$gato_encontrado['provincia']?></p>
                <hr>
                <a href="<?=$home?>aviso/?id=<?=$gato_encontrado['id']?>" class="link-detalles"><i class="fa fa-search" aria-hidden="true"></i> Más detalles</a>
                <?php if (isset($_SESSION['user'])): ?>
                  <a href="<?=$home?>user/mensajes/enviar/?id=<?=$gato_encontrado['usuario_id']?>" class="link-detalles pull-right"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
          <div class="col-lg-12">
            <p style="text-align: center">*En estos momentos no existe ningún aviso de algún gato encontrado.</p>
          </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</div>

</div><!--end .row-->
</div><!--end .container-->


<?php

  require_once $base_path . 'templates/footer.html.php';
