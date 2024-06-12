<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $model = new LocalModel();
    $mensaje = '';

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

        $model->AgregarUsuario($data);
        $mensaje = $nombre. " has sido registrado correctamente";
    }


    include('../est/header.php');
?>


<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('../images/fondo1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    
    <form action="registro.php" method="post">
        
        <div class="bg-white p-5 rounded-5 text-secondary" style="width:50rem">
            <div class="d-flex justify-content-between align-items-end mb-3" >
                <div style="font-size:2rem">Registro</div>
                <a class="text-decoration-none text-primary fw-semibold display-6" href="loguin.php">X</a>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="document" class="form-label">Documento de identidad:</label>
                    <input class="form-control" name="dniuser" type="text" id="document" placeholder="Nº de documento" required>
                </div>
                <div style="width:20rem">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input class="form-control" name="password" type="password" id="password" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="name" class="form-label">Nombre:</label>
                    <input class="form-control" name="nameuser" type="text" id="name" placeholder="Nombre" required>
                </div>
                <div style="width:20rem">
                    <label for="surname" class="form-label">Apellido:</label>
                    <input class="form-control" name="surname" type="text" id="surname" placeholder="Apellido" required>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center mb-3">
                <div style="width:20rem">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <input class="form-control" name="phone" type="tel" id="phone" placeholder="Teléfono" required>
                </div>
                <div style="width:20rem">
                    <label for="email" class="form-label">Correo:</label>
                    <input class="form-control" name="email" type="email" id="email" placeholder="example@gmail.com" required>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-3">
                <?php
                    if (!empty($mensaje)) {
                        echo "<div class='alert alert-success'>$mensaje</div>";
                    }
                ?>
                <button type="submit" class="btn btn-primary text-white w-100 mt-4 ms-4 me-3">Registrar</button>
            </div>
            
        </div>
    </form>
</body>
<?php include('../est/footer.php'); ?>