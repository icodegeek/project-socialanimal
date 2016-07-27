<?php

	require_once '../../../location/util.php';
	require_once $base_path .'templates/header.html.php';

?>

  <div class="col-lg-10">
    <div class="title-form-reg">
      <p>Datos de perfil modificados</p>
    </div>
    <div class="form-reg">
			<br>
      <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #209a07">
      </i> Los datos de tu perfil han sido modificados satisfactoriamente.</p>
      <br>
      <a href="<?=$home?>" style="color: #153535; text-decoration: none"><i class="fa fa-home" aria-hidden="true"></i> <b>Ir a Home</b></a>
    </div>
  </div>

  </div><!--end .row-->
</div><!--end .container-->

<?php

require_once $base_path . 'templates/footer.html.php';
