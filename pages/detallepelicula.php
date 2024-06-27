<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();

    include('../est/header.php');
    session_start();
    $user = $_SESSION['username'];
    $dniuser = $_SESSION['dni'];

    if (isset($_POST['idpelicula'])) {
        $idpelicula = $_POST['idpelicula'];
    }

?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="datoscliente.php">Mis Datos</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="#">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Promociones</a></li>
                <li class="nav-item"><a class="nav-link" href="dulceria.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contactanos</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="loguin.php">Cerrar Sesion</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div>
            <a class="navbar-brand fw-bold px-2" href="peliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px; padding-bottom:6px;"> Atras
            </a>
        </div>
    </nav>

    <div class="container-fluid d-flex" >
        <?php
            foreach ($model-> buscarPelicula($idpelicula) as $r):
                $idpelicula = $r->__get('idpelicula');
                $nombrepelicula = $r->__get('nombrepelicula');
                $urlpelicula = "../".$r->__get('imagen');
                    if (empty($urlpelicula)) {
                        $urlpelicula = 'images/fondo_peliculas.jpg';
                    }
                $sipnopsis = $r->__get('sinopsis');
                $director = $r->__get('director');
                $duracion = $r->__get('duracion');
                $genero = $r->__get('genero');
            endforeach;

            $dateTime = DateTime::createFromFormat('H:i:s', $duracion);
            $hours = (int) $dateTime->format('H');
            $minutes = (int) $dateTime->format('i');
            $timemovie = $hours. "hrs ". $minutes."min";
        ?>
        
        <div class="container text-center pt-4">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="card-title font-weight-bold"><?php echo $nombrepelicula; ?></h5>
                    <p><?php echo $genero.' | '. $timemovie ?></p><hr>
                    <p class="font-weight-bold">Sinopsis</p>
                    <p class="card-text"><?php echo $sipnopsis; ?></p>
                    <p class="font-weight-bold">Director</p>
                    <p class="card-text"><?php echo $director; ?></p>

                    <form action="salas.php" method="POST">
                        <input type="hidden" name="idpelicula" value="<?php echo $idpelicula; ?>">
                        <button type="submit" class="btn btn-primary mb-1">Comprar Sala 2D</button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div class="card text-white text-center mr-2 mb-2" style="width: 18rem;">
                    <img src="<?php echo $urlpelicula; ?>" class="card-img" alt="imagenpelicula">
                    <div class="card-img-overlay d-flex flex-column justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
<?php include('../est/footer.php'); ?>