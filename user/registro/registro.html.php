<?php

require_once '../../location/util.php';
require_once $base_path.'templates/header.html.php';

	if (isset($errores)) {

		if (!empty($errores['nombre'])) {

			$error_nombre = 'has-error';

		}else{

			$error_nombre = '';
		}

		if (!empty($errores['apellidos']) && empty($errores['nombre']) ) {

			$error_apellidos = 'has-error';

		}else{

			$error_apellidos = '';
		}

		if (!empty($errores['email']) && empty($errores['apellidos']) ) {

			$error_email = 'has-error';

		}else{

			$error_email = '';
		}

		if (!empty($errores['password']) && empty($errores['email']) ) {

			$error_password = 'has-error';

		}else{

			$error_password = '';
		}

		if ($telefono != "" && !empty($errores['telefono']) ) {

			$error_telefono = 'has-error';

		}else{

			$error_telefono = '';
		}

	}

	if (isset($_SESSION['user']) ) {

		header('Location: ' . $home);
		exit();
	}

?>



		<div class="col-lg-10">
			<div class="title-form-reg">
				<p>Formulario de registro</p>
			</div>
			<form role="form" action="?registro" method="POST">
				<div class="form-reg">
					<h3><i class="fa fa-wpforms" aria-hidden="true"></i> Rellena el formulario</h3>
					<hr>
					<div class="form-group <?=$error_nombre?>">
						<label for="nombre" class="control-label"><i class="fa fa-user" aria-hidden="true"></i> Nombre: <span style="color:red" title="Este campo es obligatorio.">*</span></label>
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre;?>">
						<?php if (isset($errores['nombre']['vacio']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Por favor, introduzca su nombre</i></p>
						<?php elseif (isset($errores['nombre']['valida']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un nombre válido</i></p>
						<?php endif; ?>
					</div>
					<div class="form-group <?=$error_apellidos?>">
						<label for="apellidos" class="control-label"><i class="fa fa-user" aria-hidden="true"></i> Apellidos: <span style="color:red" title="Este campo es obligatorio.">*</span></label>
						<input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php if(isset($apellidos)) echo $apellidos;?>">
						<?php if (isset($errores['apellidos']['vacio']) && empty($errores['nombre']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Por favor, introduzca sus apellidos</i></p>
						<?php elseif (isset($errores['apellidos']['valida']) && empty($errores['nombre']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un apellido válido</i></p>
						<?php endif; ?>
					</div>
					<div class="form-group <?=$error_email?>">
						<label for="email" class="control-label"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail: <span style="color:red" title="Este campo es obligatorio.">*</span></label>
						<input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php if(isset($email)) echo $email;?>">
						<?php if (isset($errores['email']['format'])): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un email válido</i></p>
						<?php else: ?>
							<span style="font-size: 11px"><i>Una dirección de correo electrónico válida. Todos los correos del sistema se enviaran a esta dirección.
							La dirección de correo no es pública y solamente será usada para recibir una contraseña nueva o
							para el envío de ciertas noticias y avisos.</i></span>
						<?php endif; ?>
					</div>
					<div class="form-group <?=$error_password?>">
						<label for="password1" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Password: <span style="color:red">*</span></label>
						<input type="password" name="password1" class="form-control" placeholder="Password" value="">
						<?php if (isset($errores['password']['longitud'])): ?>
							<p class="help-block" style="font-size: 11px"><i>El password debe contener al menos 5 carácteres</i></p>
						<?php endif; ?>
					</div>
					<div class="form-group <?=$error_password?>">
						<label for="password2" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Confirmar password: <span style="color:red">*</span></label>
						<input type="password" name="password2" class="form-control" placeholder="Confirmar password">
						<?php if (isset($errores['password']['diferentes']) ): ?>
							<p class="help-block" style="font-size: 11px"><i>Los password no coinciden</i></p>
						<?php else: ?>
							<span style="font-size: 11px"><i>Por favor, escribe nuevamente tu dirección de correo electrónico para confirmar que es correcto.</i></span>
						<?php endif; ?>
					</div>
					<div class="form-group <?=$error_telefono?>">
						<label for="telefono" class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> Teléfono:</label>
						<input type="tel" name="telefono" class="form-control" placeholder="Teléfono" value="<?php if(isset($telefono)) echo $telefono;?>">
						<?php if (isset($errores['telefono']['valida']) && $telefono != NULL): ?>
							<p class="help-block" style="font-size: 11px"><i>El número de teléfono introducido no es correcto</i></p>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook:</label>
						 <i>www.facebook.com/</i>
						<input type="text" name="facebook" class="form-control" placeholder="Nombre en facebook" value="<?php if(isset($facebook)) echo $facebook;?>">
					</div>
					<div class="form-group">
						<label for="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter:</label>
						<i>www.twitter.com/</i>
						<input type="text" name="twitter" class="form-control" placeholder="Nick en twitter" value="<?php if(isset($twitter)) echo $twitter;?>">
					</div>
					<div class="">
						<p><span style="color: red"><b>*</b></span><i> Datos requeridos.</i></p>
					</div>
					<button type="submit" class="btn btn-primary btn-reg">Crear cuenta</button>
				</div>
			</form>
		</div>

	</div><!--end .row-->
</div><!--end .container-->

<?php

require_once '../../templates/footer.html.php';
