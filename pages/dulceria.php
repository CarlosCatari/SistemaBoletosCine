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
    </nav>
    <div class="container-fluid">
        <div class="container mt-3">
            <div class="container-fluid">
                <div class="row g-4">
                    <?php foreach ($model->listardulceria() as $r):
                        $iddulceria = $r->__get('iddulceria');
                        $tipodulceria = $r->__get('tipo');
                        $proddulceria = $r->__get('producto');
                        $descripdulceria = $r->__get('descripcion');
                        $preciodulceria = $r->__get('precio');
                    ?>
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="container-fluid text-center">
                                <div class="row">
                                    <div class="col w-75">
                                        <h5 class="card-title"><?php echo $tipodulceria; ?></h5>
                                        <p class="card-text"><?php echo $proddulceria; ?></p>
                                        <p class="card-text"><?php echo $descripdulceria; ?></p>
                                        <div class="mt-auto counter-container" id="contenedor2">
                                            <span id="valuePrice-<?php echo $iddulceria; ?>" class="mx-3 fs-5">S/.<?php echo $preciodulceria; ?></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img class="m-4" src="../images/fondodulceria.png" alt="imagenpelicula" style="height: 180px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-primary container-fluid text-white mt-4 pt-2">
        <div class="row">
            <div class="col-md-3">
                <h5 class="fw-bold">CARTELERA</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Preventas</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contenidos Alternativos</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Muestras y Festivales</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Próximos Estrenos</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contenido Cinéstar</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">¿QUIÉNES SOMOS?</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Únete al equipo</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Próximas Aperturas</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Corporativo</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">LEGALES</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Términos y condiciones</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Política de privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">CONTACTO</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Chatea con los expertos</a></li>
                </ul>
                <div class="d-flex mt-2">
                    <a href="#"><img src="../icons/facebook.png" class="me-2" style="width: 40px;" alt="facebook"></a>
                    <a href="#"><img src="../icons/instagram.png" class="me-2" style="width: 40px;" alt="instagram"></a>
                    <a href="#"><img src="../icons/gorjeo.png" class="me-2" style="width: 40px;" alt="twitter"></a>
                    <a href="#"><img src="../icons/youtube.png" style="width: 40px;" alt="youtube"></a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p>◍ Español <small>© 2024</small></p>
            </div>
        </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>