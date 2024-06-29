<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');
?>
<body>
    <?php
        if(isset($_POST["codadmin"])) {
            $idadmin = $_POST["codadmin"];
            $dniadmin = $_POST["dniadmin"];
            $pwdadmin = $_POST["pwdadmin"];
            $nombreadmin = $_POST["nombreadmin"];
            $apellidoadmin = $_POST["apeadmin"];
            $telefonoadmin = $_POST["teladmin"];
            $correoadmin = $_POST["correoadmin"];
            
            $data = new Local();
            $data->__set('idadmin', $idadmin);
            $data->__set('dniadmin', $dniadmin);
            $data->__set('pwdadmin', $pwdadmin);
            $data->__set('nombreadmin', $nombreadmin);
            $data->__set('apellidoadmin', $apellidoadmin);
            $data->__set('telefonoadmin', $telefonoadmin);
            $data->__set('correoadmin', $correoadmin);
                
            $model->ActualizarAdministrador($data);
            $msjadmin = 'Administrador '.$nombreadmin.' '.$apellidoadmin.' modificado correctamente.';
        }
    ?>

    <?php
        if(isset($_POST["cdadmin"])) {
            $idadmin = $_POST['cdadmin'];
            $model->EliminarAdministrador($idadmin);
            $mensajecadmindlt = 'Administrador eliminado.';
        }
    ?>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link active disabled" href="admadministrador.php">Administradores</a></li>
                <li class="nav-item"><a class="nav-link" href="admclientes.php">clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="admpeliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Administradores</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <form action="#">
                    <input type="text" placeholder="Buscar pelicula">
                </form>
            </ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="addadmin.php" class="text-white text-decoration-none">Agregar Administrador</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($msjadmin)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $msjadmin; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajecadmindlt)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensajecadmindlt; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="container-fluid w-100">
        <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>DNI</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Correo</th>
            </tr>
            <?php foreach ($model -> listarAdministrador() as $r): ?>
            <tr> 
                <td class="align-middle"><?php echo $r->__get('idadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('dniadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('pwdadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('nombreadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('apellidoadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('telefonoadmin'); ?></td>
                <td class="align-middle"><?php echo $r->__get('correoadmin'); ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editadmin.php" method="post">
                            <input type="hidden" name="codigoadmin" id="codigoadmin" value="<?php echo $r->__get('idadmin'); ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltadmin.php" method="post">
                            <input type="hidden" name="codigoadmin" id="codigoadmin" value="<?php echo $r->__get('idadmin'); ?>">
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