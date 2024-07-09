<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["cddulceria"])) {
        $iddulceria = $_POST["cddulceria"];
        $tipo = $_POST["tipodulceria"];
        $producto = $_POST["pdtdulceria"];
        $descripcion = $_POST["dcripdulceria"];
        $precio = $_POST["pciodulceria"];
        
        $data = new Local();
        $data->__set('iddulceria', $iddulceria);
        $data->__set('tipo', $tipo);
        $data->__set('producto', $producto);
        $data->__set('descripcion', $descripcion);
        $data->__set('precio', $precio);
            
        $model->ActualizarDulceria($data);
        $mensajedulceria = 'Producto modificado correctamente.';
    }
    if(isset($_POST["coddulceria"])) {
        $iddulceria = $_POST['coddulceria'];
        $model->EliminarDulceria($iddulceria);
        $mensajedulceriadlt = 'Producto eliminado.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="admadministrador.php">Administradores</a></li>
                <li class="nav-item"><a class="nav-link" href="admclientes.php">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="admpeliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="../pages/loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Productos Dulceria</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 "></ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="adddulceria.php" class="text-white text-decoration-none">Agregar Producto</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($mensajedulceria)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $mensajedulceria; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty($mensajedulceriadlt)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $mensajedulceriadlt; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid w-100">
    <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($model -> listardulceria() as $r):
                $iddulceria = $r->__get('iddulceria');
                $tipo = $r->__get('tipo');
                $producto = $r->__get('producto');
                $descripcion = $r->__get('descripcion');
                $precio = $r->__get('precio');
            ?>
            <tr> 
                <td class="align-middle"><?php echo $iddulceria; ?></td>
                <td class="align-middle"><?php echo $tipo; ?></td>
                <td class="align-middle"><?php echo $producto; ?></td>
                <td class="align-middle"><?php echo $descripcion; ?></td>
                <td class="align-middle"><?php echo $precio; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editdulceria.php" method="post">
                            <input type="hidden" name="codigodulceria" id="codigodulceria" value="<?php echo $iddulceria; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltdulceria.php" method="post">
                            <input type="hidden" name="codigodulceria" id="codigodulceria" value="<?php echo $iddulceria; ?>">
                            <input type="submit" class="btn btn-danger flex-fill mx-1" value="Eliminar">
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
<?php include('../est/footer.php'); ?>