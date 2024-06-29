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
            <a class="navbar-brand fw-bold" href="admhorario.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  
    <div class="container mt-3">
        <form action="addhorario.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="turno">Turno</label>
                    <input type="text" name="turno" class="form-control border-primary rounded-3" placeholder="00:00:00" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>

            <?php
                if(isset($_POST["turno"])) {
                    $turno = $_POST["turno"];

                    $data = new Local();
                    $data->__set('turno', $turno);

                    $model->AgregarHorario($data);
                    echo '<div class="alert alert-info" role="alert">Horario agregado correctamente.</div>';
                }
        ?>
    </div>
</body>
<?php include('../est/footer.php'); ?>