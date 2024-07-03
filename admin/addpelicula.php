<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["nombrepelicula"])) {
        $nombre = $_POST["nombrepelicula"];
        $sinopsis = $_POST["sinopsispelicula"];
        $director = $_POST["directorpelicula"];
        $genero = $_POST["generopelicula"];
        $idioma = $_POST["idiomapelicula"];
        $fechaestreno = $_POST["fechaestrenopelicula"];
        $duracion = $_POST["duracionpelicula"];
        $imagen = $_POST["imagenpelicula"];

        $data = new Local();
        $data->__set('nombrepelicula', $nombre);
        $data->__set('sinopsis', $sinopsis);
        $data->__set('director', $director);
        $data->__set('genero', $genero);
        $data->__set('idioma', $idioma);
        $data->__set('fechaestreno', $fechaestreno);
        $data->__set('duracion', $duracion);
        $data->__set('imagen', $imagen);

        $model->AgregarPelicula($data);
        $dtpelicula = strtoupper($nombre);
        $msjpelicula = 'Pelicula '. $dtpelicula .' agregada correctamente.</div>';
    }
    $fechaactual = date("Y-m-d");
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admpeliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  

    <?php if (!empty($msjpelicula)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjpelicula; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
        <form action="addpelicula.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombrepelicula">Titulo pelicula</label>
                    <input type="text" name="nombrepelicula" class="form-control border-primary rounded-3"  placeholder="Titulo de la pelicula" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="directorpelicula">Director</label>
                    <input type="text" name="directorpelicula" class="form-control border-primary rounded-3" placeholder="Director" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 form-group">
                    <label for="sinopsispelicula">Sinopsis</label>
                    <textarea name="sinopsispelicula" id="sinopsispelicula" class="form-control border-primary rounded-3" rows="5" placeholder="Sinopsis breve de la pelicula"  required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="generopelicula">Genero</label>
                    <input type="text" name="generopelicula" class="form-control border-primary rounded-3"  placeholder="Genero" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="idiomapelicula">Idioma</label>
                    <input type="text" name="idiomapelicula" class="form-control border-primary rounded-3" placeholder="Idioma" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 form-group">
                    <label for="fechaestrenopelicula">Fecha de estreno</label>
                    <input type="text" name="fechaestrenopelicula" class="form-control border-primary rounded-3" placeholder="YYYY-MM-DD" value="<?php echo $fechaactual ;?>" maxlength="10" minlength="9" pattern="^[0-9\-]+$" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="duracionpelicula">Duracion</label>
                    <input type="text" name="duracionpelicula" class="form-control border-primary rounded-3" maxlength="8" placeholder="HH:MM:SS" value="00:00:00" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group mb-4">
                    <label for="imagenpelicula">Imagen</label><br>
                    <input type="file" name="imagenpelicula" id="imagenpelicula" class="form-control-file border border-primary w-100">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>