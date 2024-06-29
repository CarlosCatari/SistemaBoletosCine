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

            <?php
                if (isset($_POST['idpelicula'])) {
                    $idpelicula = $_POST['idpelicula'];
                }
                
                foreach ($model-> buscarPelicula($idpelicula) as $r):
                    $nombrepelicula = $r->__get('nombrepelicula');
                    $urlpelicula = "../images/".$r->__get('imagen');
                        if (empty($urlpelicula)) {
                            $urlpelicula = 'images/fondopeliculapd.png';
                        }
                endforeach;
            ?>
            <div class="container-fluid d-flex justify-content-center mb-2">
                <img src="<?php echo $urlpelicula; ?>" class="rounded-circle" alt="plc" style="width: 200px; height: 200px;">
            </div>
            <div>
                <img class="pb-2" src="../icons/claqueta.png" alt="claqueta" style="width: 25px;">
                <?php echo '<span>'.$nombrepelicula.'</span>'; ?>
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

            <script src="../js/asientos.js"></script>
            <form action="resumen.php" method="POST">
                <div> 
                    <img class="pb-2" src="../icons/reloj.png" alt="hora" style="width: 25px;">
                    <span id="horario">Hora seleccionada</span>
                    <input type="hidden" name="horarioselect" id="horarioselect">
                </div>
                <div>
                    <img class="pb-2" src="../icons/butaca.png" alt="butaca" style="width: 25px;">
                    <span id="butacas-seleccionadas">Butacas seleccionadas</span>
                    <input type="hidden" name="butacaselect" id="butacaselect">
                </div>
                <div>
                    <img class="pb-2" src="../icons/boletos.png" alt="boletos" style="width: 25px;">
                    <span id="contadorboleto">Boletos</span>
                </div>
                <div>
                    <img class="pb-2" src="../icons/dulceria.png" alt="dulceria" style="width: 25px;">
                    <span id="contadordulceria">Dulceria</span>
                </div>
                <div>
                    <strong>Total:</strong> S/.<span id="preciboletos">0</span>
                    <input type="hidden" name="precboleto" id="precboleto">
                </div>
                <div>
                    <button onclick="copyLabelValue()" type="submit" class="btn btn-primary mt-3">Ver resumen de compra</button>
                </div>
            </form>
            <script>
                function copyLabelValue() {
                    var labelValue = document.getElementById('butacas-seleccionadas').textContent;
                    document.getElementById('butacaselect').value = labelValue;

                    var labelValue2 = document.getElementById('horario').textContent;
                    document.getElementById('horarioselect').value = labelValue2;

                    var labelValue3 = document.getElementById('preciboletos').textContent;
                    document.getElementById('precboleto').value = labelValue3;
                }
            </script>
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
                <a onclick="copiarDatos()" class="nav-link" id="section3-tab" data-toggle="tab" href="#section3" role="tab" aria-controls="section3" aria-selected="false">3. Dulceria</a>
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
                                <?php 
                                    foreach ($model->listarhorario() as $r):
                                        $horario = $r->__get('turno');
                                        $dateTime = DateTime::createFromFormat('H:i:s', $horario);
                                        $hours = (int) $dateTime->format('H');
                                        $minutes = (int) $dateTime->format('i');
                                        $turno = $hours. ":". $minutes."pm";
                                ?>
                                <button onclick="mostrarHorario('<?php echo $turno; ?>')" class="p-2 mb-3 ms-3 btn btn-outline-primary"><?php echo $turno; ?></button>
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
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane fade " id="section2" role="tabpanel" aria-labelledby="section2-tab">
                    <div class="container mt-3">
                        <div class="row">


                        
                            <div class="col-6">
                                <div class="row w-100 d-flex align-items-center">
                                    <p class="fw-bold fs-4">Entradas Generales</p>
                                    <?php foreach ($model->listarboleto() as $r): 
                                        $idboleto = $r->__get('idboleto');
                                        $tipoboleto = $r->__get('tipoboleto');
                                        $descripcion = $r->__get('descripcionboleto');
                                        $precioboleto = $r->__get('precioboleto');
                                    ?>
                                    <div class="col-6">
                                        <p class="fs-3 mb-0"><?php echo $tipoboleto?></p>
                                        <p class="m-0"><?php echo $descripcion?></p>
                                        <p>Precio regular:<br>S/.<span class="precio"><?php echo $precioboleto;?></span></p>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="mt-auto counter-container" id="contenedor1">
                                            <button class="btn btn-outline-primary mb-1 ms-2 rounded-circle button decrement1">-</button>
                                            <span class="label1 mx-2 mt-4 fs-4" id="counterValue-<?php echo $idboleto; ?>">0</span>
                                            <button class="btn btn-outline-primary mb-1 rounded-circle button increment1">+</button>
                                            <span class="mx-3" id="valueTicket-<?php echo $idboleto; ?>"><?php echo $precioboleto; ?></span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <script>
                                        function copiarDatos() {
                                            var ctd1 = document.getElementById('counterValue-1').textContent;
                                            var pco1 = document.getElementById('valueTicket-1').textContent;
                                            var ctd2 = document.getElementById('counterValue-2').textContent;
                                            var pco2 = document.getElementById('valueTicket-2').textContent;
                                            var ctd3 = document.getElementById('counterValue-3').textContent;
                                            var pco3 = document.getElementById('valueTicket-3').textContent;

                                            total = (ctd1 * pco1)+(ctd2 * pco2)+(ctd3 * pco3);
                                            document.getElementById('preciboletos').textContent = total;
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row w-100 d-flex align-items-center">
                                    <p class="fw-bold fs-4">Descuentos</p>
                                    <div class="col">
                                        <p>Codigo de canje:</p>
                                        <input class="border border-primary p-1 rounded-2 w-50" type="text" placeholder="Ingrese codigo canje" pattern="[a-zA-Z0-9\s]+">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../js/botonesboleto.js"></script>


                <div class="tab-pane fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                <div class="container mt-3">
                    <div class="container-fluid">
                    <div class="d-flex flex-wrap">
                        <?php foreach ($model->listardulceria() as $r): ?>
                        <div class="card w-50">
                            <div class="container-fluid text-center">
                                <div class="row">
                                <div class="col w-75">
                                    <h5 class="card-title"><?php echo $r->__get('tipo'); ?></h5>
                                    <p class="card-text"><?php echo $r->__get('producto'); ?></p>
                                    <p class="card-text"><?php echo $r->__get('descripcion'); ?></p>
                                    <div class="mt-auto counter-container" id="contenedor2">
                                    <button class="btn btn-outline-primary mb-3 ms-2 rounded-circle button decrement2">-</button>
                                    <span class="label2 fs-4" id="counterValue-<?php echo $r->__get('id'); ?>">0</span>
                                    <button class="btn btn-outline-primary mb-3 rounded-circle button increment2">+</button>
                                    <span class="mx-3 fs-5">S/.<?php echo $r->__get('precio'); ?></span>
                                    </div>
                                </div>
                                <div class="col ">
                                    <img class="m-4" src="../images/fondodulceria.png" alt="imagenpelicula" style="height: 180px;">
                                </div>

                                </div>
                                
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
                <script src="../js/botonesdulceria.js"></script>
                </div>


                <div class="tab-pane fade" id="section4" role="tabpanel" aria-labelledby="section4-tab">
                <div class="container mt-3">
                    <?php 
                        foreach ($model -> buscarCliente($dniuser) as $r):
                            $dni = $r->__get('dni');
                            $nombrecompleto = $r->__get('nombre') ." ". $r->__get('apellido');;
                            $telefono = $r->__get('telefono');
                            $correo = $r->__get('correo');
                        endforeach; 
                    ?>
                    <div>Elige una forma de pago</div>
                    <div>
                        <input class="border border-primary p-1 rounded-2 w-25" type="text" placeholder="Nombre completo" value="<?php echo $nombrecompleto; ?>">
                        <input class="border border-primary p-1 rounded-2 w-25" type="text" placeholder="Correo electrónico" value="<?php echo $correo; ?>">
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="opcion1">
                        <label class="form-check-label" for="opcion1">Tarjeta de Crédito o Débito</label>
                    </div>
                    
                    <div id="contenedor-tarjeta" class="mt-3">
                        <img src="../icons/visa.jpg" alt="visa" style="width: 50px;">
                        <img src="../icons/american.png" alt="visa" style="width: 50px;">
                        <img src="../icons/mastercard.png" alt="visa" style="width: 50px;"><br>

                        <form action="#">
                        <select class="border border-primary p-1 rounded-2 w-25" name="tipo" id="tipo">
                        <option value="Tipo">Tipo de Tarjeta</option>
                            <option value="Crédito">Crédito</option>
                            <option value="Débito">Débito</option>
                        </select>
                        <input class="border border-primary p-1 rounded-2  w-25" type="text" placeholder="Número de la tarjeta">
                        

                        <select class="border border-primary p-1 rounded-2 m-2 " name="Mes" id="Mes">
                            <option value="Mes">Mes</option>
                            <option value="01">01</option>
                            <option value="01">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <select class="border border-primary p-1 rounded-2 m-2 " name="anio" id="anio">
                            <option value="Año">Año</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
                        
                        <input class="border border-primary p-1 rounded-2 m-2 " type="text" placeholder="CVV"><br>

                        <select class="border border-primary p-1 rounded-2 mt-2  w-25" name="tipodoc" id="tipodoc">
                            <option value="Tipo de Documento">Tipo de Documento</option>
                            <option value="DNI">DNI</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input class="border border-primary p-1 rounded-2 mt-2 w-25" type="text" placeholder="Número de documento" id="numero-doc-tarjeta"><br>
                        <span>Total a Pagar: S/. 00.00</span>
                        <input class="btn btn-outline-primary m-2 disabled" type="submit" value="Pagar">
                        </form>
                    </div>
                        <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="opcion2">
                        <label class="form-check-label" for="opcion2">Billetera Electrónica</label>
                    </div>
                    <div id="contenedor-billetera" class="mt-3">

                        <select class="border border-primary p-1 rounded-2 w-25" name="tipodoc" id="tipodoc2">
                            <option value="Tipo de Documento">Tipo de Documento</option>
                            <option value="DNI">DNI</option>
                            <option value="DNI">Pasaporte</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input class="border border-primary p-1 rounded-2 w-25" type="text" placeholder="Número de documento" id="numero-doc-billetera">
                        <input class="border border-primary p-1 rounded-2 m-1 w-25" type="text" placeholder="Número de celular" id="numero-celular"><br>
                        <div class="row justify-content-start">
                        <div class="col-6 col-sm-3">
                            <span>Total a Pagar: S/. 00.00</span>
                            <div id="ventana-esperando-pago" style="display: none;">
                                <button class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Esperando pago...
                                </button>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <img src="../icons/yape.png" alt="yape" style="width: 100px;">
                            <img src="../icons/qr.png" alt="qryape" style="width: 100px;">
                        </div>
                        <div class="col-6 col-sm-3">
                            <img src="../icons/plin.jpg" alt="plin" style="width: 100px; height: 100px;">
                            <img src="../icons/qr.png" alt="qrplin" style="width: 100px;">
                        </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const dni = '<?php echo $dniuser; ?>';
                            const phone = '<?php echo $telefono; ?>';
                            window.dniUser = dni;
                            window.phoneUser = phone;
                        });
                    </script>
                    <script src="../js/billeteras.js"></script>
                    
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