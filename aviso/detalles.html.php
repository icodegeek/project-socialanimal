<?php

	require_once $base_path.'location/util.php';
	require_once $base_path.'templates/header.html.php';

?>

<!-- Script para mostrar el mapa -->

<script type="text/javascript">
	var map;
	$(document).ready(function(){
		map = new GMaps({
			div: '#map',
			lat: 37.3754865,
			lng: -6.025099,
			zoom: 15,
			zoomControl : true,
			zoomControlOpt: {
					style : 'SMALL',
					position: 'TOP_RIGHT'
			},
			panControl : true,
			streetViewControl : true,
			mapTypeControl: false
		});

		GMaps.geocode({
	  address: $('#address').val(),
	  callback: function(results, status) {
	    if (status == 'OK') {
	      var latlng = results[0].geometry.location;
	      map.setCenter(latlng.lat(), latlng.lng());
	      map.addMarker({
	        lat: latlng.lat(),
	        lng: latlng.lng()
	      	});
    		}
  		}
		});
	});
</script>

<style media="screen">

	#map{
		display: block;
		width: 100%;
		height: 395px;

		-moz-box-shadow: 0px 5px 20px #ccc;
		-webkit-box-shadow: 0px 5px 20px #ccc;
		box-shadow: 0px 5px 20px #ccc;
	}

</style>

  <div class="col-sm-10">
    <div class="title-infoaviso">
      <p>Animal <?=$avisoDatos['tipo_aviso']?></p>
    </div>
    <div class="row">
      <div class="col-sm-5 datos-aviso">
        <div class="tabla-info">
					<table class="table table-bordered">
						<caption><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Información del animal</caption>
						<tbody>
							<tr>
								<th>Tipo de mascota:</th>
								<td><?=$avisoDatos['tipo_animal']?></td>
							</tr>
							<tr>
								<th>Esta mascosta se ha:</th>
								<td><?=$avisoDatos['tipo_aviso']?></td>
							</tr>
							<?php if ($avisoDatos['nombre_animal'] != NULL ): ?>
							<tr>
								<th>Nombre:</th>
								<td><?=$avisoDatos['nombre_animal']?></td>
							</tr>
							<?php endif; ?>
							<tr>
								<th>Sexo:</th>
								<td><?=$avisoDatos['sexo']?></td>
							</tr>
							<tr>
								<th>Raza:</th>
								<td><?=$avisoDatos['raza']?></td>
							</tr>
							<tr>
								<th>Edad:</th>
								<td><?=$avisoDatos['edad']?></td>
							</tr>
							<tr>
								<th>Color de pelo:</th>
								<td><?=$avisoDatos['color_pelo']?></td>
							</tr>
							<?php if ($avisoDatos['sugerencia'] != NULL): ?>
								<tr>
									<th>Sugerencia:</th>
									<td><?=$avisoDatos['sugerencia']?></td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
        </div>
      </div>
      <div class="col-sm-8 col-sm-7 mascota-img-aviso">
        <div class="thumbnail">
					<?php if (!empty($avisoDatos['imagen'])): ?>
						<img class="img-responsive" src="data:image/jpg; base64, <?php echo base64_encode($avisoDatos['imagen']); ?>" alt="imagen animal" />
					<?php else: ?>
						<img src="../assets/nophoto-800x600.png" alt="Imagen no disponible" />
					<?php endif; ?>
        </div>
      </div>
    </div>
		<div class="row">
			<div class="local-aviso col-sm-12">
				<p class="title">¿Dónde y cuando se ha <?=$avisoDatos['tipo_aviso']?> este <?=$avisoDatos['tipo_animal']?>?</p>
				<hr>
				<p><strong>Provincia: </strong><?=$avisoDatos['provincia']?></p>
				<p><strong>Localidad: </strong><?=$avisoDatos['localidad']?></p>
				<p><strong>Calle: </strong><?=$avisoDatos['calle']?></p>
				<p><strong>Fecha en la que se ha <?=$avisoDatos['tipo_aviso']?>: </strong><?=$avisoDatos['fecha']?></p>
			</div>
			<div class="local-aviso col-sm-12">
				<p class="title">Mapa | Ubicación</p>
				<hr>
				<input type="hidden" id="address" value="<?=$avisoDatos['localidad']?> <?=$avisoDatos['calle']?>">
				<div id="map"></div>
			</div>
			<div class="local-aviso col-sm-12">
				<p class="title">¿Con quién hay que contactar?</p>
				<hr>
				<p><strong>Nombre: </strong><?=$avisoDatos['nombre']?> <?=$avisoDatos['apellidos']?></p>
				<?php if ($avisoDatos['telefono'] != NULL): ?>
					<p><strong>Telefono: </strong><?=$avisoDatos['telefono']?></p>
				<?php endif; ?>
				<p><strong>E-mail: </strong><?=$avisoDatos['email']?></p>
				<?php if ($avisoDatos['facebook'] != NULL): ?>
					<p><strong>Facebook: </strong>www.facebook.com/<?=$avisoDatos['facebook']?></p>
				<?php endif; ?>
				<?php if ($avisoDatos['twitter'] != NULL): ?>
					<p><strong>Twitter: </strong>www.twitter.com/<?=$avisoDatos['twitter']?></p>
				<?php endif; ?>
			</div>
			<div class="col-sm-12 comentarios-aviso local-aviso">
				<p class="title"><strong>Comentarios sobre el aviso:</strong></p>
				<hr>
				<?php if (!empty($comentarios)): ?>
					<?php foreach ($comentarios as $comentario): ?>
							<p><?=$comentario['texto']?></p><br>
							<p style="font-size: 12px;">Escrito por: <strong style="font-size: 12px;"><?=$comentario['nombre']?> <?=$comentario['apellidos']?></strong> <span style="font-size: 12px" class="pull-right"><i><?=$comentario['creado']?></i></span></p>
						<hr>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if (isset($_SESSION['user']) ): ?>
					<form action="?comment" method="post">
							<input type="hidden" name="aviso_id" value="<?=$_GET['id']?>">
							<input type="hidden" name="usuario_id" value="<?=$_SESSION['user']['id']?>">
							<textarea name="texto" class="form-control" required rows="5" cols="40"></textarea>
						<button type="submit" class="btn btn-primary btn-comentarios pull-right" name="button">Enviar</button>
					</form>
				<?php else: ?>
					<p><a href="<?=$home?>user/login">Inicia sesión</a> o <a href="<?=$home?>user/registro">registrate</a> para escribir comentarios sobre el aviso.</p>
				<?php endif; ?>
			</div>
		</div>
  </div>

</div><!--end .row-->
</div><!--end .container-->

<?php

require_once '../templates/footer.html.php';
