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
<script>
        function printPage() {
            window.print();
        }
</script>
<body class="bg-info">
    <div class="container w-50 bg-white">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div style="font-size:2rem">Resumen de compra</div>
        <div class="ms-auto">
            <a onclick="printPage()" class="btn btn-primary m-2">Imprimir</a>
            <a href="peliculas.php" class="btn btn-primary m-2">Volver al Inicio</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="p-3">
            <p class="h5">Datos Cliente:</p>
            <?php 
                foreach ($model -> buscarCliente($user) as $r): 
                    $dniuser = " ".$r->__get('dni');
                    $nombrecompleto = " ".$r->__get('nombre')." ". $r->__get('apellido');
                    $correo = " ".$r->__get('correo');
                endforeach; 
            ?>
            <div class="row">
                <div class="col-md-6">
                    <p>Nombre:<?php echo $nombrecompleto; ?></p>
                    <p>Correo:<?php echo $correo ?></p>
                </div>
                <div class="col-md-6">
                    <p>Correo:<?php echo $correo ?></p>
                </div>
            </div>
        </div>
        <div class="p-3">
            <p class="h5">Resumen de compra</p>
            <div>
                <?php
                    if (isset($_POST['butacaselect'])) {
                        $butacas = $_POST['butacaselect'];
                        echo "<p>Butacas seleccionadas: " . $butacas . "</p>";
                    } else {
                        echo "<p>Butacas selecionadas : No se ha seleccionado ninguna butaca.</p>";
                    }
                ?>
            </div>
            <div>
                <?php   
                    if (isset($_POST['horarioselect'])) {
                        $horario = $_POST['horarioselect'];
                        echo "<p>Hora: " . $horario . "</p>";
                    } else {
                        echo "<p>Hora: No se ha seleccionado ningun turno.</p>";
                    }
                ?>
            </div>
            <div>
                <?php   
                    if (isset($_POST['precboleto'])) {
                        $subtotalticket = $_POST['precboleto'];
                        echo "<p>Boletos: Subtotal S/." . $subtotalticket . "</p>";
                    } else {
                        echo "<p>Boletos: No se ha seleccionado boletos.</p>";
                    }
                ?>
            </div>
            <div>
                <?php   
                    if (isset($_POST['pcioprd'])) {
                        $subtotalpdt = $_POST['pcioprd'];
                        echo "<p>Productos: Subtotal S/." . $subtotalpdt . "</p>";
                    } else {
                        echo "<p>Productos: No se ha seleccionado productos.</p>";
                    }
                ?>
            </div>
            <div>
                <?php   
                    if (isset($_POST['pciototal'])) {
                        $totalpago = $_POST['pciototal'];
                        echo "<p>Total S/." . $totalpago . "</p>";
                    } else {
                        echo "<p>Total S/.00.00</p>";
                    }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>