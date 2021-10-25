<?= $this->extend('admin/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">

            <label><h2> NIVEL EDUCACIÓN </h2></label>
            <form action="/admin/defuncion/educacion" method="post">
            <div class="input-group">
                <select class="custom-select" name="edu">
                <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->nivel_inst);
                        echo ">";
                        echo $row->nivel_inst;
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
    echo '<h3 class="my-3">Nivel de educacion: '.$edu.'</h3>';
    echo $table;
}

?>
</div>

<?= $this->endSection() ?>