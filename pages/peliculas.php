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
    <div class="container-fluid" >
        <div style="font-size:2rem">Peliculas</div>
    </div>

    <div class="container-fluid d-flex">
        <?php foreach ($model->buscarPelicula() as $r): ?>
        <div class="card text-white text-center mr-2 mb-2" style="width: 18rem;">
            <img src="../images/fondo_peliculas.jpg" class="card-img" alt="imagenpelicula">
            <div class="card-img-overlay d-flex flex-column justify-content-between" style="background-color: rgba(0, 0, 0, 0.5);">
                <div>
                    <h5 class="card-title"><?php echo $r->__get('nombrepelicula'); ?></h5>
                </div>
                <div class="mt-auto">
                    <p class="card-text"><?php echo $r->__get('sinopsis'); ?></p>
                    <p class="card-text"><small><?php echo $r->__get('director'); ?></small></p>
                    <a href="salas.php" class="btn btn-primary mb-1">Comprar Sala 2D</a>
                    <a href="#" class="btn btn-primary">Comprar Sala 3D</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>


</body>
<?php include('../est/footer.php'); ?>