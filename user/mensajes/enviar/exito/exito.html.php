<?php

	require_once '../../../../location/util.php';
	require_once $base_path.'templates/header.html.php';

?>

<div class="col-lg-10">
  <div class="title-form-aviso">
    <p>Mensaje enviado</p>
  </div>
  <div style="padding-top: 20px;" class="form-aviso">
    <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #209a07">
    </i> ¡Enhorabuena! Tu mensaje se ha enviado a su destinatario.</p>
    <br>
    <a href="<?=$home?>" style="color: #000"><i class="fa fa-home" aria-hidden="true"></i> <b><u>Ir a Home</u></b></a>
  </div>
</div>

</div><!--end .row-->
</div><!--end .container-->

<?php

require_once $base_path.'templates/footer.html.php';
