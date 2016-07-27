<?php

	require_once '../../../location/util.php';
	require_once $base_path.'templates/header.html.php';

?>

  <div class="col-lg-10">
    <div class="title-form-reg">
      <p>¡ENHORABUENA!</p>
    </div>
    <div class="form-reg">
			<br>
      <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #209a07">
      </i> Registro completado con éxito. <a href="<?=$home?>user/login" style="color: #000"><b><u>Inicia sesión</u></b></a> para ir a tu perfil.</p>
    </div>
  </div>

  </div><!--end .row-->
</div><!--end .container-->

<?php

require_once '../../templates/footer.html.php';
