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
    $username = $_SESSION['username'];
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
                <li class="nav-item"><a class="nav-link disabled" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" >
        <div style="font-size:2rem">Boletos registrados</div>
    </div>
    <div>
    <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <?php foreach ($model -> buscarCliente($dniuser) as $r): ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Nombre: <?php echo $r->__get('nombre') ." ".$r->__get('apellido'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>DNI:<?php echo $r->__get('dni'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Telefono: <?php echo $r->__get('telefono'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Correo electrónico: <?php echo $r->__get('correo'); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Asientos reservados:
                        <?php 
                            if(isset($_POST['dato'])) {
                                $dato = $_POST['dato'];
                                echo $dato;
                            } else {
                                echo "No se ha registrado asientos";
                            }
                        ?>
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Dulceria: -</p>
        </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>