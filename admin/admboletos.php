<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["codboleto"])) {
        $cdboleto = $_POST["codboleto"];
        $tpboleto = $_POST["tipoboleto"];
        $desboleto = $_POST["desripcionboleto"];
        $pcioboleto = $_POST["precboleto"];
        
        $data = new Local();
        $data->__set('idboleto', $cdboleto);
        $data->__set('tipoboleto', $tpboleto);
        $data->__set('descripcionboleto', $desboleto);
        $data->__set('precioboleto', $pcioboleto);
            
        $model->ActualizarBoleto($data);
        $mensajeboleto = 'Boleto modificado correctamente.';
    }
    if(isset($_POST["cdboleto"])) {
        $idboletos = $_POST['cdboleto'];
        $model->EliminarBoleto($idboletos);
        $mensajeboletodlt = 'Boleto eliminado.';
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
                <li class="nav-item"><a class="nav-link" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="../pages/loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Boletos</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <form action="#">
                    <input type="text" placeholder="Buscar pelicula">
                </form>
            </ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="addboletos.php" class="text-white text-decoration-none">Agregar boleto</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($mensajeboleto)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensajeboleto; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajeboletodlt)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $mensajeboletodlt; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="container-fluid w-100">
        <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($model -> listarboleto() as $r): 
                $idboleto = $r->__get('idboleto');
                $tipoboleto = $r->__get('tipoboleto');
                $descrboleto = $r->__get('descripcionboleto');
                $pcioboleto = $r->__get('precioboleto');
            ?>
            <tr> 
                <td class="align-middle"><?php echo $idboleto; ?></td>
                <td class="align-middle"><?php echo $tipoboleto; ?></td>
                <td class="align-middle"><?php echo $descrboleto; ?></td>
                <td class="align-middle"><?php echo $pcioboleto; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editboletos.php" method="post">
                            <input type="hidden" name="codigoboleto" id="codigoboleto" value="<?php echo $idboleto; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltboletos.php" method="post">
                            <input type="hidden" name="codigoboleto" id="codigoboleto" value="<?php echo $idboleto; ?>">
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