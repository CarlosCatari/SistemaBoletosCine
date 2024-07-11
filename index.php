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
                                <a href="pages/loguin.php" class="btn"><img src="icons/compraspelicula.png" alt="comprar" >Comprar</a>
                                <form action="pages/verpelicula.php" method="POST" class="mb-1">
                                    <input type="hidden" name="idpelicula" value="<?php echo $idpelicula; ?>">
                                    <button type="submit" class="btn btn-primary" style="width: 10rem;"><img class="p-1 mx-2" src="icons/signo+.png" alt="boletos" style="width: 15px;">Detalles</button>
                                </form>
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
                <div class="flexbox">
                    <div class="inputBox">
                        <label>DNI</label>
                        <input type="text" class="card-number" placeholder="Nº de documento" maxlength="8" minlength="7" pattern="[0-9]{8}" required>
                    </div>
                    <div class="inputBox">
                        <label>Clave</label>
                        <input type="text"  class="cvv-input" placeholder="Min 8 caracteres"  minlength="8" maxlength="20" pattern="[a-zA-Z0-9]+" required>
                    </div>
                </div>
                <div class="inputBox">
                    <label for="">Titular</label>
                    <input type="text" class="card-holder" placeholder="Nombre y Apellido" pattern="[a-zA-Z\s]+" required>
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <label>Telefono</label>
                        <input name="phone" type="tel" id="phone" placeholder="Teléfono" minlength="8" maxlength="9" pattern="[0-9]{9}" required>
                    </div>
                    <div class="inputBox">
                        <label>Correo</label>
                        <input name="email" type="email" id="email" placeholder="example@gmail.com" minlength="5" required>
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
                    <div class="cardNumber">####-####-####</div>
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
                        <div>
                            <img src="icons/pegatina.png" alt="pegatina">
                            <div class="cvvBox"></div>
                        </div>
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
