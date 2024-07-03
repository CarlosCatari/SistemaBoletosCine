<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["dniadmin"])) {
        $dniadmin = $_POST["dniadmin"];
        $pwdadmin = $_POST["passwordadmin"];
        $nombreadmin = $_POST["nameadmin"];
        $apellidoadmin = $_POST["surnameadmin"];
        $telefonoadmin = $_POST["phoneadmin"];
        $correoadmin = $_POST["emailadmin"];

        $data = new Local();
        $data->__set('dniadmin', $dniadmin);
        $data->__set('pwdadmin', $pwdadmin);
        $data->__set('nombreadmin', $nombreadmin);
        $data->__set('apellidoadmin', $apellidoadmin);
        $data->__set('telefonoadmin', $telefonoadmin);
        $data->__set('correoadmin', $correoadmin);

        $model->AgregarAdministrador($data);
        $nomcompladmin = strtoupper($nombreadmin). " ". strtoupper($apellidoadmin);
        $msjadmin = 'Administrador '. $nomcompladmin.' agregado correctamente.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admadministrador.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>  

    <?php if (!empty($msjadmin)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjadmin; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
        <form action="addadmin.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dniadmin">DNI</label>
                    <input type="text" name="dniadmin" class="form-control border-primary rounded-3" minlength="7" maxlength="8" placeholder="Nº de documento" pattern="[0-9]{8}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="passwordadmin">Contraseña</label>
                    <input type="text" name="passwordadmin" class="form-control border-primary rounded-3" minlength="8" placeholder="Minimo 8 caracteres"  pattern="[a-zA-Z0-9]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nameadmin">Nombre</label>
                    <input type="text" name="nameadmin" class="form-control border-primary rounded-3" placeholder="Nombre" pattern="[a-zA-Z\]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="surnameadmin">Apellido</label>
                    <input type="text" name="surnameadmin" class="form-control border-primary rounded-3" placeholder="Apellido" pattern="[a-zA-Z\]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="phoneadmin">Telefono</label>
                    <input type="tel" name="phoneadmin" class="form-control border-primary rounded-3" placeholder="Teléfono" minlength="8" maxlength="9" pattern="[0-9]{9}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="emailadmin">Correo</label>
                    <input type="email" name="emailadmin" class="form-control border-primary rounded-3" placeholder="example@gmail.com" minlength="5" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>