<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["tipoboleto"])) {
        $tipoboleto = $_POST["tipoboleto"];
        $desboleto = $_POST["desboleto"];
        $precioboleto = $_POST["precioboleto"];

        $data = new Local();
        $data->__set('tipoboleto', $tipoboleto);
        $data->__set('descripcionboleto', $desboleto);
        $data->__set('precioboleto', $precioboleto);

        $model->AgregarBoleto($data);
        $tpticket = strtoupper($tipoboleto);
        $msjticket = 'Boleto '.$tpticket.' agregado correctamente';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admboletos.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav> 
    
    <?php if (!empty($msjticket)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjticket; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
        <form action="addboletos.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="tipoboleto">Tipo</label>
                    <input type="text" name="tipoboleto" class="form-control border-primary rounded-3" placeholder="Tipo de producto" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="precioboleto">Precio</label>
                    <input type="text" name="precioboleto" class="form-control border-primary rounded-3" value="00.00" placeholder="Precio del producto en nuevos soles" maxlength="6" pattern="^([1-9][0-9]{0,2})(\.[0-9]{1,2})?$" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="desboleto">Descripcion</label>
                    <input type="text" name="desboleto" class="form-control border-primary rounded-3" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>