<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";

    $loc = new local();
    $model = new LocalModel();
?>
<?php 
    include('../est/header.php');
    session_start();
    $user = $_SESSION['username'];
    $dniuser = $_SESSION['dni'];
?>
<body onload="startTimer()">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="peliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;">Atras
            </a>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-5 col-md-3">
            <div class="container-fluid d-flex justify-content-between mb-4" >
                <div class="fs-3">Sala 2D</div>
                <div class="px-5 mt-1 d-flex">
                    <img class="mt-2 mx-1" src="../icons/reloj-de-arena.png" alt="hora" style="width: 20px; height:25px;">
                    <div id="timer" class="fs-3">05:00</div>
                </div>
                <script src="../js/timer.js"></script>


            </div>
            <div>img_pelicula:</div>
            <div>Pelicula:</div>
            <div>Fecha:</div>
            <div>Horario:</div>
            <div>Butacas seleccionadas: 2</div>
            <div>Entradas: 2</div>
            <div>Dulceria: 2</div>
            <div>Total:</div>
            <div>
                <form action="dulceria.php" method="post">
                    <input id="dato" name="dato" value="A1" style="width: 30px;" class="m-2"></input><br>
                    <input type="submit" value="Ver sesumen de compra" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>


        <div class="col-sm-5 col-md-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="section1-tab" data-toggle="tab" href="#section1" role="tab" aria-controls="section1" aria-selected="true">1. Selecciona tus butacas y turno</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="section2-tab" data-toggle="tab" href="#section2" role="tab" aria-controls="section2" aria-selected="false">2. Entradas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="section3-tab" data-toggle="tab" href="#section3" role="tab" aria-controls="section3" aria-selected="false">3. Dulceria</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="section4-tab" data-toggle="tab" href="#section4" role="tab" aria-controls="section4" aria-selected="false">4. Pago</a>
                </li>
            </ul>

            <!-- Contenido de las pestañas -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="section1" role="tabpanel" aria-labelledby="section1-tab">
                    <div class="container mt-3">
                        <div class="container-fluid text-center d-flex flex-column align-items-center">
                            <div>
                                <div class="d-flex justify-content-center">
                                    <?php foreach ($model -> listarhorario() as $r): ?>
                                        <div class='p-2 mb-3 ms-3 btn btn-outline-primary'><?php echo $r->__get('turno'); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                        </div><hr>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="align-items-center d-flex justify-content-center px-3 pb-3">Disponible</div>
                            <div class='p-2 mb-3 ms-2 btn btn-outline-primary disabled'>AA</div>
                            <div class="align-items-center d-flex justify-content-center px-3 pb-3">Ocupado</div>
                            <div class='p-2 mb-3 ms-2s btn btn-outline-danger active'>AA</div>
                            <div class="align-items-center d-flex justify-content-center px-3 pb-3">Seleccionado</div>
                            <div class='p-2 mb-3 ms-2s btn btn-outline-primary active'>AA</div>
                            <div class="align-items-center d-flex justify-content-center px-3 pb-3">Silla de ruedas</div>
                            <div class='p-2 mb-3 ms-2s btn btn-outline-primary active'>AA</div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                    <div class="container mt-3">
                        <h2>Sección 2</h2>
                        <p>Contenido de la Sección 2.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                    <div class="container mt-3">
                        <h2>Sección 3</h2>
                        <p>Contenido de la Sección 3.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="section4" role="tabpanel" aria-labelledby="section4-tab">
                    <div class="container mt-3">
                        <h2>Sección 4</h2>
                        <p>Contenido de la Sección 4.</p>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
        </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>