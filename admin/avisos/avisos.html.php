<?php

  require_once $base_path . 'admin/templates/header.html.php';

  if ($_SESSION['user']['email'] != 'admin@root.com' || $_SESSION['user']['password'] != '2e3856b7619c21b7fc8379e02cb27a7f') {

    header('Location: ' . $home . 'admin/error');
  }

 ?>

 <script>
 		$( document ).ready(function() {
 				$('#fecha').datepicker({
 					format: "yyyy-mm-dd"
 				});
 		});
 </script>

<div class="container">
  <div class="row" style="background: #CBE2E7; margin-top: -10px;">
    <h3 id="title">Crear aviso</h3>
    <hr>
    <div class="col-lg-10 col-lg-offset-1">
      <form role="form" class="form-horizontal" action="?create_aviso" method="post" enctype="multipart/form-data">
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
        <br>
        <div class="form-group">
          <label for="nombre_animal" class="col-sm-3">Nombre:<span style="font-size: 10px;"><i> (Rellenar en caso de conocer el nombre del animal)</i></span></label>
          <div class="col-sm-9">
            <input type="text" name="nombre_animal" class="form-control" placeholder="Nombre del animal" value="<?php if(isset($nombre_animal)) echo $nombre_animal?>">
          </div>
        </div>
        <div class="form-group">
          <label for="raza" class="col-sm-3">Raza:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="raza" class="form-control" placeholder="Raza del animal" value="<?php if(isset($raza)) echo $raza?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="color" class="col-sm-3">Color de pelo:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="color" class="form-control" placeholder="Indica el color de pelo del animal" value="<?php if(isset($color)) echo $color?>" required>
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
        <div class="form-group">
          <br>
          <label for="imagen" class="col-sm-4">¿Tienes foto del animal?:</label>
          <div class="col-sm-8">
            <input type="file" name="imagen" value="">
          </div>
        </div>
        <br>
        <h4>¿Donde se ha perdido o se ha encontrado el animal?</h4>
        <hr>
        <div class="form-group">
          <label for="provincia" class="col-sm-3">Provincia:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="provincia" class="form-control" placeholder="Introduzca la provincia" value="<?php if (isset($provincia)) echo $provincia?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="localidad" class="col-sm-3">Localidad:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="localidad" class="form-control" placeholder="Introduzca la localidad" value="<?php if (isset($localidad)) echo $localidad?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="calle" class="col-sm-3">Calle:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="calle" class="form-control" placeholder="Introduzca la calle" value="<?php if (isset($calle)) echo $calle?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="fecha" class="col-sm-3">¿Desde cuando?:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-9">
            <input type="text" id="fecha" class="form-control" name="fecha" value="<?php if(isset($fecha)) echo $fecha?>" required>
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
        <div class="form-group">
          <label for="id" class="col-sm-3">Id Usuario:</label>
          <div class="col-sm-9">
            <input type="number" name="id" class="form-control" placeholder="Id del usuario que realiza el aviso" required>
          </div>
        </div>
        <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
        <button type="submit" style="margin: 25px 0 65px;" class="btn btn-primary pull-right">Crear aviso</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
