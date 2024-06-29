<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
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
        <form action="adddulceria.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="tipodul">Tipo</label>
                    <input type="text" name="tipodul" class="form-control border-primary rounded-3" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="productodul">Producto</label>
                    <input type="text" name="productodul" class="form-control border-primary rounded-3" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="preciodul">Precio</label>
                    <input type="text" name="preciodul" class="form-control border-primary rounded-3" placeholder="00.00" required>
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

        <?php
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
                echo '<div class="alert alert-info" role="alert">Producto agregado correctamente.</div>';
            }
        ?>
    </div>
</body>
<?php include('../est/footer.php'); ?>