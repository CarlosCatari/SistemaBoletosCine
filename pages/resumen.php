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
<?php 
    foreach ($model -> buscarCliente($user) as $r): 
        $dniuser = " ".$r->__get('dni');
        $nombrecompleto = " ".$r->__get('nombre')." ". $r->__get('apellido');
        $correo = " ".$r->__get('correo');
    endforeach; 

    if (isset($_POST['butacaselect'])) {
        $butacas = $_POST['butacaselect'];
    }

    if (isset($_POST['horarioselect'])) {
        $horario = $_POST['horarioselect'];
    }

    if (isset($_POST['precboleto'])) {
        $subtotalticket = $_POST['precboleto'];
    }

    if (isset($_POST['pcioprd'])) {
        $subtotalpdt = $_POST['pcioprd'];
    }

    if (isset($_POST['pciototal'])) {
        $totalpago = $_POST['pciototal'];
    }
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
                <a onclick="printPage()" class="btn btn-primary m-2">Descargar</a>
                <a href="peliculas.php" class="btn btn-primary m-2">Volver al Inicio</a>
            </div>
        </div><hr>
        <div class="container-fluid text-center">
            <div class="h4 fw-bold">Pelicula</div>
            <div class="h6 text-primary">Nro de compra:</div>
            <div>
                <img src="../icons/qr.png" alt="qr" style="width: 120px;">
            </div>
        </div><hr>
        <div class="container-fluid">
            <div class="text-danger">Muestra el código QR desde tu celular para canjear tus combos e ingresar a la sala. No necesitas pasar por boleteria ni imprimir este documento</div>
        </div><hr>
        <div class="container-fluid">
            <div class="row text-center">
                <img src="" alt="">
                <div>Cliente:<span class="fw-bold"><?php echo $nombrecompleto; ?></span></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <img src="" alt="">
                    <div>CP Arequipa</div>
                </div>
                <div class="col-md-3">
                    <img src="" alt="">
                    <div>Fecha</div>
                </div>
                <div class="col-md-3">
                    <img src="" alt="">
                    <div><?php echo $horario; ?></div>
                </div>
                <div class="col-md-3">
                    <img src="" alt="">
                    <div>SALA 2D</div>
                </div>
            </div>
        </div><hr>
        <div class="container-fluid">
            <div>
                <img src="" alt="">
                <div>Tus butacas: <span><?php echo $butacas; ?></span></div>
            </div>
        </div><hr>
        <div class="container-fluid">
            <div class="row">
                <img src="" alt="">
                <div>Entradas</div>
            </div>
            <div class="row mx-4">
                <div class="col-md-4">
                    -
                </div>
                <div class="col-md-4 text-center">
                    Cant. -
                </div>
                <div class="col-md-4 text-end">
                Subtotal: S/.<?php echo $subtotalticket; ?>
                </div>
            </div>
        </div><hr>
        <div class="container-fluid">
            <div class="row">
                <img src="" alt="">
                <div>Productos</div>
            </div>
            <div class="row mx-4">
                <div class="col-md-4">
                    -
                </div>
                <div class="col-md-4 text-center">
                    Cant. -
                </div>
                <div class="col-md-4 text-end">
                    Subtotal: S/.<?php echo $subtotalpdt; ?>
                </div>
            </div>
        </div><hr>
        <div class="container-fluid">
            <div class="row text-danger text-end mx-4"><span class="fw-bold">Total: S/. <?php echo $totalpago; ?></span></div>
        </div>
        <div class="container-fluid">
            <p class="fw-bold">Estimado Cliente</p>
            <p>Para un mejor servicio resliazar los siguentes pasos</p>
            <ul>
                <li>Presentar desde tu dispositivo movil este documento con el QR en el ingreso a las salas. No tiene que pasar por boleterias ni imprimirlo.</li>
                <li>Si compraste un producto en dulceria diriguete a la zona de despacho para recoger tu producto</li>
                <li>si solo compraste entradas, diriguete al ingreso de tu sala.</li>
                <li class="text-danger">Esta compra no permite cambio de función, anulación y/o devolución de dinero.</li>
            </ul>
        </div>
        <div class="container-fluid pb-4">
        <p class="mt-3 mb-0">Cine S.A. - Av. Arequipa N<sup>o</sup> 520 - Miraflores - Arequipa - Arequipa.</p>
        <p style="border-top: 5px solid red; margin: 0;"></p>
        </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>