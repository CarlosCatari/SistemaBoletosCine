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

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Bienvenido, <?php echo $user ?>! </strong>Prepárate para disfrutar de una experiencia inolvidable.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="container-fluid" >
        <div style="font-size:2rem">Peliculas</div>
    </div>

    <div class="container-fluid d-flex">
        <?php 
            foreach ($model->listarPelicula() as $r):
                $idpelicula = $r->__get('idpelicula');
                $nombrepelicula = $r->__get('nombrepelicula');
                $urlpelicula = "../images/".$r->__get('imagen');
                    if (empty($urlpelicula)) {
                        $urlpelicula = 'images/fondo_peliculas.jpg';
                    }
                $sipnopsis = $r->__get('sinopsis');
                $director = $r->__get('director');
        ?>
        <div class="card text-white text-center mr-2 mb-2" style="width: 18rem;">
            <img src="<?php echo $urlpelicula; ?>" class="card-img" alt="imagenpelicula">
            <div class="card-img-overlay d-flex flex-column justify-content-between" style="background-color: rgba(0, 0, 0, 0.5);">
                <div>
                    <h5 class="card-title"><?php echo $nombrepelicula; ?></h5>
                </div>
                <div class="my-auto">
                    <form action="salas.php" method="POST" class="mb-1">
                        <input type="hidden" name="idpelicula" value="<?php echo $idpelicula; ?>">
                        <button type="submit" class="btn btn-primary" style="width: 10rem;"><img class="mx-2" src="../icons/ticket.png" alt="boletos" style="width: 25px;">Comprar</button>
                    </form>
                    <form action="detallepelicula.php" method="POST" class="mb-1">
                        <input type="hidden" name="idpelicula" value="<?php echo $idpelicula; ?>">
                        <button type="submit" class="btn btn-primary" style="width: 10rem;"><img class="p-1 mx-2" src="../icons/signo+.png" alt="boletos" style="width: 25px;">Detalles</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
<?php include('../est/footer.php'); ?>