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
<body>
    
    <div class="container-fluid d-flex justify-content-between align-items-end" >
        <div style="font-size:2rem">Resumen de compra</div>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <?php foreach ($model -> listarUsuario($user) as $r): ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>DNI:</p>
                    <p><?php echo $r->__get('dni'); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Nombre:</p>
                    <p><?php echo $r->__get('nombre')." ". $r->__get('apellido'); ?></p>                
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Correo electrónico:</p>
                    <p><?php echo $r->__get('correo'); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Sala:</p>
                    <p>2D</p>
                </div>
            </div>
            
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <p>Butacas:</p>
                    <?php
                    if (isset($_POST['butacaselect'])) {
                        $butacaselect = $_POST['butacaselect'];
                        echo '<span>'.$butacaselect.'</span>';
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <a href="#" class="btn btn-primary">Imprimir</a>
            <a href="#" class="btn btn-primary">Inicio</a>
        </div>
    </div>
</body>
</html>