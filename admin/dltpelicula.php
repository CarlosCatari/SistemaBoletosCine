<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();

    include('../est/header.php');
    session_start();
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admpeliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  


        
    <div class="container mt-3">
        <?php   
            if (isset($_POST['codigopelicula'])) {
                $codigopelicula = $_POST['codigopelicula'];
            }
        ?>
        <?php
            foreach ($model-> buscarPelicula($codigopelicula) as $r):
                $idpelicula = $r->__get('idpelicula');
                $nombrepelicula = $r->__get('nombrepelicula');
                $sinopsis = $r->__get('sinopsis');
                $director = $r->__get('director');
                $genero = $r->__get('genero');
                $idioma = $r->__get('idioma');
                $fechaestreno = $r->__get('fechaestreno');
                $duracion = $r->__get('duracion');
                $imagen = "../images/".$r->__get('imagen');
            endforeach;
        ?>
        <form action="admpeliculas.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="codpelicula">Codigo pelicula</label>
                    <input type="text" name="codpelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $codigopelicula; ?>" readonly>
                    
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombrepelicula">Titulo pelicula</label>
                    <input type="text" name="nombrepelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $nombrepelicula; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="directorpelicula">Director</label>
                    <input type="text" name="directorpelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $director; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="sinopsispelicula">Sinopsis</label>
                    <textarea name="sinopsispelicula" id="sinopsispelicula" class="form-control border-danger bg-light rounded-3" rows="5" disabled><?php echo $sinopsis; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="generopelicula">Genero</label>
                    <input type="text" name="generopelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $genero; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="idiomapelicula">Idioma</label>
                    <input type="text" name="idiomapelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $idioma; ?>" disabled>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 form-group">
                    <label for="fechaestrenopelicula">Fecha de estreno</label>
                    <input type="text" name="fechaestrenopelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $fechaestreno; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="duracionpelicula">Duracion</label>
                    <input type="text" name="duracionpelicula" class="form-control border-danger bg-light rounded-3" value="<?php echo $duracion; ?>" disabled>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 form-group mb-4">
                <label for="imagenpelicula">Imagen</label><br>
                    <img src="<?php echo $imagen; ?>" alt="Imagen de la película" class="img-fluid mb-3 rounded-3" style="width: 70px;">
            </div>
            </div>

            <div class="form-group">
            <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>