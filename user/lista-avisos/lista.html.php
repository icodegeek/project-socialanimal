<?php

	require_once '../../location/util.php';
	require_once $base_path.'templates/header.html.php';

  if (!isset($_SESSION['user']) ) {

    header('Location: ' . $home);
    exit();
  }

?>

  <div class="col-lg-10">
    <div class="title-lista-avisos">
      <p>Mis avisos</p>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">Lista de mis avisos</div>
      <div class="panel-body">
        <p><i>*(En ésta sección podrás ver todos los avisos que has creado,
          editarlos e incluso borrarlos).</i></p>
      </div>
			<?php if (!empty($avisos_user) ): ?>
      <table class="table tabla-avisos">
        <thead>
          <th>#Aviso</th>
          <th>Tipo Aviso</th>
          <th>Animal</th>
          <th>Nombre</th>
          <th>Raza</th>
          <th>Sexo</th>
          <th>Más datos</th>
          <th>Eliminar aviso</th>
        </thead>
        <tbody>
          <?php $count = 1; ?>
          <?php foreach ($avisos_user as $aviso_user): ?>
            <tr>
              <td><?=$count++?></td>
              <td><?=$aviso_user['tipo_aviso']?></td>
              <td><?=$aviso_user['tipo_animal']?></td>
              <?php if ($aviso_user['nombre_animal'] != NULL): ?>
                <td><?=$aviso_user['nombre_animal']?></td>
              <?php else: ?>
                <td><i>No se sabe</i></td>
              <?php endif; ?>
              <td><?=$aviso_user['raza']?></td>
              <td><?=$aviso_user['sexo']?></td>
							<td><a href="<?=$home?>aviso/?aviso&id=<?=$aviso_user['id']?>">Ir al aviso</a></td>
              <td>
                <form action="?delete" name="formdelete" method="post">
                  <input type="hidden" name="aviso_id" value="<?=$aviso_user['id']?>">
                  <button type="button" class="btn btn-link btn-delete-aviso"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
			<?php else: ?>
				<h3 style="margin-left: 15px;"><i>No tienes ningún aviso publicado.</i></h3>
			<?php endif; ?>
    </div>
  </div>
</div><!--end .row-->
</div><!--end .container-->

<script src="../../bootbox/bootbox.min.js" charset="utf-8"></script>

			<script>
        $(document).on("click", ".btn-delete-aviso", function(e) {
							bootbox.confirm("¿Estas seguro de borrar este aviso?", function(result) {
							if(result === true){
								document.forms.formdelete.submit();
							}
						});
        });
  		</script>

			<!-- <script type="text/javascript">
				function delete_msg(){
					if (confirm('¿Estás seguro de borrar de este aviso?')) {
						document.forms.formdelete.submit();
					}else{
						close();
					}
				}
			</script> -->

<?php

require_once '../../templates/footer.html.php';

?>
