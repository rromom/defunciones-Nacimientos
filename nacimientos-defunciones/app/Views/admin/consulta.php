<?= $this->extend('templates/admin/dashboard_admin') ?>

<?= $this->section('contenido_admin') ?>

<div class="">
    <div class="row">
        <?= $this->include('templates/admin/select_consult') ?>
        <div class="col-9">
            <?= $this->renderSection('forms') ?>
        </div>

</div>
<?= $this->endSection() ?>