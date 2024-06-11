<?php
    require_once "../mvc/conectar.php";
    require_once "../mvc/Local.Model.php";
    require_once "../mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();

    include('../est/header.php');
    session_start();
    $user = $_SESSION['username'];
    $dniuser = $_SESSION['dni'];
?>


<body onload="startTimer()">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div>
            <a class="navbar-brand fw-bold" href="peliculas.php">
                <img src="../icons/izquierda.png" alt="atras" style="width: 20px;"> Atras
            </a>
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-sm-5 col-md-3" >
            <div class="container-fluid d-flex justify-content-between mb-4" >
                <div class="fs-3 mt-1">Sala 2D</div>
                <div class="px-5 mt-1 d-flex">
                    <img class="mt-2 mx-1" src="../icons/reloj-de-arena.png" alt="hora" style="width: 20px; height:25px;">
                    <div id="timer" class="fs-3">05:00</div>
                </div>
                <script src="../js/timer.js"></script>
            </div>
            
            <div class="container-fluid d-flex justify-content-center mb-2">
                <img src="../images/fondopeliculapd.png" class="rounded-circle" alt="pelis" style="width: 200px; ">
            </div>

            <div>
                <img class="pb-2" src="../icons/claqueta.png" alt="claqueta" style="width: 25px;">
                <?php
                    if (isset($_POST['nombrepelicula'])) {
                        $nombrepelicula = $_POST['nombrepelicula'];
                        echo '<span>'.$nombrepelicula.'</span>';
                    }
                ?>
            </div>
            <hr>
            <div>
                <img class="pb-2" src="../icons/calendario.png" alt="calendario" style="width: 25px;">
                <?php
                    $fecha = new DateTime();
                    echo '<span>Hoy '.$fecha->format('d M Y').'</span>';
                ?>
            </div>
            <script src="../js/turno.js"></script>
            <div> 
                <img class="pb-2" src="../icons/reloj.png" alt="hora" style="width: 25px;">
                <span id="horario">Hora seleccionada</span>
            </div>

            <script src="../js/asientos.js"></script>
            <div>
                <img class="pb-2" src="../icons/butaca.png" alt="butaca" style="width: 25px;">
                <span id="butacas-seleccionadas">Butacas seleccionadas</span>
            </div>
            <div>
                <img class="pb-2" src="../icons/boletos.png" alt="boletos" style="width: 25px;">
                <span id="contadorboleto">Boletos</span>
            </div>
            <div>
                <img class="pb-2" src="../icons/dulceria.png" alt="dulceria" style="width: 25px;">
                <span id="contadordulceria">Dulceria</span>
            </div>
            <div>Total:</div>
            <div>
                <form action="resumen.php" method="post">
                    <input type="submit" value="Ver resumen de compra" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>


        <div class="col-sm-7 col-md-9 ">
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

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="section1" role="tabpanel" aria-labelledby="section1-tab">
                    <div class="container mt-3">
                        <div class="container-fluid text-center d-flex flex-column align-items-center">
                            <div>
                            <div class="d-flex justify-content-center">
                                <?php foreach ($model->listarhorario() as $r): ?>
                                    <?php $hora = $r->__get('turno'); ?>
                                    <button onclick="mostrarHorario('<?php echo $hora; ?>')" class="p-2 mb-3 ms-3 btn btn-outline-primary">
                                        <?php echo $hora; ?>
                                    </button>
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
                                                echo "<td id='$label' class='p-2 mb-3 ms-2 btn btn-outline-primary seat-button' onclick='seleccionarAsiento(\"$label\")'>$label</td>";
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
                    <div class="row">
                        <?php foreach ($model->listarboleto() as $r): ?>
                            <div class="col-md-3 mb-2">
                            <div class="card text-white text-center bg-info" style="width: 100%; height: 17rem;">
                                <div class="mt-auto">
                                    <h5 class="card-title"><?php echo $r->__get('tipoboleto'); ?></h5>
                                </div>
                                <div class="mt-auto">
                                    <p class="card-text"><?php echo $r->__get('descripcionboleto'); ?></p>
                                </div>
                                <div class="mt-auto counter-container" id="contenedor1">
                                    <button class="btn btn-outline-primary mb-1 ms-2 rounded-circle button decrement1">-</button>
                                    <span class="label1" id="counterValue-<?php echo $r->__get('id'); ?>">0</span>
                                    <button class="btn btn-outline-primary mb-1 rounded-circle button increment1">+</button>
                                    <span class="mx-3">S/.<?php echo $r->__get('precioboleto'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <script src="../js/botonesboleto.js"></script>
                </div>


                <div class="tab-pane fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                <div class="container mt-3">
                    <div class="row">
                        <?php foreach ($model->listardulceria() as $r): ?>
                        <div class="col-md-3 mb-2">
                            <div class="card text-white text-center bg-info" style="width: 100%; height: 17rem;">
                                <div class="mt-auto">
                                    <h5 class="card-title"><?php echo $r->__get('tipo'); ?></h5>
                                </div>
                                <div class="mt-auto">
                                    <p class="card-text"><?php echo $r->__get('producto'); ?></p>
                                    <p class="card-text"><?php echo $r->__get('descripcion'); ?></p>
                                </div>
                                <div class="mt-auto counter-container" id="contenedor2">
                                    <button class="btn btn-outline-primary mb-1 ms-2 rounded-circle button decrement2">-</button>
                                    <span class="label2" id="counterValue-<?php echo $r->__get('id'); ?>">0</span>
                                    <button class="btn btn-outline-primary mb-1 rounded-circle button increment2">+</button>
                                    <span class="mx-3">S/.<?php echo $r->__get('precio'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <script src="../js/botonesdulceria.js"></script>
                </div>


                <div class="tab-pane fade" id="section4" role="tabpanel" aria-labelledby="section4-tab">
                <div class="container mt-3">
                    <div>Elige una forma de pago</div>
                    <div>
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Nombre completo">
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Correo electrónico">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="opcion1">
                        <label class="form-check-label" for="opcion1">Tarjeta de Crédito o Débito</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="opcion2">
                        <label class="form-check-label" for="opcion2">Billetera Electrónica</label>
                    </div>

                    <div id="contenedor-tarjeta" class="mt-3">
                        <form action="">
                        <img src="../icons/visa.jpg" alt="visa" style="width: 50px;">
                        <img src="../icons/american.png" alt="visa" style="width: 50px;">
                        <img src="../icons/mastercard.png" alt="visa" style="width: 50px;"><br>
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Número de la tarjeta">
                        <select class="border border-primary p-1 rounded-2" name="tipo" id="tipo">
                        <option value="Tipo">Tipo de Tarjeta</option>
                            <option value="Crédito">Crédito</option>
                            <option value="Débito">Débito</option>
                        </select><br>

                        <select class="border border-primary p-1 rounded-2" name="Mes" id="Mes">
                            <option value="Mes">Mes</option>
                            <option value="01">01</option>
                            <option value="01">02</option>
                        </select>
                        <select class="border border-primary p-1 rounded-2" name="anio" id="anio">
                            <option value="Año">Año</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                        
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="CVV"><br>

                        <select class="border border-primary p-1 rounded-2" name="tipodoc" id="tipodoc">
                            <option value="Tipo de Documento">Tipo de Documento</option>
                            <option value="DNI">DNI</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Número de documento" ><br>
                        <span>Total a Pagar: S/. 00.00</span>
                        <input type="submit" value="Pagar">
                        </form>

                    </div>

                    <div id="contenedor-billetera" class="mt-3">
                        <form action="">
                        <select class="border border-primary p-1 rounded-2" name="tipodoc" id="tipodoc">
                            <option value="Tipo de Documento">Tipo de Documento</option>
                            <option value="DNI">DNI</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Número de documento" ><br>
                        <input class="border border-primary p-1 rounded-2" type="text" placeholder="Número de celular"><br>
                        <img src="../icons/yape.png" alt="yape" style="width: 50px;">
                        <img src="../icons/plin.jpg" alt="plin" style="width: 50px;">
                        <img src="../icons/tunki.jpg" alt="tunki" style="width: 50px;"><br>

                        <img src="../icons/qr.png" alt="qryape" style="width: 50px;">
                        <img src="../icons/qr.png" alt="qrplin" style="width: 50px;">
                        <img src="../icons/qr.png" alt="qrtunki" style="width: 50px;"><br>
                        <span>Total a Pagar: S/. 00.00</span>
                        <input type="submit" value="Pagar">
                        </form>
                    </div>
                    
                </div>
                <script src="../js/botonespago.js"></script>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
        </div>
    </div>
    </div>
</body>
<?php include('../est/footer.php'); ?>