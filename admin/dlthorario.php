<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
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
        <?php   
            if (isset($_POST['codigohorario'])) {
                $codigohorario = $_POST['codigohorario'];
            }
        ?>
        <?php
            foreach ($model-> buscarHorario($codigohorario) as $r):
                $idhorario = $r->__get('idhorario');
                $turno = $r->__get('turno');
            endforeach;
        ?>
        <form action="admhorario.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="cdhorariodlt">Codigo</label>
                    <input type="text" name="cdhorariodlt" class="form-control border-danger bg-light rounded-3" value="<?php echo $idhorario; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="turno">Turno</label>
                    <input type="text" name="turnohorario" class="form-control border-danger bg-light rounded-3" value="<?php echo $turno; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>