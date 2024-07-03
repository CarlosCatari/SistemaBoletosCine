<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if (isset($_POST['codigodulceria'])) {
        $codigodulceria = $_POST['codigodulceria'];
    }
    foreach ($model-> buscarDulceria($codigodulceria) as $r):
        $iddulceria = $r->__get('iddulceria');
        $tipo = $r->__get('tipo');
        $producto = $r->__get('producto');
        $descripcion = $r->__get('descripcion');
        $precio = $r->__get('precio');
    endforeach;
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
        <form action="admdulceria.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="cddulceria">Codigo</label>
                    <input type="text" name="cddulceria" class="form-control border-primary bg-light rounded-3" value="<?php echo $iddulceria; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tipodulceria">Tipo</label>
                    <input type="text" name="tipodulceria" class="form-control border-primary rounded-3" value="<?php echo $tipo; ?>" placeholder="Tipo" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="pdtdulceria">Producto</label>
                    <input type="text" name="pdtdulceria" class="form-control border-primary rounded-3" value="<?php echo $producto; ?>" placeholder="Producto" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="pciodulceria">Precio</label>
                    <input type="text" name="pciodulceria" class="form-control border-primary rounded-3" placeholder="Precio del producto en nuevos soles" value="<?php echo $precio; ?>" maxlength="6" pattern="^([1-9][0-9]{0,2})(\.[0-9]{1,2})?$" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="dcripdulceria">Descripcion</label>
                    <input type="text" name="dcripdulceria" class="form-control border-primary rounded-3" value="<?php echo $descripcion; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>