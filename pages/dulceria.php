<?php
    require_once "../conectar.php";
    require_once "../Local.Model.php";
    require_once "../Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();
?>
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
                <li class="nav-item"><a class="nav-link" href="inicio.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="datoscliente.php">Mis Datos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="#">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid d-flex justify-content-between mb-4">
        <div style="font-size:2rem">Dulceria</div>
    </div>

    
    <?php foreach ($model->listardulceria() as $r): ?>
        <div class="card text-white text-center mr-2 mb-2 bg-info " style="width: 18rem;">
            <div class="mt-auto">
                <h5 class="card-title"><?php echo $r->__get('tipo'); ?></h5>
            </div>
            <div class="mt-auto">
                <p class="card-text"><?php echo $r->__get('descripcion'); ?></p>
                <p class="card-text"><small><?php echo $r->__get('precio'); ?></small></p>
            </div>
        </div>
    <?php endforeach;?>
</body>
<?php include('../est/footer.php'); ?>