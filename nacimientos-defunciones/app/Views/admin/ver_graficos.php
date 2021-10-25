<?= $this->extend('templates/admin/dashboard_admin') ?>

<?= $this->section('contenido_admin') ?>

<div class="container">
<h1 class="text-center">GRAFICAS <small>Nacimientos</small> </h1>

<div class="row">
  <div class="col-md-12">
    <h3 class="text-center">Provincia</h3>
    <canvas id="nac-cant"></canvas>
  </div>

  <div class="col-md-6">
  <h3 class="text-center">Asistencia</h3>
    <canvas id="nac-asis"></canvas>
  </div>
  
  <div class="col-md-6">
  <h3 class="text-center">Estado civil</h3>
    <canvas id="nac-civ"></canvas>
  </div>
  
  <div class="col-md-12">
  <h3 class="text-center">Educacion</h3>
    <canvas id="nac-inst"></canvas>
  </div>

  <div class="col-md-6">
  <h3 class="text-center">Ocurrencia</h3>
    <canvas id="nac-ocu"></canvas>
  </div>
  
  <div class="col-md-6">
  <h3 class="text-center">Producto embarazo</h3>
    <canvas id="nac-prod"></canvas>
  </div>
</div>

<h1 class="text-center my-4">GRAFICAS <small>Defunciones</small> </h1>

<div class="row my-4">

  <div class="col-md-12">
  <h3 class="text-center">Provincia</h3>
      <canvas id="defs-cant"></canvas>
  </div>
  <div class="col-md-6">
  <h3 class="text-center">Top 5 Causas fetales</h3>
      <canvas id="defs-causa"></canvas>
  </div>
  <div class="col-md-6">
  <h3 class="text-center">Educacion</h3>
      <canvas id="defs-niv"></canvas>
  </div>
  <div class="col-md-12">
  <h3 class="text-center">Semana gestacion</h3>
      <canvas id="defs-sem"></canvas>
  </div>
  <div class="col-md-6">
  <h3 class="text-center">Estado civil</h3>
      <canvas id="defs-est"></canvas>
  </div>
  <div class="col-md-6">
  <h3 class="text-center">Ocurrencia</h3>
      <canvas id="defs-ocu"></canvas>
  </div>
</div>


</div>
<?= $this->endSection() ?>