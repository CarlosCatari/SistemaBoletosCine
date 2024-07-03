<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["cdpelicula"])) {
        $idpelicula = $_POST["cdpelicula"];
        $nombre = $_POST["nombrepelicula"];
        $sinopsis = $_POST["sinopsispelicula"];
        $director = $_POST["directorpelicula"];
        $genero = $_POST["generopelicula"];
        $idioma = $_POST["idiomapelicula"];
        $fechaestreno = $_POST["fechaestrenopelicula"];
        $duracion = $_POST["duracionpelicula"];
        $imagen = $_POST["imagenpelicula"];
        
        $data = new Local();
        $data->__set('idpelicula', $idpelicula);
        $data->__set('nombrepelicula', $nombre);
        $data->__set('sinopsis', $sinopsis);
        $data->__set('director', $director);
        $data->__set('genero', $genero);
        $data->__set('idioma', $idioma);
        $data->__set('fechaestreno', $fechaestreno);
        $data->__set('duracion', $duracion);
        $data->__set('imagen', $imagen);
        
        $model->ActualizarPelicula($data);
        $mensajepelicula = 'Pelicula '. strtoupper($nombre) .' modificada correctamente.';
    }
    if(isset($_POST["codpelicula"])) {
        $codpelicula = $_POST['codpelicula'];
        $model->EliminarPelicula($codpelicula);
        $mensajepeliculadlt = 'Pelicula eliminada.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="admadministrador.php">Administradores</a></li>
                <li class="nav-item"><a class="nav-link" href="admclientes.php">Clientes</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="admpeliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="admdulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="admboletos.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="admhorario.php">Horario</a></li>
            </ul>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="../pages/loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="ms-3 h4">Listado de Peliculas</div>
    <nav class="navbar navbar-expand-lg bg-body m-2">
        <div class="container-fluid">
            <ul class="nav nav-underline">
                <li class="nav-item ms-3 btn btn-primary">
                    <a href="addpelicula.php" class="text-white text-decoration-none">Agregar pelicula</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!empty($mensajepelicula)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensajepelicula; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajepeliculadlt)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $mensajepeliculadlt; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>


    <div class="container-fluid w-100">
        <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>Pelicula</th>
                <th>Sinopsis</th>
                <th>Director</th>
                <th>Genero</th>
                <th>Idioma</th>
                <th>Estreno</th>
                <th>Duracion</th>
                <th>Imagen</th>
                <th>Action</th>
            </tr>
            <?php foreach ($model -> listarPelicula() as $r):
                $idpelicula = $r->__get('idpelicula');
                $nombrepelicula = $r->__get('nombrepelicula');
                $sinopsis = $r->__get('sinopsis');
                $director = $r->__get('director');
                $genero = $r->__get('genero');
                $idioma = $r->__get('idioma');
                $fechaestreno = $r->__get('fechaestreno');
                $duracion = $r->__get('duracion');
                $imagen = $r->__get('imagen');
            ?>
            <tr> 
                <td class="align-middle"><?php echo $idpelicula; ?></td>
                <td class="align-middle"><?php echo $nombrepelicula; ?></td>
                <td class="align-middle"><?php echo $sinopsis; ?></td>
                <td class="align-middle"><?php echo $director; ?></td>
                <td class="align-middle"><?php echo $genero; ?></td>
                <td class="align-middle"><?php echo $idioma; ?></td>
                <td class="align-middle"><?php echo $fechaestreno; ?></td>
                <td class="align-middle"><?php echo $duracion; ?></td>
                <td class="align-middle"><?php echo $imagen; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editpelicula.php" method="post">
                            <input type="hidden" name="codigopelicula" id="codigopelicula" value="<?php echo $idpelicula; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltpelicula.php" method="post">
                            <input type="hidden" name="codigopelicula" id="codigopelicula" value="<?php echo $idpelicula; ?>">
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