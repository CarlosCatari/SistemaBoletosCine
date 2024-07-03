<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new Local();
    $model = new LocalModel();

    include('../est/header.php');
    session_start();
    $user = $_SESSION['dni'];

    if(isset($_POST["dniuser"])) {
        $dni = $_POST['dniuser'];
        $pwd = $_POST["password"];
        $nombre = $_POST["nameuser"];
        $apellido = $_POST["surname"];
        $telefono = $_POST["phone"];
        $correo = $_POST["email"];
            
        $data = new Local();
        $data->__set('dni', $dni);
        $data->__set('pwd', $pwd);
        $data->__set('nombre', $nombre);
        $data->__set('apellido', $apellido);
        $data->__set('telefono', $telefono);
        $data->__set('correo', $correo);
            
        $model->ActualizarCliente($data);
        $mensajemod = 'Datos modificados correctamente.!';
    }
?>
<body class="justify-content-center align-items-center vh-100">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div>
            <a class="navbar-brand fw-bold px-2" href="datoscliente.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px; padding-bottom:6px;"> Atras
            </a>
        </div>
    </nav>
    <?php if (!empty($mensajemod)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjadmin; ?>
        </div>
    <?php endif; ?>
    <div class="container-fluid d-flex justify-content-center">
    <form action="editardatos.php" method="post">
        <?php foreach ($model -> buscarCliente($user) as $r):
            $dnicli = $r->__get('dni');
            $clavecli = $r->__get('pwd');
            $nombrecli = $r->__get('nombre');
            $apellcli = $r->__get('apellido');
            $telcli = $r->__get('telefono');
            $correocli = $r->__get('correo');
        ?>
        <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <div class="d-flex justify-content-between align-items-end mb-3" >
                <div style="font-size:2rem">Actualizar Datos</div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="document" class="form-label">Documento de identidad:</label>
                    <input class="form-control" value="<?php echo $dnicli; ?>" name="dniuser" type="text" id="document" minlength="7" maxlength="8" placeholder="Nº de documento" pattern="[0-9]{8}" required>
                </div>
                <div style="width:20rem">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input class="form-control" value="<?php echo $clavecli; ?>" name="password" type="password" id="password" placeholder="Contraseña" pattern="[a-zA-Z0-9]+" required>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="name" class="form-label">Nombre:</label>
                    <input class="form-control" value="<?php echo $nombrecli; ?>" name="nameuser" type="text" id="name" placeholder="Nombre" pattern="[a-zA-Z\]+" required>
                </div>
                <div style="width:20rem">
                    <label for="surname" class="form-label">Apellido:</label>
                    <input class="form-control" value="<?php echo $apellcli; ?>" name="surname" type="text" id="surname" placeholder="Apellido" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <input class="form-control" value="<?php echo $telcli; ?>" name="phone" type="tel" id="phone" placeholder="Teléfono" minlength="8" maxlength="9" pattern="[0-9]{9}" required>
                </div>
                <div style="width:20rem">
                    <label for="email" class="form-label">Correo:</label>
                    <input class="form-control" value="<?php echo $correocli; ?>" name="email" type="email" id="email" minlength="5" placeholder="example@gmail.com" required>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-3">
                <button type="submit" class="btn btn-primary text-white w-100 mt-4 ms-4 me-3">Guardar Cambios</button>
            </div>
        <?php endforeach; ?>
        </div>
    </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>