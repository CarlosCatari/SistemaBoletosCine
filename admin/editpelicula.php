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
                    
                    <label for="nombrepelicula">Codigo pelicula</label>
                    <input type="text" name="cdpelicula" class="form-control border-primary rounded-3" value="<?php echo $codigopelicula; ?>" required>
                    
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombrepelicula">Titulo pelicula</label>
                    <input type="text" name="nombrepelicula" class="form-control border-primary rounded-3" value="<?php echo $nombrepelicula; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="directorpelicula">Director</label>
                    <input type="text" name="directorpelicula" class="form-control border-primary rounded-3" value="<?php echo $director; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="sinopsispelicula">Sinopsis</label>
                    <textarea name="sinopsispelicula" id="sinopsispelicula" class="form-control border-primary rounded-3" rows="5" required><?php echo $sinopsis; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="generopelicula">Genero</label>
                    <input type="text" name="generopelicula" class="form-control border-primary rounded-3" value="<?php echo $genero; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="idiomapelicula">Idioma</label>
                    <input type="text" name="idiomapelicula" class="form-control border-primary rounded-3" value="<?php echo $idioma; ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 form-group">
                    <label for="fechaestrenopelicula">Fecha de estreno</label>
                    <input type="text" name="fechaestrenopelicula" class="form-control border-primary rounded-3" value="<?php echo $fechaestreno; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="duracionpelicula">Duracion</label>
                    <input type="text" name="duracionpelicula" class="form-control border-primary rounded-3" value="<?php echo $duracion; ?>" required>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 form-group mb-4">
                <label for="imagenpelicula">Imagen</label><br>
                    <img src="<?php echo $imagen; ?>" alt="Imagen de la película" class="img-fluid mb-3" style="width: 70px;">
                <input type="file" name="imagenpelicula" id="imagenpelicula" class="form-control-file border border-primary w-100">
            </div>

            </div>

            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>