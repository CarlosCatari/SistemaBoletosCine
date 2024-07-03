<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');
    session_start();

    if (isset($_POST['codigocliente'])) {
        $codigocliente = $_POST['codigocliente'];
    }
    foreach ($model-> buscarIdCliente($codigocliente) as $r):
        $idcliente = $r->__get('idcliente');
        $dni = $r->__get('dni');
        $pwd = $r->__get('pwd');
        $nombre = $r->__get('nombre');
        $apellido = $r->__get('apellido');
        $telefono = $r->__get('telefono');
        $correo = $r->__get('correo');
    endforeach;
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admclientes.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  
    <div class="container mt-3">
        <form action="admclientes.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="codcliente">Codigo</label>
                    <input type="text" name="codcliente" class="form-control border-primary bg-light rounded-3" value="<?php echo $idcliente; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dnicliente">DNI</label>
                    <input type="text" name="dnicliente" class="form-control border-primary rounded-3" value="<?php echo $dni; ?>" minlength="7" maxlength="8" placeholder="Nº de documento" pattern="[0-9]{8}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="pwdcliente">Contraseña</label>
                    <input type="text" name="pwdcliente" class="form-control border-primary rounded-3" value="<?php echo $pwd; ?>" minlength="8" placeholder="Minimo 8 caracteres" pattern="[a-zA-Z0-9]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombrecliente">Nombre</label>
                    <input type="text" name="nombrecliente" class="form-control border-primary rounded-3" value="<?php echo $nombre; ?>" placeholder="Nombre" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="apecliente">Apellido</label>
                    <input type="text" name="apecliente" class="form-control border-primary rounded-3" value="<?php echo $apellido; ?>" minlength="2" placeholder="Apellido" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="telcliente">Telefono</label>
                    <input type="text" name="telcliente" class="form-control border-primary rounded-3" value="<?php echo $telefono; ?>" placeholder="Teléfono" minlength="8" maxlength="9" pattern="[0-9]{9}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="correocliente">Correo</label>
                    <input type="text" name="correocliente" class="form-control border-primary rounded-3" value="<?php echo $correo; ?>" placeholder="example@gmail.com" minlength="5" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>