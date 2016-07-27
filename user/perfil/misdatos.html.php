<?php

require_once '../../location/util.php';
require_once $base_path.'templates/header.html.php';

if (!isset($_SESSION['user'])) {

  header('Location: ' . $home);
}

if (isset($errores)) {

  if (!empty($errores['nombre'])) {

    $error_nombre = 'has-error';

  }else{

    $error_nombre = '';
  }

  if (!empty($errores['apellidos'])) {

    $error_apellidos = 'has-error';

  }else{

    $error_apellidos = '';
  }

  if (!empty($errores['email'])) {

    $error_email = 'has-error';

  }else{

    $error_email = '';
  }

  if (!empty($telefono) && !empty($errores['telefono']) ) {

    $error_telefono = 'has-error';

  }else{

    $error_telefono = '';
  }

  if (!empty($errores['password']) ) {

    $error_password = 'has-error';

  }else{

    $error_password = '';
  }

  if (!empty($errores['newpass']) ) {

    $error_newpass = 'has-error';

  }else{

    $error_newpass = '';
  }

  if (!empty($errores['newpass2']['vacio'])) {

    $error_newpass2 = 'has-error';

  }else{

    $error_newpass2 = '';
  }

}

?>


<div class="col-lg-10">
  <div class="title-form-perfil">
    <p>Mi perfil</p>
  </div>
  <div class="form-perfil">
    <h3><i class="fa fa-user" aria-hidden="true"></i> Mis datos</h3><span style="font-size: 10px;"><i>(En esta sección podrás modificar tus datos de contacto)</i></span>
    <hr>
    <br>
    <form role="form" class="form-horizontal" action="?mod_datos" method="post">
        <div class="form-group <?=$error_nombre?>">
          <label for="nombre" class="col-sm-2 control-label">Nombre:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?=$_SESSION['user']['nombre']?>">
            <?php if (isset($errores['nombre']['vacio']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Por favor, introduzca su nombre</i></p>
						<?php elseif (isset($errores['nombre']['valida']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un nombre válido</i></p>
						<?php endif; ?>
          </div>
        </div>
        <div class="form-group <?=$error_apellidos?>">
          <label for="apellidos" class="col-sm-2 control-label">Apellidos:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-10">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?=$_SESSION['user']['apellidos']?>">
            <?php if (isset($errores['apellidos']['vacio']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Por favor, introduzca sus apellidos</i></p>
						<?php elseif (isset($errores['apellidos']['valida']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un apellido válido</i></p>
						<?php endif; ?>
          </div>
        </div>
        <div class="form-group <?=$error_email?>">
          <label for="email" class="col-sm-2 control-label">E-mail:<span style="color:red" title="Este campo es obligatorio.">*</span></label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?=$_SESSION['user']['email']?>">
            <?php if (isset($errores['email']['format']) ): ?>
							<p class="help-block" style="font-size: 11px;"><i>Introduzca un email válido</i></p>
						<?php endif; ?>
          </div>
        </div>
        <div class="form-group <?=$error_telefono?>">
          <label for="telefono" class="col-sm-2 control-label">Teléfono:</label>
          <div class="col-sm-10">
            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="<?=$_SESSION['user']['telefono']?>">
            <?php if (isset($errores['telefono']['valida']) && $telefono != ""): ?>
							<p class="help-block" style="font-size: 11px"><i>El número de teléfono introducido no es correcto</i></p>
						<?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label for="facebook" class="col-sm-2 control-label">Facebook:</label>
          <div class="col-sm-10">
            <input type="text" name="facebook" class="form-control" placeholder="Nombre en Facebook" value="<?=$_SESSION['user']['facebook']?>">
          </div>
        </div>
        <div class="form-group">
          <label for="twitter" class="col-sm-2 control-label">Twitter:</label>
          <div class="col-sm-10">
            <input type="text" name="twitter" class="form-control" placeholder="Nick en twitter" value="<?=$_SESSION['user']['twitter']?>">
          </div>
        </div>
        <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
        <button type="submit" class="btn btn-primary pull-right btn-mod">Modificar datos</button>
    </form>
    <div class="mod-password">
      <p><i class="fa fa-key" aria-hidden="true"></i> ¿Deseas cambiar tu contraseña?</p>
      <hr>
      <br>
      <form class="form-horizontal" role="form" action="?mod_password" method="post">
          <div class="form-group <?=$error_password?>">
            <label for="actual_password" class="col-sm-4 control-label">Escribe tu <u>actual contraseña</u>:<span style="color: red">*</span></label>
            <div class="col-sm-8">
              <input type="password" name="actual_password" class="form-control" value="<?php if(isset($actual_password)) echo $actual_password;?>">
              <?php if (isset($errores['password']['vacio'])): ?>
                <p class="help-block" style="font-size: 11px;"><i>Introduce tu actual contraseña</i></p>
              <?php elseif(isset($errores['password']['diferentes'])): ?>
                <p class="help-block" style="font-size: 11px;"><i>La contraseña introducida no coincide con la de tu cuenta</i></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group <?=$error_newpass?>">
            <label for="new_password1" class="col-sm-4 control-label">Escribe la <u>nueva contraseña</u>:<span style="color: red">*</span></label>
            <div class="col-sm-8">
              <input type="password" name="new_password1" class="form-control" value="<?php if(isset($new_password1)) echo $new_password1;?>">
              <?php if (isset($errores['newpass']['vacio'])): ?>
                <p class="help-block" style="font-size: 11px;"><i>La nueva contraseña no puede ser vacia</i></p>
              <?php elseif (isset($errores['newpass']['longitud'])): ?>
                <p class="help-block" style="font-size: 11px;"><i>La nueva contraseña debe contener más de 4 carácteres</i></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group <?=$error_newpass2?>">
            <label for="new_password2" class="col-sm-4 control-label">Repite tu <u>nueva contraseña</u>:<span style="color: red">*</span></label>
            <div class="col-sm-8">
              <input type="password" name="new_password2" class="form-control">
              <?php if (isset($errores['newpass2'])): ?>
                <p class="help-block" style="font-size: 11px;"><i>Debes repetir tu nueva contraseña</i></p>
              <?php endif; ?>
            </div>
          </div>
          <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
          <button type="submit" class="btn btn-primary pull-right btn-mod">Cambiar contraseña</button>
      </form>
    </div>
  </div>
</div>
</div><!--end .row-->
</div><!--end .container-->

<?php

require_once '../../templates/footer.html.php';
