<?= $this->extend('templates/dashboard_index') ?>

<?= $this->section('contenido') ?>

<div class="container my-3">
<h2 class="text-center">REGISTRO</h2>


<div class="row justify-content-center">
<div class="col-6 ">

<?php if (!empty($error)) { ?>
<div class="alert alert-danger">
<p><?= $error?></p>
</div>
<?php } ?>


<form action="/register" method="post">

<div class="form-group">
        <label for="name">Ingresa tu nombre:</label>
        <input type="text" name="name" id="name" class="form-control" style="border-radius: 50px;" required>
      </div>

      <div class="form-group">
        <label for="lastname">Ingresa tu apellido:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" style="border-radius: 50px;" required>
      </div>
      <div class="form-group">
        <label for="email">Ingresa tu correo:</label>
        <input type="email" name="email" id="email" class="form-control" style="border-radius: 50px;" required>
      </div>

      <div class="form-group">
        <label for="password">Ingresa tu contraseña:</label>
        <input type="password" name="password" id="password" class="form-control" style="border-radius: 50px;" required>
      </div>
      <input type="submit" value="Enviar" class="btn btn-dark btn-block mx-auto">
    </form>
</div>
</div>

</div>

<?= $this->endSection() ?>