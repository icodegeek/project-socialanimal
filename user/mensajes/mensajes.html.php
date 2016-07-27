<?php

  require_once '../../location/util.php';
  require_once $base_path.'templates/header.html.php';

 ?>



<div class="col-lg-10">
  <div class="title-mensajes">
    <p>Mis mensajes</p>
  </div>
  <div class="menu-msg">
      <table class="table table-bordered">
        <caption><h4>Mensajes recibidos</h4></caption>
        <?php if (!empty($mensajes_recibidos)): ?>
        <thead>
          <th>#Mensaje</th>
          <th>Fecha/Hora</th>
          <th>Remitente</th>
          <th>Asunto</th>
          <th>Mensaje</th>
          <th>Borrar mensaje</th>
        </thead>
        <tbody>
          <?php $count = 1; ?>
          <?php foreach ($mensajes_recibidos as $mensaje_recibido): ?>
            <tr>
              <td><?=$count++?></td>
              <td><?=$mensaje_recibido['creado']?></td>
              <td><?=$mensaje_recibido['usuario_remitente_id']?></td>
              <td><?=$mensaje_recibido['asunto']?></td>
              <td><?=$mensaje_recibido['texto']?></td>
              <td>
                <form action="?delete_recibido" name="formdelete_recibido" method="post">
                  <input type="hidden" name="mensaje_recibido_id" value="<?=$mensaje_recibido['id']?>">
                  <button type="button" class="btn btn-link btn-delete-recibido"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <?php else: ?>
          <tbody>
            <tr>
              <td><i>*En estos momentos no tienes ningún mensaje recibido.</i></td>
            </tr>
          </tbody>
        <?php endif; ?>
      </table>
  </div>
  <div class="menu-msg">
    <table class="table table-bordered">
      <caption><h4>Mensajes enviados</h4></caption>
      <?php if (!empty($mensajes_enviados)): ?>
      <thead>
        <th>#Mensaje</th>
        <th>Fecha/Hora</th>
        <th>Destinatario</th>
        <th>Asunto</th>
        <th>Mensaje</th>
        <th>Borrar mensaje</th>
      </thead>
      <tbody>
        <?php $count = 1; ?>
        <?php foreach ($mensajes_enviados as $mensaje_enviado): ?>
          <tr>
            <td><?=$count++?></td>
            <td><?=$mensaje_enviado['creado']?></td>
            <td><?=$mensaje_enviado['nombre']?> <?=$mensaje_enviado['apellidos']?></td>
            <td><?=$mensaje_enviado['asunto']?></td>
            <td><?=$mensaje_enviado['texto']?></td>
            <td>
              <form action="?delete_enviado" name="formdelete_enviado" method="post">
                <input type="hidden" name="mensaje_enviado_id" value="<?=$mensaje_enviado['id']?>">
                <button type="button" class="btn btn-link btn-delete-enviado"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <?php else: ?>
        <tbody>
          <tr>
            <td><i>*No has enviado todavía ningún mensaje.</i></td>
          </tr>
        </tbody>
      <?php endif; ?>
    </table>
  </div>
</div>


</div><!--end .row-->
</div><!--end .container-->


<script src="../../bootbox/bootbox.min.js" charset="utf-8"></script>

			<script type="text/javascript">
        $(document).on("click", ".btn-delete-recibido", function(e) {
							bootbox.confirm("¿Estas seguro de borrar este mensaje?", function(result) {
							if(result === true){
								document.forms.formdelete_recibido.submit();
							}
						});
        });
  		</script>

      <script type="text/javascript">
        $(document).on("click", ".btn-delete-enviado", function(e) {
              bootbox.confirm("¿Estas seguro de borrar este mensaje?", function(result) {
              if(result === true){
                document.forms.formdelete_enviado.submit();
              }
            });
        });
      </script>

 <?php

   require_once $base_path . 'templates/footer.html.php';
