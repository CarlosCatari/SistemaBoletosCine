<?php 
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
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="../loguin.php">Cerrar Sesion</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Bienvenido, <?php echo $user ?>! </strong>Prepárate para disfrutar de una experiencia inolvidable.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="h1">Cartelera</div>
    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <img class="img-thumbnail" src="../images/guerra_civil.jpg" alt="">
            </div>
            <div class="col">
                <img class="img-thumbnail" src="../images/guerra_civil.jpg" alt="">
            </div>
            <div class="col">
                <img class="img-thumbnail" src="../images/guerra_civil.jpg" alt="">
            </div>
            <div class="col">
                <img class="img-thumbnail" src="../images/guerra_civil.jpg" alt="">
            </div>
            <div class="col">
                <img class="img-thumbnail" src="../images/guerra_civil.jpg" alt="">
            </div>
        </div>
    </div> -->
</body>
<?php include('../est/footer.php'); ?>