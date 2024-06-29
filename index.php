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
            <a class="navbar-brand" href="index.php">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notfound.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notfound.php">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notfound.php">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notfound.php">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/notfound.php">Blog</a></li>
            </ul>
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

</body>
<?php include('est/footer.php'); ?>