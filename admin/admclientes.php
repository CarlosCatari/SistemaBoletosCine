<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["codcliente"])) {
        $idcliente = $_POST["codcliente"];
        $dni = $_POST["dnicliente"];
        $pwd = $_POST["pwdcliente"];
        $nombre = $_POST["nombrecliente"];
        $apellido = $_POST["apecliente"];
        $telefono = $_POST["telcliente"];
        $correo = $_POST["correocliente"];
        
        $data = new Local();
        $data->__set('idcliente', $idcliente);
        $data->__set('dni', $dni);
        $data->__set('pwd', $pwd);
        $data->__set('nombre', $nombre);
        $data->__set('apellido', $apellido);
        $data->__set('telefono', $telefono);
        $data->__set('correo', $correo);
            
        $model->ActualizarIdCliente($data);
        $cliente = strtoupper($nombre.' '.$apellido);
        $msjcliente = 'Cliente '.$cliente.' modificado correctamente.';
    }
    if(isset($_POST["cdcliente"])) {
        $idcliente = $_POST['cdcliente'];
        $model->EliminarCliente($idcliente);
        $mensajeclientedlt = 'Cliente eliminado.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="admadministrador.php">Administradores</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="admclientes.php">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="admpeliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="../pages/loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Clientes</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <form action="searchcliente.php" method="post">
                    <input class="border border-primary rounded p-1" type="text" name="dnicliente" placeholder="Buscar por DNI" maxlength="8" minlength="7" pattern="[0-9]{8}">
                    <input class="btn btn-primary mb-1" type="submit" value="buscar">
                </form>
            </ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="addclientes.php" class="text-white text-decoration-none">Agregar Cliente</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($msjcliente)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $msjcliente; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajeclientedlt)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $mensajeclientedlt; ?>
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
            <?php foreach ($model -> listarCliente() as $r):
                $idcliente = $r->__get('idcliente');
                $dni = $r->__get('dni');
                $pwd = $r->__get('pwd');
                $nombre = $r->__get('nombre');
                $apellido = $r->__get('apellido');
                $telefono = $r->__get('telefono');
                $correo = $r->__get('correo');
            ?>
            <tr> 
                <td class="align-middle"><?php echo $idcliente ; ?></td>
                <td class="align-middle"><?php echo $dni ; ?></td>
                <td class="align-middle"><?php echo $pwd ; ?></td>
                <td class="align-middle"><?php echo $nombre ; ?></td>
                <td class="align-middle"><?php echo $apellido ; ?></td>
                <td class="align-middle"><?php echo $telefono ; ?></td>
                <td class="align-middle"><?php echo $correo ; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editclientes.php" method="post">
                            <input type="hidden" name="codigocliente" id="codigocliente" value="<?php echo $idcliente; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltclientes.php" method="post">
                            <input type="hidden" name="codigocliente" id="codigocliente" value="<?php echo $idcliente; ?>">
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