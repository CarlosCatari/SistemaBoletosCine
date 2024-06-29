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
            <a class="navbar-brand fw-bold" href="admdulceria.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  


        
    <div class="container mt-3">
        <?php   
            if (isset($_POST['codigodulceria'])) {
                $codigodulceria = $_POST['codigodulceria'];
            }
        ?>
        <?php
            foreach ($model-> buscarDulceria($codigodulceria) as $r):
                $iddulceria = $r->__get('iddulceria');
                $tipo = $r->__get('tipo');
                $producto = $r->__get('producto');
                $descripcion = $r->__get('descripcion');
                $precio = $r->__get('precio');
            endforeach;
        ?>
        <form action="admdulceria.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="coddulceria">Codigo</label>
                    <input type="text" name="coddulceria" class="form-control border-primary rounded-3" value="<?php echo $iddulceria; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tipodulceria">Tipo</label>
                    <input type="text" name="tipodulceria" class="form-control border-primary rounded-3" value="<?php echo $tipo; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="pdtdulceria">Producto</label>
                    <input type="text" name="pdtdulceria" class="form-control border-primary rounded-3" value="<?php echo $producto; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="pciodulceria">Precio</label>
                    <input type="text" name="pciodulceria" class="form-control border-primary rounded-3" placeholder="00.00" value="<?php echo $precio; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="dcripdulceria">Descripcion</label>
                    <input type="text" name="dcripdulceria" class="form-control border-primary rounded-3" value="<?php echo $descripcion; ?>" required>
                </div>
            </div>
            

            <div class="form-group">
                <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>