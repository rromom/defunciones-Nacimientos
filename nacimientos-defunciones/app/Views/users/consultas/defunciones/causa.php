<?= $this->extend('users/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">

            <label><h2> CAUSA DEFUNCIÓN </h2></label>
            <form action="/user/defuncion/causa" method="post">
            <div class="input-group">
                <select class="custom-select" name="causa">
                <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->causa_fet);
                        echo ">";
                        echo $row->causa_fet;
                        echo "</option>";
                    }
                ?>
                </select>
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" style="border-radius: 12px;" type="submit">CONSULTAR</button>
                </div>
            </div>
            </form>

<?php

if ($flag == 1) {
    echo '<h3>Causa: '.$causa.'</h3>';
    echo $table;
}
?>

</div>

<?= $this->endSection() ?>