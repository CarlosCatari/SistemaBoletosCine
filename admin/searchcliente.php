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
            <a class="navbar-brand fw-bold" href="admclientes.php">
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
                if(isset($_POST["dnicliente"])) {
                    foreach ($model->buscarCliente($_REQUEST['dnicliente']) as $r) { 
                        $idcliente = $r->__get('idcliente');
                        $dni = $r->__get('dni');
                        $pwd = $r->__get('pwd');
                        $nombre = $r->__get('nombre');
                        $apellido = $r->__get('apellido');
                        $telefono = $r->__get('telefono');
                        $correo = $r->__get('correo');
                    }
                }
                /* if(isset($_POST["namecliente"])) {
                    foreach ($model->buscarClientenombre($_REQUEST['namecliente']) as $r) { 
                        $idcliente = $r->__get('idcliente');
                        $dni = $r->__get('dni');
                        $pwd = $r->__get('pwd');
                        $nombre = $r->__get('nombre');
                        $apellido = $r->__get('apellido');
                        $telefono = $r->__get('telefono');
                        $correo = $r->__get('correo');
                    }
                } */
            ?>
            <tr> 
                <td class="align-middle"><?php echo $idcliente ; ?></td>
                <td class="align-middle"><?php echo $dni ; ?></td>
                <td class="align-middle"><?php echo $pwd ; ?></td>
                <td class="align-middle"><?php echo $nombre ; ?></td>
                <td class="align-middle"><?php echo $apellido ; ?></td>
                <td class="align-middle"><?php echo $telefono ; ?></td>
                <td class="align-middle"><?php echo $correo ; ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-around align-items-stretch">
                        <form action="editclientes.php" method="post">
                            <input type="hidden" name="codigocliente" id="codigocliente" value="<?php echo $idcliente; ?>">
                            <input type="submit" class="btn btn-info flex-fill mx-1" value="Editar">
                        </form>
                        <form action="dltclientes.php" method="post">
                            <input type="hidden" name="codigocliente" id="codigocliente" value="<?php echo $idcliente; ?>">
                            <input type="submit" class="btn btn-danger flex-fill mx-1" value="Eliminar">
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php include('../est/footer.php'); ?>