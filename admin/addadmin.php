<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');
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
        <form action="addadmin.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dniadmin">DNI</label>
                    <input type="text" name="dniadmin" class="form-control border-primary rounded-3" placeholder="Nº de documento" pattern="[0-9]{8}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="passwordadmin">Clave/contraseña</label>
                    <input type="text" name="passwordadmin" class="form-control border-primary rounded-3" placeholder="Contraseña" pattern="[a-zA-Z0-9\s]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nameadmin">Nombre</label>
                    <input type="text" name="nameadmin" class="form-control border-primary rounded-3" placeholder="Nombre completo" pattern="[a-zA-Z\s]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="surnameadmin">Apellido</label>
                    <input type="text" name="surnameadmin" class="form-control border-primary rounded-3" placeholder="Apellido completo" pattern="[a-zA-Z\s]+"  required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="phoneadmin">Telefono</label>
                    <input type="tel" name="phoneadmin" class="form-control border-primary rounded-3" placeholder="Teléfono" pattern="[0-9]{9}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="emailadmin">Correo</label>
                    <input type="email" name="emailadmin" class="form-control border-primary rounded-3" placeholder="example@gmail.com" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>

        <?php
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
                echo '<div class="alert alert-info" role="alert">Administrador '.$nombreadmin.' '.$apellidoadmin.' agregado correctamente.</div>';
            }
        ?>
    </div>
</body>
<?php include('../est/footer.php'); ?>