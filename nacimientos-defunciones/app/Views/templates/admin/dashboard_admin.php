<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.css" media="screen">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/admin/consulta">INEC CONSULTs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= $active[0] ?>">
        <a class="nav-link" href="/admin/consulta">CONSULTAS</a>
      </li>
      <li class="nav-item <?= $active[1] ?>">
        <a class="nav-link" href="/admin/graficas">VER GRAFICAS</a>
      </li>
      <li class="nav-item <?= $active[2] ?>">
        <a class="nav-link" href="/admin/usuarios">GESTIONAR USUARIOS</a>
      </li>
    </ul>
  </div>
  <div class="my-2 my-lg-0">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home" >CERRAR SESION</a>
      </li>
    </ul>
</div>
</nav>

<?= $this->renderSection('contenido_admin') ?>

<footer class="d-flex flex-column bg-dark text-white text-center">
        <span>&copy; UPS - Gestion Base de Datos </span>

        <ul class="list-unstyled">
            <li>Anthony Pizarro</li>
            <li>Andres Ponce</li>
            <li>Katherine Ramiréz</li>
        </ul>
    </footer>
    <script src="/ChartJs/Chart.min.js"></script>
<script src="/main.js"></script>
</body>
</html>