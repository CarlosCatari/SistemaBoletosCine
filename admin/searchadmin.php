<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
    include('../est/header.php');

?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary mb-3">    
        <div>
            <a class="navbar-brand fw-bold" href="admadministrador.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav> 
    <div class="ms-3 h4">Resultado de Busqueda</div>

    <?php if (!empty($msjcliente)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $msjcliente; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($mensajeclientedlt)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $mensajeclientedlt; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="container-fluid w-100">
        <table class="table table-bordered text-center">
            <tr>
                <th>Codigo</th>
                <th>DNI</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Correo</th>
            </tr>
            <?php
                $idadmin = $dni = $pwd = $nombre = $apellido = $telefono = $correo = null;
                $DisableButton = false; 
                if (isset($_POST["dniadmin"])) {
                    $resultado = $model->buscarAdmin($_REQUEST['dniadmin']);
                    
                    if (empty($resultado)) {
                        echo '<div class="alert alert-warning" role="alert">Cliente no registrado!</div>';
                        $DisableButton = true; 
                    } else {
                        foreach ($resultado as $r) { 
                            $idadmin = $r->__get('idadmin');
                            $dni = $r->__get('dniadmin');
                            $pwd = $r->__get('pwdadmin');
                            $nombre = $r->__get('nombreadmin');
                            $apellido = $r->__get('apellidoadmin');
                            $telefono = $r->__get('telefonoadmin');
                            $correo = $r->__get('correoadmin');
                        }
                    }
                }
            ?>
            <tr> 
                <td class="align-middle"><?php echo $idadmin ; ?></td>
                <td class="align-middle"><?php echo $dni ; ?></td>
                <td class="align-middle"><?php echo $pwd ; ?></td>
                <td class="align-middle"><?php echo $nombre ; ?></td>
                <td class="align-middle"><?php echo $apellido ; ?></td>
                <td class="align-middle"><?php echo $telefono ; ?></td>
                <td class="align-middle"><?php echo $correo ; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editadmin.php" method="post">
                            <input type="hidden" name="codigoadmin" id="codigoadmin" value="<?php echo $idadmin; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar" <?php if ($DisableButton) echo 'disabled'; ?>>
                        </form>
                        <form action="dltadmin.php" method="post">
                            <input type="hidden" name="codigoadmin" id="codigoadmin" value="<?php echo $idadmin; ?>">
                            <input type="submit" class="btn btn-danger flex-fill mx-1" value="Eliminar" <?php if ($DisableButton) echo 'disabled'; ?>>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php include('../est/footer.php'); ?>