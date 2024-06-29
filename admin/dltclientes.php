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
            <a class="navbar-brand fw-bold" href="admclientes.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  


        
    <div class="container mt-3">
        <?php   
            if (isset($_POST['codigocliente'])) {
                $codigocliente = $_POST['codigocliente'];
            }
        ?>
        <?php
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
        <form action="admclientes.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="cdcliente">Codigo</label>
                    <input type="text" name="cdcliente" class="form-control border-primary rounded-3" value="<?php echo $idcliente; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dnicliente">DNI</label>
                    <input type="text" name="dnicliente" class="form-control border-primary rounded-3" value="<?php echo $dni; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="pwdcliente">Contraseña</label>
                    <input type="text" name="pwdcliente" class="form-control border-primary rounded-3" value="<?php echo $pwd; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombrecliente">Nombre</label>
                    <input type="text" name="nombrecliente" class="form-control border-primary rounded-3" value="<?php echo $nombre; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="apecliente">Apellido</label>
                    <input type="text" name="apecliente" class="form-control border-primary rounded-3" value="<?php echo $apellido; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="telcliente">Telefono</label>
                    <input type="text" name="telcliente" class="form-control border-primary rounded-3" value="<?php echo $telefono; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="correocliente">Correo</label>
                    <input type="text" name="correocliente" class="form-control border-primary rounded-3" value="<?php echo $correo; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>