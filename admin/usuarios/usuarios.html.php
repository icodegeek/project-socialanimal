<?php

  require_once $base_path . 'admin/templates/header.html.php';

  if ($_SESSION['user']['email'] != 'admin@root.com' || $_SESSION['user']['password'] != '2e3856b7619c21b7fc8379e02cb27a7f') {

    header('Location: ' . $home . 'admin/error');
  }

 ?>

 <div class="container">
  <div class="row" style="background: #CBE2E7; margin-top: -10px;">
    <h3 id="title">Crear usuario</h3>
    <hr>
    <div class="row form-create-user">
      <div class="col-lg-offset-1">
        <form class="form-horizontal" action="?create_user" method="post">
          <div class="form-group">
            <label for="nombre" class="col-sm-2">Nombre: </label>
            <div class="col-sm-8">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre;?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="apellidos" class="col-sm-2">Apellidos: </label>
            <div class="col-sm-8">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php if(isset($apellidos)) echo $apellidos;?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2"> E-mail: </label>
            <div class="col-sm-8">
            <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php if(isset($email)) echo $email;?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2">Password: </label>
            <div class="col-sm-8">
            <input type="password" name="password" class="form-control" placeholder="Password" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-2">Teléfono: </label>
            <div class="col-sm-8">
            <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" value="<?php if(isset($telefono)) echo $telefono;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="facebook" class="col-sm-2">Facebook: </label>
             <div class="col-sm-8">
            <input type="text" name="facebook" class="form-control" placeholder="Nombre en facebook" value="<?php if(isset($facebook)) echo $facebook;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="twitter" class="col-sm-2">Twitter: </label>
            <div class="col-sm-8">
            <input type="text" name="twitter" class="form-control" placeholder="Nick en twitter" value="<?php if(isset($twitter)) echo $twitter;?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-create-user">Crear usuario</button>
        </form>
      </div>
    </div>
  </div><!-- end .row-->
</div><!--end .container-->

</body>
</html>
