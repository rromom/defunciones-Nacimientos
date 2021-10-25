<?= $this->extend('templates/dashboard_index') ?>

<?= $this->section('contenido') ?>

<div class="container my-3">
<h2 class="text-center">Inicia sesion</h2>


<div class="row justify-content-center">
<div class="col-4 ">

<?php if (!empty($error)) { ?>
<div class="alert alert-danger">
<p><?=$error?></p>
</div>
<?php } ?>


    <form action="/login" method="post">
      <div class="form-group">
        <label for="email">Ingresa tu correo:</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>

      <div class="form-group">
        <label for="password">Ingresa tu contraseña:</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <input type="submit" value="Enviar" class="btn btn-dark btn-block mx-auto">
    </form>

</div>
</div>

</div>

<?= $this->endSection() ?>