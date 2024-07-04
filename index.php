<?php 
    require_once "mvc/conectar.php";
    require_once "mvc/Local.Model.php";
    require_once "mvc/Local.entidad.php";
    $loc = new local();
    $model = new LocalModel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineStar</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">CineStar</a>
            <ul class="nav">
                <li><a class="nav-link" href="index.php">Inicio</a></li>
                <li><a class="nav-link" href="pages/notfound.php">Peliculas</a></li>
                <li><a class="nav-link" href="pages/notfound.php">Salas</a></li>
                <li><a class="nav-link" href="pages/notfound.php">Boletos</a></li>
                <li><a class="nav-link" href="pages/notfound.php">Dulceria</a></li>
                <li><a class="nav-link" href="pages/notfound.php">Blog</a></li>
            </ul>
            <ul class="nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="pages/loguin.php">Iniciar Sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/registro.php">Registrarse</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/loguin.php"><img src="icons/usuario2.png" alt="img_usuario"></a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="contenedorSlider">
            <div class="sliderLeft">
                <img src="icons/atras.png" alt="back">
            </div>
            <div class="sliderScreen">
                <img id="imagen" src="">
            </div>
            <div class="sliderRight">
                <img src="icons/adelante.png" alt="nxt">
            </div>
        </div>
        <script src="js/slider.js"></script>
    </main>

    <section>
        <div class="containermain">
            <div class="containerTitle">
                <h3>Cartelera</h3>
                <div class="arrows"></div>
            </div>
            <div class="containerMovie">
                <button id="aleft" class="aleft"><img src="icons/atras.png" alt="atras"></button>
                <div class="containerCarrusel">
                    <div class="carrusel">

                        <?php 
                            foreach ($model->listarPelicula() as $r):
                                $idpelicula = $r->__get('idpelicula');
                                $nombrepelicula = $r->__get('nombrepelicula');
                                $urlpelicula = "images/".$r->__get('imagen');
                                    if (empty($urlpelicula)) {
                                        $urlpelicula = 'images/fondo_peliculas.jpg';
                                    }
                                $sipnopsis = $r->__get('sinopsis');
                                $director = $r->__get('director');
                        ?>
                        <div class="movie">
                            <img src="<?php echo $urlpelicula; ?>" alt="pelicula">
                            <div class="infoMovie">
                                <a class="btn"><img src="icons/compraspelicula.png" alt="comprar" >Comprar</a>
                                <a class="btn"><img src="icons/anadir.png" alt="masinfo">Ver Detalles</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                </div>
                <button id="aright" class="aright"><img src="icons/adelante.png" alt="adelante"></button>
            </div>
        </div>
        <script src="js/peliculas.js"></script>
    </section>

    <section>
        <div class="containerSocio" id="containerSocio">
            <form action="#">
                <div class="inputBox">
                    <label>DNI</label>
                    <input type="text" class="card-number" maxlength="8" pattern="[1-9]{8}" placeholder="Ingrese su dni"  required>
                </div>
                <div class="inputBox">
                    <label for="">Titular</label>
                    <input type="text" class="card-holder" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+" maxlength="30" placeholder="Nombre y apellido" required>
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <label>Vencimiento mm</label>
                        <select class="month-input" required>
                            <option value="month" selected disabled>Mes</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
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
                    </div>
                    <div class="inputBox">
                        <label>Vencimiento yy</label>
                        <select class="year-input" required>
                            <option value="year" selected disabled>Año</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                            <option value="2034">2034</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <label>Clave</label>
                        <input type="text"  class="cvv-input" placeholder="Min 10 caracteres"  maxlength="20" minlength="10" pattern="[1-9]{20}" required>
                    </div>
                </div>
                <input type="submit" value="Unirse" class="btnSubmit">
                <input type="submit" value="Mas Info" class="btnSubmit">
            </form>
            
            <div class="cardContainer">
                <div class="front">
                    <div class="image">
                        <img src="icons/chip.png" alt="chip">
                        <img src="icons/logo-tarjeta2.png" alt="tarjeta-logo">
                    </div>
                    <div class="cardNumber">####-########</div>
                    <div class="flexBox">
                        <div class="box">
                            <span>TITULAR</span>
                            <div class="cardHolderName">Nombre y Apellido</div>
                        </div>
                        <div class="box">
                            <span>VENCIMIENTO</span>
                            <div class="expiration">
                                <span class="exp-month">MM</span>
                                <span>/</span>
                                <span class="exp-year">YY</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvvBox"></div>
                        <img src="icons/logo-tarjeta2.png" alt="visa">
                        <img src="icons/seguridad.png" alt="seguridad">
                    </div>
                </div>
            </div>
            
        </div>
        <script src="js/memberships.js"></script>
    </section>

    <footer class="footer">
        <div class="footerContenedor">
            <ul class="icon">
                <li><a href="#"><img src="icons/fb.png" alt="facebook"></a></li>
                <li><a href="#"><img src="icons/ig.png" alt="instagram"></a></li>
                <li><a href="#"><img src="icons/twiter.png" alt="twiter"></a></li>
                <li><a href="#"><img src="icons/yt.png" alt="youtube"></a></li>
            </ul>
            <div class="footerInfo">
                <p>Preguntas frecuentes</p>
                <p>Prensa</p>
                <p>Formas de ver</p>
                <p>Preferencias de cookies</p>
                <p>Prueba de velocidad</p>
                <p>Centro de ayuda</p>
                <p>Relaciones con inversionistas</p>
                <p>Terminos de uso</p>
                <p>Informacion corporativa</p>
                <p>Cuenta</p>
                <p>Empleo</p>
                <p>Privacidad</p>
                <p>Contactanos</p>
                <p>Solo en netflix</p>
            </div>
            <p class="language">◍ Español</p>
            <p class="copy">© 2024</p>
        </div>
    </footer>
</body>
</html>
