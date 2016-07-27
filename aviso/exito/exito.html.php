<?php

	require_once $base_path. 'location/util.php';
	require_once $base_path.'templates/header.html.php';

?>

  <div class="col-lg-10">
    <div class="title-comment-envio">
      <p>Comentario enviado</p>
    </div>
    <div class="form-comment">
      <br>
      <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #209a07">
      </i> !Enhorabuena! Su comentario ha sido enviado y publicado.</p>
      <br>
      <a href="<?=$home?>aviso/?id=<?=$aviso_id?>" style="color: #153535; text-decoration: none"><i class="fa fa-arrow-left" aria-hidden="true"></i>
      <b>Volver al aviso</b></a>
    </div>
  </div>

  </div><!--end .row-->
</div><!--end .container-->

<?php

  require_once $base_path . 'templates/footer.html.php';
