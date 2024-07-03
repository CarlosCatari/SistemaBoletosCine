var imagenes = [
    "images/espejo.jpg",
    "images/garfield.jpg",
    "images/planetasimios.png"
];

var imagen = document.getElementById("imagen");
imagen.src = imagenes[0];

var sliderderecho = document.querySelector(".sliderLeft");
var sliderizquierdo = document.querySelector(".sliderRight");
var contador = 0;

function moverderecha(){
    contador++;
    if (contador > imagenes.length - 1) {
        contador = 0;
    }
    imagen.src = imagenes[contador];
}
sliderderecho.addEventListener("click", moverderecha);

function moverizquierdo(){
    contador--;
    if (contador < 0) {
        contador = imagenes.length - 1;
    }
    imagen.src = imagenes[contador];
}
sliderizquierdo.addEventListener("click", moverizquierdo);
