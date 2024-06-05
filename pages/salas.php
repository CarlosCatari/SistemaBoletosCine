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
            <!--  <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar pelicula" aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form> -->
            </div>
        </div>
    </nav>
    <div class="container-fluid d-flex justify-content-between" >
        <div style="font-size:2rem">Sala 2D</div>
        <div id="timer" style="font-size:2rem" class="px-5">05:00</div>
    </div>
    <div class="container-fluid d-flex">
        <div class="align-items-center d-flex justify-content-center px-3">Asiento Vacio</div><div class='p-2 mb-3 ms-2 btn btn-outline-primary disabled'>AA</div>
        <div class="align-items-center d-flex justify-content-center px-3">Asiento Ocupado</div><div class='p-2 mb-3 ms-2s btn btn-outline-primary active'>AA</div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid text-center d-flex flex-column align-items-center">
            <div class="bg-info vw-75 mb-4" style="width:50rem">Pantalla</div>
            <table class="table-auto">
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
                                echo "<td id='$label' class='p-2 mb-3 ms-2 btn btn-outline-primary seat-button'>$label</td>";
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
        <div>Asientos escogidos:</div>
        
        <div>
            <form action="boletos.php" method="post">
                <input id="dato" name="dato" value="A1" style="width: 30px;"></input><br>
                <input type="submit" value="Enviar" class="btn btn-primary">
            </form>
        </div>

</body>
<?php include('../est/footer.php'); ?>