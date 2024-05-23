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
                <li class="nav-item"><a class="nav-link" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="#">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="h1">Peliculas</div>
    
        <?php
            foreach ($model -> buscarPelicula() as $r): 
        ?>
        <div class="card">
            <tr> 
                <td><?php echo $r->__get('nombrepelicula'); ?></td><br>
                <td><?php echo $r->__get('sinopsis'); ?></td><br>
                <td><?php echo $r->__get('director'); ?></td><br>
                <td><?php echo $r->__get('genero'); ?></td>
                <td><?php echo $r->__get('idioma'); ?></td><br>
                <td><?php echo $r->__get('fechaestreno'); ?></td>
                <td><?php echo $r->__get('duracion'); ?></td>

            </tr>
        </div>
        <?php endforeach;?>
    
    

</body>
<?php include('../est/footer.php'); ?>