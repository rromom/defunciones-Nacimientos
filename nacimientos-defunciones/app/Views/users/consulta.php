<?= $this->extend('templates/users/index_user_template') ?>

<?= $this->section('contenido_usuario') ?>

<div class="">
    <div class="row">
        <?= $this->include('templates/users/select_consult') ?>
        <div class="col-9">
            <?= $this->renderSection('forms') ?>
        </div>

</div>
<?= $this->endSection() ?>