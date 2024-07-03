<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["tipodul"])) {
        $tipo = $_POST["tipodul"];
        $producto = $_POST["productodul"];
        $descripcion = $_POST["descripciondul"];
        $precio = $_POST["preciodul"];

        $data = new Local();
        $data->__set('tipo', $tipo);
        $data->__set('producto', $producto);
        $data->__set('descripcion', $descripcion);
        $data->__set('precio', $precio);

        $model->AgregarDulceria($data);
        $msjdulceria = 'Producto agregado correctamente.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admdulceria.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  

    <?php if (!empty($msjdulceria)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjdulceria; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
        <form action="adddulceria.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="tipodul">Tipo</label>
                    <input type="text" name="tipodul" class="form-control border-primary rounded-3" placeholder="Tipo" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="productodul">Producto</label>
                    <input type="text" name="productodul" class="form-control border-primary rounded-3" placeholder="Producto" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="preciodul">Precio</label>
                    <input type="text" name="preciodul" class="form-control border-primary rounded-3" value="00.00" placeholder="Precio del producto en nuevos soles" maxlength="6" pattern="^([1-9][0-9]{0,2})(\.[0-9]{1,2})?$" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="descripciondul">Descripcion</label>
                    <input type="text" name="descripciondul" class="form-control border-primary rounded-3" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>