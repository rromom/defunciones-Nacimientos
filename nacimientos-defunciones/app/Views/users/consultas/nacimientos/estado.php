<?= $this->extend('users/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <label><h2> ESTADO CIVIL </h2></label>
            <form action="/user/nacimiento/estado" method="post" >
            <div class="input-group">
                <select name=estado class="custom-select form-control" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->estado_civil);
                        echo ">";
                        echo $row->estado_civil;
                        echo "</option>";
                    }
                    ?>
                    <div class="input-group-append">
                </select>
                    <button class="btn btn-outline-secondary" style="border-radius: 12px;" type="submit">CONSULTAR</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <?php
       if ($flag==1){
        echo '<h3 class="text-center my-3">ESTADO CIVIL: <small>'.$estado.'</small></h3>';
           echo "<br/>";
           echo $table;
       }
        ?>
    </div>
</div>

<?= $this->endSection() ?>