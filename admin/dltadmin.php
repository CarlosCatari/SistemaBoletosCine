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
            <a class="navbar-brand fw-bold" href="admadministrador.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  


        
    <div class="container mt-3">
        <?php   
            if (isset($_POST['codigoadmin'])) {
                $codigoadmin = $_POST['codigoadmin'];
            }
        ?>
        <?php
            foreach ($model-> buscaradministrador($codigoadmin) as $r):
                $idadmin = $r->__get('idadmin');
                $dniadmin = $r->__get('dniadmin');
                $pwdadmin = $r->__get('pwdadmin');
                $nombreadmin = $r->__get('nombreadmin');
                $apellidoadmin = $r->__get('apellidoadmin');
                $telefonoadmin = $r->__get('telefonoadmin');
                $correoadmin = $r->__get('correoadmin');
            endforeach;
        ?>
        <form action="admadministrador.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="cdadmin">Codigo</label>
                    <input type="text" name="cdadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $idadmin; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dniadmin">DNI</label>
                    <input type="text" name="dniadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $dniadmin; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="pwdadmin">Contraseña</label>
                    <input type="text" name="pwdadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $pwdadmin; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nombreadmin">Nombre</label>
                    <input type="text" name="nombreadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $nombreadmin; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="apeadmin">Apellido</label>
                    <input type="text" name="apeadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $apellidoadmin; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="teladmin">Telefono</label>
                    <input type="text" name="teladmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $telefonoadmin; ?>" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="correoadmin">Correo</label>
                    <input type="text" name="correoadmin" class="form-control border-danger bg-light rounded-3" value="<?php echo $correoadmin; ?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Eliminar Definitivamente" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>