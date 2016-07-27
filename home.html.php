<?php

	require_once 'location/util.php';
	require_once $base_path.'templates/header.html.php';

?>


		<div class="col-lg-10">
			<div class="title-home-avisos">
				<p>Últimos avisos</p>
			</div>
			<div class="row">
				<?php if (!empty($avisos)): ?>
				<?php foreach ($avisos as $aviso): ?>
						<div class="col-sm-6 col-md-4 fila-avisos">
							<div class="thumbnail">
								<?php if (!empty($aviso['imagen'])): ?>
									<a href="<?=$home?>aviso/?id=<?=$aviso['id']?>"><img src="data:image/jpg; base64, <?php echo base64_encode($aviso['imagen']); ?>" alt="imagen animal" /></a>
								<?php else: ?>
									<a href="<?=$home?>aviso/?id=<?=$aviso['id']?>"><img src="assets/nophoto-800x600.png" alt="Imagen no disponible" /></a>
								<?php endif; ?>
								<div class="caption">
									<h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?=$aviso['tipo_animal']?> <?=$aviso['tipo_aviso']?></h4>
									<hr>
									<?php if ($aviso['nombre_animal'] != NULL): ?>
										<p><strong>Nombre: </strong><?=$aviso['nombre_animal']?></p>
									<?php endif; ?>
									<p><strong>Fecha: </strong><?=$aviso['fecha']?></p>
									<p><strong>Localidad: </strong><?=$aviso['localidad']?></p>
									<p><strong>Provincia: </strong><?=$aviso['provincia']?></p>
									<hr>
									<a href="<?=$home?>aviso/?id=<?=$aviso['id']?>" class="link-detalles"><i class="fa fa-search" aria-hidden="true"></i> Más detalles</a>
									<?php if (isset($_SESSION['user'])): ?>
										<a href="<?=$home?>user/mensajes/enviar?id=<?=$aviso['usuario_id']?>" class="link-detalles pull-right"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
				<?php endforeach; ?>
				<?php elseif (!isset($_SESSION['user']))  : ?>
					<div class="col-lg-12 msg">
						<p>*No existe ningún aviso. <a href="<?=$base_url?>user/login" class="links-actions">Inicia sesión</a> o <a href="#" "lin">registrate</a> para poder crear un aviso.</p>
					</div>
				<?php else: ?>
					<div class="col-lg-12 msg">
						<p>No existe ningún aviso. Puedes crear un aviso haciendo <a href="<?=$base_url?>user/aviso" class="links-actions">Click aquí.</a></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!--end .row-->
</div><!--end .container-->

<?php

require_once 'templates/footer.html.php';
