<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $model = new LocalModel();

    include('../est/header.php');
    session_start();
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
        <?php   
            if (isset($_POST['codigoboleto'])) {
                $codigoboleto = $_POST['codigoboleto'];
            }
        ?>
        <?php
            foreach ($model-> buscarBoleto($codigoboleto) as $r):
                $idboleto = $r->__get('idboleto');
                $tipoboleto = $r->__get('tipoboleto');
                $descripcionboleto = $r->__get('descripcionboleto');
                $precioboleto = $r->__get('precioboleto');
            endforeach;
        ?>
        <form action="admboletos.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="cdboleto">Codigo</label>
                    <input type="text" name="cdboleto" class="form-control border-primary rounded-3" value="<?php echo $idboleto; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="tipoboleto">Tipo</label>
                    <input type="text" name="tipoboleto" class="form-control border-primary rounded-3" value="<?php echo $tipoboleto; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="precboleto">Precio</label>
                    <input type="text" name="precboleto" class="form-control border-primary rounded-3" value="<?php echo $precioboleto; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="desripcionboleto">Descripcion</label>
                    <input type="text" name="desripcionboleto" class="form-control border-primary rounded-3" value="<?php echo $descripcionboleto; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>