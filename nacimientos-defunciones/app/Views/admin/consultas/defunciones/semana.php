<?= $this->extend('admin/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">
            
            <label><h2> CAUSA DEFUNCIÓN </h2></label>
            <form action="/admin/defuncion/semana" method="post">
                <div class="input-group">
                    <select class="custom-select" name="semana">
                    <?php
                        foreach ($results as $row ) {
                            echo "<option value=";
                            echo urlencode($row->sem_gest);
                            echo ">";
                            echo $row->sem_gest;
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

if ($flag == 1) {
    echo '<h3 class="my-3 text-center">Semana de gestacion: '.$sem.'</h3>';
    echo $table;
}

?>

</div>

<?= $this->endSection() ?>