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
    $user = $_SESSION['dni'];
?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="inicio.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="datoscliente.php">Mis Datos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid d-flex justify-content-between align-items-end" >
        <div style="font-size:2rem">Mis datos personales</div>
        <a class="btn btn-primary" href="editardatos.php">Editar perfil</a>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <?php foreach ($model -> listarUsuario($user) as $r): ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>DNI:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('dni'); ?></p>
                </div>
                <div style="width:20rem">
                    <p>Contraseña:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('pwd'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Nombre:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('nombre'); ?></p>
                </div>
                <div style="width:20rem">
                    <p>Apellido:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('apellido'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Telefono:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('telefono'); ?></p>
                </div>
                <div style="width:20rem">
                    <p>Correo electrónico:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $r->__get('correo'); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    
    </div>
</body>
</html>