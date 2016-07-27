<?php

	require_once '../../location/util.php';
	require_once $base_path.'templates/header.html.php';

	if (!isset($_SESSION['user'])) {

		header('Location: ' . $home);
	}

	if (isset($errores) ) {

		if (!empty($errores['raza']) && empty($errores['tipo']) && empty($errores['animal'])) {

			$error_raza = "has-error";

		}else{

			$error_raza = "";
		}

		if (!empty($errores['color']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza'])) {

			$error_color = "has-error";

		}else{

			$error_color = "";
		}

		if (!empty($errores['provincia']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) ) {

			$error_provincia = "has-error";

		}else{

			$error_provincia = "";
		}

		if (!empty($errores['localidad']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia'])) {

			$error_localidad = "has-error";

		}else{

			$error_localidad = "";
		}

		if (!empty($errores['calle']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia']) && empty($errores['localidad'])) {

			$error_calle = "has-error";

		}else{

			$error_calle = "";
		}

		if (!empty($errores['fecha']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia'])
		&& empty($errores['localidad']) && empty($errores['calle'])) {

			$error_fecha = "has-error";

		}else{

			$error_fecha = "";
		}

	}

?>

<!-- funcion Jquery para el campo fecha -->
<script>
		$( document ).ready(function() {
				$('#fecha').datepicker({
					format: "yyyy-mm-dd"
				});
		});
</script>

    <div class="col-lg-10">
      <div class="title-form-aviso">
        <p>Formulario de aviso</p>
      </div>
      <div class="form-aviso">
        <h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Crea un aviso</h3><span style="font-size: 10px;"><i>(En esta zona puedes crear un aviso sobre una mascota perdida o encontrada)</i></span>
        <hr>
        <form role="form" class="form-horizontal" action="?form-aviso" method="post" enctype="multipart/form-data">
          <label for="tipo" class="control-label">Tipo de aviso:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="radio">
            <label>
              <input type="radio" name="tipo" value="perdido" required <?php if(isset($tipo) && $tipo == "perdido") echo "checked"?>>Animal Perdido
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="tipo" value="encontrado" <?php if(isset($tipo) && $tipo == "encontrado") echo "checked"?>>Animal Encontrado
            </label>
          </div>
					<?php if (isset($errores['tipo']) ): ?>
						<br>
						<p style="font-size: 10px; color: red;"><b>*</b><i>Debes especificar un tipo de aviso</i></p>
					<?php endif; ?>
          <br>
          <label for="animal" class="control-label">Seleccione animal:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="radio">
            <label>
              <input type="radio" name="animal" value="perro" required <?php if(isset($animal) && $animal == "perro") echo "checked"?>>Perro
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="animal" value="gato" <?php if(isset($animal) && $animal == "gato") echo "checked"?>>Gato
            </label>
          </div>
					<?php if (isset($errores['animal']) && empty($errores['tipo'])): ?>
						<br>
						<p style="font-size: 10px; color: red;"><b>*</b><i>Debes indicar de que animal se trata</i></p>
					<?php endif; ?>
          <br>
          <div class="form-group">
            <label for="nombre_animal" class="col-sm-3">Nombre:<span style="font-size: 10px;"><i> (Rellenar en caso de conocer el nombre del animal)</i></span></label>
            <div class="col-sm-9">
              <input type="text" name="nombre_animal" class="form-control" placeholder="Nombre del animal" value="<?php if(isset($nombre_animal)) echo $nombre_animal?>">
            </div>
          </div>
          <div class="form-group <?=$error_raza?>">
            <label for="raza" class="col-sm-3">Raza:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="raza" class="form-control" placeholder="Raza del animal" value="<?php if(isset($raza)) echo $raza?>">
							<?php if (isset($errores['raza']) && empty($errores['tipo']) && empty($errores['animal'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes indicar aproximádamente la raza del animal</i></p>
							<?php endif; ?>
            </div>
          </div>
					<div class="form-group <?=$error_color?>">
						<label for="color" class="col-sm-3">Color de pelo:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="color" class="form-control" placeholder="Indica el color de pelo del animal" value="<?php if(isset($color)) echo $color?>">
							<?php if (isset($errores['color']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes indicar el color de pelo del animal</i></p>
							<?php endif; ?>
						</div>
					</div>
          <label for="edad" class="control-label">Edad:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="radio">
            <label>
              <input type="radio" name="edad" value="cachorro" required <?php if (isset($edad) && $edad == "cachorro") echo 'checked'?>>Cachorro
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="edad" value="joven" <?php if (isset($edad) && $edad == "joven") echo 'checked'?>>Joven
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="edad" value="adulto" <?php if (isset($edad) && $edad == "adulto") echo 'checked' ?>>Adulto
            </label>
          </div>
					<?php if (isset($errores['edad']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color'])): ?>
						<br>
						<p style="font-size: 10px; color: red"><b>*</b><i>Debes indicar la edad del animal</i></p>
					<?php endif; ?>
          <br>
          <label for="sexo" class="control-label">Sexo:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" value="macho"  required <?php if (isset($sexo) && $sexo == "macho") echo 'checked'?>>Macho
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" value="hembra" <?php if (isset($sexo) && $sexo == "hembra") echo 'checked'?>>Hembra
            </label>
          </div>
					<?php if (isset($errores['sexo']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad'])): ?>
						<br>
						<p style="font-size: 10px; color: red"><b>*</b><i>Debes indicar el sexo del animal</i></p>
					<?php endif; ?>
					<div class="form-group">
						<br>
						<label for="imagen" class="col-sm-4">¿Tienes foto del animal?:</label>
						<div class="col-sm-8">
							<input type="file" name="imagen" value="">
							<?php if (isset($errores['imagen'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Erro al subir la imagen. Seleccione de nuevo la imagen a enviar.</i></p>
							<?php endif; ?>
						</div>
					</div>
          <br>
          <h4>¿Donde se ha perdido o se ha encontrado el animal?</h4>
          <hr>
          <div class="form-group <?=$error_provincia?>">
            <label for="provincia" class="col-sm-3">Provincia:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="provincia" class="form-control" placeholder="Introduzca la provincia" value="<?php if (isset($provincia)) echo $provincia?>">
							<?php if (isset($errores['provincia']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes introducir la provincia donde se ha perdido o encontrado el animal</i></p>
							<?php endif; ?>
            </div>
          </div>
          <div class="form-group <?=$error_localidad?>">
            <label for="localidad" class="col-sm-3">Localidad:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="localidad" class="form-control" placeholder="Introduzca la localidad" value="<?php if (isset($localidad)) echo $localidad?>">
							<?php if (isset($errores['localidad']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes introducir la localidad donde se ha perdido o encontrado el animal</i></p>
							<?php endif; ?>
            </div>
          </div>
          <div class="form-group <?=$error_calle?>">
            <label for="calle" class="col-sm-3">Calle:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="calle" class="form-control" placeholder="Introduzca la calle" value="<?php if (isset($calle)) echo $calle?>">
							<?php if (isset($errores['calle']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia']) && empty($errores['localidad'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes introducir la calle donde se ha perdido o encontrado el animal</i></p>
							<?php endif; ?>
            </div>
          </div>
					<div class="form-group <?=$error_fecha?>">
						<label for="fecha" class="col-sm-3">¿Desde cuando?:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="fecha" class="form-control" name="fecha" value="<?php if(isset($fecha)) echo $fecha?>">
							<?php if (isset($errores['fecha']) && empty($errores['tipo']) && empty($errores['animal']) && empty($errores['raza']) && empty($errores['color']) && empty($errores['edad']) && empty($errores['sexo']) && empty($errores['provincia'])
							&& empty($errores['localidad']) && empty($errores['calle'])): ?>
								<br>
								<p style="font-size: 10px; color: red"><b>*</b><i>Debes introducir la fecha aproximada de cuando el animal desapareció o se encontró</i></p>
							<?php endif; ?>
						</div>
					</div>
					<br>
					<h4>Sugerencias</h4><span style="font-size: 10px;"><i> (Indica otras características que consideres importantes sobre el animal)</i></span>
					<hr>
					<div class="form-group">
						<div class="col-sm-12">
							<textarea class="form-control" name="sugerencia" rows="3"></textarea>
						</div>
					</div>
					<input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
					<button type="submit" class="btn btn-primary center-block btn-aviso">Enviar aviso</button>
        </form>
      </div>
    </div>
  </div><!--end .row-->
</div><!--end .container-->

<?php

require_once '../../templates/footer.html.php';
