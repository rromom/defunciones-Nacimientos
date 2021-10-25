<?= $this->extend('users/consulta') ?>

<?= $this->section('forms') ?>
<div class="container mt-5">
    <label><h2> PROVINCIA </h2></label>
        <div class="input-group">
            <form action="/user/nacimiento/provincia" method="post" >
                <div class="input-group-append">
                <select name="provincia" class="custom-select form-control" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <?php
                    foreach ($results as $row ) {
                        echo "<option value=";
                        echo urlencode($row->provincia);
                        echo ">";
                        echo $row->provincia;
                        echo "</option>";
                    }
                    ?>
                </select>
                    <button class="btn btn-outline-secondary" style="border-radius: 12px;" type="submit">CONSULTAR</button>
                </div>
            </form>
        </div>




       <?php
       if ($flag==1){
        echo '<h3 class="text-center my-3">Provincia: <small>'.$provincia.'</small></h3>';
           echo "<br/>";
           echo $table;
       }
        ?>

</div>

<?= $this->endSection() ?>