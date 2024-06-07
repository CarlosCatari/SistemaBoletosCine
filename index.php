<?php 
    require_once "mvc/conectar.php";
    require_once "mvc/Local.Model.php";
    require_once "mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();
    include('est/header.php'); 
?>



<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="pages/loguin.php"><img src="icons/usuario2.png" style="width: 40px;" alt="img_usuario"></a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0 bg-info">
    <div class="position-relative">
        <img class="img-fluid vw-100" src="images/fondo_inicio.jpg" alt="fondo" style="object-fit: cover; height:570px">
    </div>
</div>

    <div class="h1">Cartelera</div>
    <div class="container-fluid d-flex">
        <?php foreach ($model->buscarPelicula() as $r): ?>
        <div class="card text-white text-center mr-2 mb-2" style="width: 18rem;">
            <img src="images/fondo_peliculas.jpg" class="card-img" alt="imagenpelicula">
            <div class="card-img-overlay d-flex flex-column justify-content-between" style="background-color: rgba(0, 0, 0, 0.5);">
                <div>
                    <h5 class="card-title"><?php echo $r->__get('nombrepelicula'); ?></h5>
                </div>
                <div class="mt-auto">
                    <p class="card-text"><?php echo $r->__get('sinopsis'); ?></p>
                    <p class="card-text"><small><?php echo $r->__get('director'); ?></small></p>
                    <a href="#" class="btn btn-primary mb-1">Comprar Sala 2D</a>
                    <a href="#" class="btn btn-primary">Comprar Sala 3D</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</body>
<?php include('est/footer.php'); ?>