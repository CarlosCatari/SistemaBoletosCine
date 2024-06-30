<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();

    include('../est/header.php');
    session_start();

    $user = $_SESSION['usernameadmin'];
    $dniuser = $_SESSION['dniadmin'];
?>
<body class="d-flex flex-column vh-100" style="background-image: url('../images/fondodashboard.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <nav class="navbar navbar-expand-lg bg-body position-relative" style="z-index: 1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboardadmin.php">Panel CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0"></ul>
            <ul class="nav nav-underline">
                <li class="nav-item ms-3"><a class="nav-link" href="../pages/loguin.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Bienvenido, <?php echo $user ?>! </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admadministrador.php">Administradores</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admclientes.php">Clientes</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admpeliculas.php">Peliculas</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admdulceria.php">Dulceria</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admboletos.php">Boletos</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-primary btn-block w-100 p-3" href="admhorario.php">Horario</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>