<?= $this->extend('admin/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">

            <label><h2> LUEGAR DE OCURRENCIA </h2></label>
            <form action="/admin/defuncion/ocurrencia" method="post">
            <div class="input-group">
                <select class="custom-select" name="ocurrencia">
                <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->ocurrencia);
                        echo ">";
                        echo $row->ocurrencia;
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
    echo '<h3 class="text-center my-3">Lugar de ocurrencia: '.$ocurrencia.'</h3>';
    echo $table;
    
}
?> 

</div>

<?= $this->endSection() ?>