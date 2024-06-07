<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

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
                <li class="nav-item"><a class="nav-link" href="datoscliente.php">Mis Datos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Promociones</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="#">Dulceria</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contactanos</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            <ul class="nav nav-underline ">
                <li class="nav-item ms-3"><a class="nav-link" href="loguin.php">Cerrar Sesion</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <div class="row">
        <?php foreach ($model->listardulceria() as $r): ?>
            <div class="col-md-3 mb-2">
                <div class="card text-white text-center bg-info" style="width: 100%; height: 17rem;">
                    <div class="mt-auto">
                        <h5 class="card-title"><?php echo $r->__get('tipo'); ?></h5>
                    </div>
                    <div class="mt-auto">
                        <p class="card-text"><?php echo $r->__get('producto'); ?></p>
                        <p class="card-text"><?php echo $r->__get('descripcion'); ?></p>
                        <p class="card-text">S/.<?php echo $r->__get('precio'); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>

<div class="bg-primary container-fluid">
    <div class="row">
        <div class="col">
            <p class="fw-bold" >CARTELERA</p>
            <p>Preventas</p>
            <p>Contenidos Alternativos</p>
            <p>Muestras y Festivales</p>
            <p>Próximos Estrenos</p>
            <p>Contenido Cinéstar</p>
        </div>
        <div class="col">
            <p class="fw-bold" >¿QUIÉNES SOMOS?</p>
            <p>Únete al equipo</p>
            <p>Próximas Aperturas</p>
            <p>Corporativo</p>
        </div>
        <div class="col">
            <p class="fw-bold" >LEGALES</p>
            <p>Términos y condiciones</p>
            <p>Política de privacidad</p>
        </div>
        <div class="col">
            <p class="fw-bold" >CONTACTO</p>
            <p>Chatea con los expertos</p>
            <a href="#"><img src="../icons/facebook.png" style="width: 40px;" alt="facebook"></a>
            <a href="#"><img src="../icons/instagram.png" alt="instagram" style="width: 40px;"></a>
            <a href="#"><img src="../icons/gorjeo.png" alt="twiter" style="width: 40px;"></a>
            <a href="#"><img src="../icons/youtube.png" alt="youtube" style="width: 40px;"></a>
        </div>
    </div>
    <div class="row">
        <p>◍ Español <small>© 2024</small></p>
    </div>
</div>

  </body>
<?php include('../est/footer.php'); ?>