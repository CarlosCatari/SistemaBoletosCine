<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');
    
    session_start();
    $user = $_SESSION['dni'];
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div>
            <a class="navbar-brand fw-bold px-2" href="peliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px; padding-bottom:6px;"> Atras
            </a>
        </div>
    </nav>
    <div class="container-fluid d-flex justify-content-between align-items-end" >
        <div style="font-size:2rem">Mis datos personales</div>
        <a class="btn btn-primary" href="editardatos.php">Editar perfil</a>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <?php foreach ($model -> buscarCliente($user) as $r):
                $dni = $r->__get('dni');
                $clave = $r->__get('pwd');
                $nombre = $r->__get('nombre');
                $apell = $r->__get('apellido');
                $tel = $r->__get('telefono');
                $correo = $r->__get('correo');
            ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>DNI:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $dni; ?></p>
                </div>
                <div style="width:20rem">
                    <p>Contraseña:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $clave; ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Nombre:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $nombre; ?></p>
                </div>
                <div style="width:20rem">
                    <p>Apellido:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $apell; ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Telefono:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $tel; ?></p>
                </div>
                <div style="width:20rem">
                    <p>Correo electrónico:</p>
                    <p class="border border-primary p-3 rounded-4"><?php echo $correo; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>