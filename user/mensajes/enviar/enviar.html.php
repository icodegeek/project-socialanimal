<?php

	require_once '../../../location/util.php';
	require_once $base_path.'templates/header.html.php';

?>


<div class="col-lg-10">
  <div class="title-mensajes">
    <p>Mensajería</p>
  </div>
	<div class="">
		<h4 style="margin-bottom: -10px;" class="envia-mensaje"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar mensaje</h4>
	</div>
	<hr>
	<div style="margin-top: 30px;" class="col-lg-offset-2">
	<form class="form-horizontal" action="?enviado" method="post">
		<div class="form-group">
			<label for="destinatario" class="col-sm-2">Destinatario:</label>
			<div class="col-lg-8">
			<p><?=$datos_destinatario['nombre']?> <?=$datos_destinatario['apellidos']?> (<i><?=$datos_destinatario['email']?></i>)</p>
			</div>
		</div>
		<div class="form-group">
			<label for="asunto" class="col-lg-2">Asunto:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
			<div class="col-lg-8">
				<input type="text" name="asunto" class="form-control" placeholder="Asunto del mensaje" value="<?php if (isset($asunto)) echo $asunto?>" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10">
				<label for="texto">Mensaje:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
				<textarea name="texto" class="form-control" rows="3" required><?php if(isset($texto)) echo $texto?></textarea>
			</div>
		</div>
		<input type="hidden" name="id_receptor" value="<?=$_GET['id']?>">
		<input type="hidden" name="id_emisor" value="<?=$_SESSION['user']['id']?>">
		<button style="margin-top: 10px" type="submit" class="btn btn-primary col-lg-offset-9" name="button">Enviar</button>
	</form>
	</div>
</div>



</div><!--end .row-->
</div><!--end .container-->



<?php

  require_once $base_path . 'templates/footer.html.php';
