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
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div>
        <div class="container h3">Mis datos personales</div>
        <table border="3">
            <tr>
                <th>DNI</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Correo</th>
            </tr>
            <?php foreach ($model -> listarUsuario($user) as $r): ?>
            <tr> 
                <td><?php echo $r->__get('dni'); ?></td>
                <td><?php echo $r->__get('pwd'); ?></td>
                <td><?php echo $r->__get('nombre'); ?></td>
                <td><?php echo $r->__get('apellido'); ?></td>
                <td><?php echo $r->__get('telefono'); ?></td>
                <td><?php echo $r->__get('correo'); ?></td>
            </tr>
            <?php endforeach; ?>
    </table>
    <a href="#">Editar perfil</a>
    </div>
</body>
</html>