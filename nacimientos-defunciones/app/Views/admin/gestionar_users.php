<?= $this->extend('templates/admin/dashboard_admin') ?>

<?= $this->section('contenido_admin') ?>

<div class="container">
<h2 class="text-center my-4">Gestion de usuarios</h2>

<table class="table table-hover text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Rol</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>

    <tr>
      <td><?= $user->id?></td>
      <td><?= $user->name?></td>
      <td><?= $user->lastname?></td>
      <td><?= $user->email?></td>
      <td><?= $user->role?></td>
      <td>
        <?php if($user->role != 'ROLE_ADMIN'): ?>

          <form action="/admin/eliminar/<?=$user->id?>" method="delete">
            <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
          </form>
        <?php endif; ?>

      </td>
    </tr>
  <?php endforeach ?>

  </tbody>
</table>

</div>


<?= $this->endSection() ?>