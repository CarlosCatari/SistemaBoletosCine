<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');
    
    if (isset($_POST['codigoboleto'])) {
        $codigoboletos = $_POST['codigoboleto'];
    }
    foreach ($model-> buscarBoleto($codigoboletos) as $r):
        $idboleto = $r->__get('idboleto');
        $tipoboleto = $r->__get('tipoboleto');
        $descripcionboleto = $r->__get('descripcionboleto');
        $precioboleto = $r->__get('precioboleto');
    endforeach;
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admboletos.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  
    <div class="container mt-3">
        
        <form action="admboletos.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="codboleto">Codigo</label>
                    <input type="text" name="codboleto" class="form-control border-primary bg-light rounded-3" value="<?php echo $idboleto; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="tipoboleto">Tipo</label>
                    <input type="text" name="tipoboleto" class="form-control border-primary rounded-3" value="<?php echo $tipoboleto; ?>" placeholder="Tipo de producto" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="precboleto">Precio</label>
                    <input type="text" name="precboleto" class="form-control border-primary rounded-3" value="<?php echo $precioboleto; ?>" placeholder="Precio del producto en nuevos soles" maxlength="6" pattern="^([1-9][0-9]{0,2})(\.[0-9]{1,2})?$" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="desripcionboleto">Descripcion</label>
                    <input type="text" name="desripcionboleto" class="form-control border-primary rounded-3" value="<?php echo $descripcionboleto; ?>" placeholder="Descripcion breve del producto" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>