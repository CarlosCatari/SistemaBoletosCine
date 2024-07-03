<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

    if(isset($_POST["dniuser"])) {
        $dni = $_POST["dniuser"];
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

        $model->AgregarCliente($data);
        $nomcompleto = strtoupper($nombre). " ". strtoupper($apellido);
        $msjclient = 'Cliente '. $nomcompleto.' agregado correctamente.';
    }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">    
        <div>
            <a class="navbar-brand fw-bold" href="admclientes.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav> 
    
    <?php if (!empty($msjclient)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $msjclient; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
        <form action="addclientes.php" method="post" class="p-3">
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="dniuser">DNI</label>
                    <input type="text" name="dniuser" class="form-control border-primary rounded-3" placeholder="Nº de documento" minlength="7" maxlength="8" pattern="[0-9]{8}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control border-primary rounded-3" minlength="8" placeholder="Minimo 8 caracteres" pattern="[a-zA-Z0-9]+" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="nameuser">Nombre</label>
                    <input type="text" name="nameuser" class="form-control border-primary rounded-3" placeholder="Nombre completo" pattern="[a-zA-Z\s]+" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" name="surname" class="form-control border-primary rounded-3" placeholder="Apellido completo" pattern="[a-zA-Z\s]+"  required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="phone">Telefono</label>
                    <input type="tel" name="phone" class="form-control border-primary rounded-3" placeholder="Teléfono" minlength="8" maxlength="9" pattern="[0-9]{9}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" class="form-control border-primary rounded-3" placeholder="example@gmail.com" minlength="5" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
<?php include('../est/footer.php'); ?>