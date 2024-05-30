<?php
    require_once "../conectar.php";
    require_once "../Local.Model.php";
    require_once "../Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();
?>
<?php 
    include('../est/header.php');
    session_start();
    $user = $_SESSION['username'];
    $dniuser = $_SESSION['dni'];
?>
<body>
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CineStar</a>
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0 ">
                <li class="nav-item"><a class="nav-link" href="inicio.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="datoscliente.php">Mis Datos</a></li>
                <li class="nav-item"><a class="nav-link" href="peliculas.php">Peliculas</a></li>
                <li class="nav-item"><a class="nav-link active disabled" href="#">Salas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Boletos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid" >
        <div style="font-size:2rem">Salas</div>
    </div>
    <div class="container-fluid d-flex">
        <div class="align-items-center d-flex justify-content-center">Asiento Vacio</div><div class='p-3 m-1 btn btn-outline-primary disabled'>AA</div>
        <div class="align-items-center d-flex justify-content-center">Asiento Ocupado</div><div class='p-3 m-1 btn btn-outline-primary active'>AA</div>
    </div>
    <div class="container-fluid vw-100">
        <div class="container-fluid text-center">
            <div class="bg-info vw-75" style="width:50rem" >Pantalla</div>
            <table>
                <tbody>
                    <?php
                    $capacidadSala = 100;
                    $columnas = 7;
                    $letras = range('A', 'Z');

                    for ($col = 1; $col <= $columnas; $col++) {
                        echo "<tr>";
                        for ($fila = 1; $fila <= ceil($capacidadSala / $columnas); $fila++) {
                            $number = ($fila - 1) * $columnas + $col;
                            $label = $letras[$col - 1] . $fila;

                            if ($number <= $capacidadSala) {
                                echo "<td class='p-3 m-1 btn btn-outline-primary'>$label</td>";
                            } else {
                                echo '<td></td>';
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<?php include('../est/footer.php'); ?>