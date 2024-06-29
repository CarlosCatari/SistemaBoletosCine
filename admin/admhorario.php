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
    <?php
        if(isset($_POST["cdhorario"])) {
            $idhorario = $_POST["cdhorario"];
            $turno = $_POST["turnohorario"];
            
                $data = new Local();
                $data->__set('idhorario', $idhorario);
                $data->__set('turno', $turno);
                
                $model->ActualizarHorario($data);
                $mensajehorario = 'Turno modificado correctamente.';
            }
        ?>

    <?php
        if(isset($_POST["cdhorariodlt"])) {
            $idhorario = $_POST['cdhorariodlt'];
            $model->EliminarHorario($idhorario);
            $mensajehorariodlt = 'Turno eliminado.';
        }
    ?>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="admadministrador.php">Administradores</a></li>
                <li class="nav-item"><a class="nav-link" href="admclientes.php">clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="admpeliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Turnos</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <form action="#">
                    <input type="text" placeholder="Buscar horario">
                </form>
            </ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="addhorario.php" class="text-white text-decoration-none">Agregar turno</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($mensajehorario)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensajehorario; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajehorariodlt)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensajehorariodlt; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="container-fluid w-100">
        <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>Turno</th>
            </tr>
            <?php foreach ($model -> listarhorario() as $r): ?>
            <tr> 
                <td class="align-middle"><?php echo $r->__get('idhorario'); ?></td>
                <td class="align-middle"><?php echo $r->__get('turno'); ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="edithorario.php" method="post">
                            <input type="hidden" name="codigohorario" id="codigohorario" value="<?php echo $r->__get('idhorario'); ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dlthorario.php" method="post">
                            <input type="hidden" name="codigohorario" id="codigohorario" value="<?php echo $r->__get('idhorario'); ?>">
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