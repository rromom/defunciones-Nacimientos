<?= $this->extend('templates/dashboard_index') ?>

<?= $this->section('contenido') ?>

<div class="container">
  <h2 class="text-center my-3">Integrantes:</h2>

  <ul class="list-group">
    <li class="list-group-item">
    <div class="wrapper w-25 p-4">
      <img class="img-fluid float-left" src="/img/tony.jpeg" alt="">
    </div>
    <div class="float-right w-75">
      <h4>Anthony Pizarro</h4>
      <p>Estudiante de la Univeridad Politécnica Salesiana en la carrera de ingeniería en Ciencias de la Computación</p>
    </div>
      <div class="clearfix"></div>
    </li>

    <li class="list-group-item">
    <div class="wrapper w-25 p-4">
      <img class="img-fluid float-left" src="/img/andres.jpeg" alt="">
    </div>
    <div class="float-right w-75">
      <h4>Andres Ponce</h4>
      <p>Estudiante de la Univeridad Politécnica Salesiana en la carrera de ingeniería en Ciencias de la Computación</p>
    </div>
      <div class="clearfix"></div>
    </li>

    <li class="list-group-item">
    <div class="wrapper w-25 p-4">
      <img class="img-fluid float-left" src="/img/kat.jpeg" alt="">
    </div>
    <div class="float-right w-75">
      <h4>Katherine Ramirez </h4>
      <p>Estudiante de la Univeridad Politécnica Salesiana en la carrera de ingeniería en Ciencias de la Computación</p>
    </div>
      <div class="clearfix"></div>
    </li>

</ul>
</div>

<style>
  .wrapper {
    width: 128px;
    height: 128px;
  }
</style>

<?= $this->endSection() ?>