<?= $this->extend('users/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <label><h2> PRODUCTO DEL EMBARAZO </h2></label>
            <form action="/user/nacimiento/producto" method="post" >
            <div class="input-group">
                <select name=producto class="custom-select form-control" id="inputGroupSelect04" aria-label="Example select with button addon">
                <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->producto);
                        echo ">";
                        echo $row->producto;
                        echo "</option>";
                    }
                ?>
                </select>
            <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="border-radius: 12px;" type="submit">CONSULTAR</button>
        </div>
                </form>
</div>
        </div>
    </div>
    <?php
       if ($flag==1){
        echo '<h3 class="text-center my-3">PRODUCTO DEL EMBARAZO: <small>'.$producto.'</small></h3>';
           echo "<br/>";
           echo $table;
       }
        ?>
</div>

<?= $this->endSection() ?>