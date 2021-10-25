<?= $this->extend('admin/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">

            <label><h2> ESTADO CIVIL </h2></label>
            <form action="/admin/defuncion/estado" method="post">
            <div class="input-group">
                <select class="custom-select" name="estado">
                <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->estado_civil);
                        echo ">";
                        echo $row->estado_civil;
                        echo "</option>";
                    }
                ?>
                </select>
            <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="border-radius: 12px;" type="submit">CONSULTAR</button>
            </form>
        </div>
</div>
    


    <?php
    if ($flag==1){
        echo '<h2 class="text-center my-3">Estado Civil: '.$estado.'</h2>';
        echo "<br/>";
        echo $table;
    }
    ?>
</div>

<?= $this->endSection() ?>