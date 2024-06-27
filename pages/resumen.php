<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();
?>
<?php 
    include('../est/header.php');
    session_start();
    $user = $_SESSION['dni'];
?>
<body class="bg-info">
    <div class="container w-50 bg-white">
    <div class="container-fluid d-flex">
        <div style="font-size:2rem">Resumen de compra</div>
        <a href="#" class="btn btn-primary m-2">Imprimir</a>
        <a href="peliculas.php" class="btn btn-primary m-2">Volver al Inicio</a>
    </div>
    <div class="container-fluid">
        <div class="p-3">
            <?php 
                foreach ($model -> listarUsuario($user) as $r): 
                    $dniuser = " ".$r->__get('dni');
                    $nombrecompleto = " ".$r->__get('nombre')." ". $r->__get('apellido');
                    $correo = " ".$r->__get('correo');
                endforeach; 
            ?>
            <div class="mb-3">
                <div style="width:20rem">
                    <p>Datos Cliente:</p>
                    <p>DNI:<?php echo $dniuser ?></p>
                    <p>Nombre:<?php echo $nombrecompleto; ?></p>
                    <p>Correo electrónico:<?php echo $correo; ?></p>
                </div>
            </div>
        </div>
        <div class="p-3">
            <div>
                <p>Canje:</p>
                <p>codigo canje:</p>
            </div>
        </div>
        <div class="p-3">
            <div>
                <p>Resumen de compra</p>
                <?php
                    if (isset($_POST['butacaselect'])) {
                        $butacas = $_POST['butacaselect'];
                        echo "<p>Butacas seleccionadas: " . $butacas . "</p>";
                    } else {
                        echo "<p>No se ha seleccionado ninguna butaca.</p>";
                    }
                ?>
            </div>
            <div>
                <?php   
                    if (isset($_POST['horarioselect'])) {
                        $horario = $_POST['horarioselect'];
                        echo "<p>Hora: " . $horario . "</p>";
                    } else {
                        echo "<p>No se ha seleccionado ningun turno.</p>";
                    }
                ?>
            </div>
        </div>


        <div class="p-3">
            <div>
                <p>Dulcería:</p>
            </div>
        </div>
        <hr>
        <div>
                <?php   
                    if (isset($_POST['precboleto'])) {
                        $totalpago = $_POST['precboleto'];
                        echo "<p>Total S/." . $totalpago . "</p>";
                    } else {
                        echo "<p>No se ha seleccionado ningun turno.</p>";
                    }
                ?>
            </div>
    </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>