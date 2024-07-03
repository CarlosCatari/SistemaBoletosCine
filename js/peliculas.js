const fila = document.querySelector('.containerCarrusel');
const btnleft = document.querySelector('.aleft');
const btnright = document.querySelector('.aright');

btnright.addEventListener('click',() =>{
    fila.scrollLeft += fila.offsetWidth;
    const arrowactive = document.querySelector('.arrows .activo');
    if (arrowactive.nextSibling){
        arrowactive.nextSibling.classList.add('activo');
        arrowactive.classList.remove('activo');
    }
});
btnleft.addEventListener('click',() =>{
    fila.scrollLeft -= fila.offsetWidth;
    const arrowactive = document.querySelector('.arrows .activo');
    if (arrowactive.previousSibling){
        arrowactive.previousSibling.classList.add('activo');
        arrowactive.classList.remove('activo');
    }
});

const pelicula = document.querySelectorAll('.movie');
const numpag = Math.ceil(pelicula.length / 6);
for (let i = 0; i < numpag; i++) {
    const btnpag = document.createElement('button');
    if(i === 0){
        btnpag.classList.add('activo');
    }
    btnpag.addEventListener('click', (e) => {
        fila.scrollLeft = i * fila.offsetWidth;
        document.querySelectorAll('.arrows .activo').forEach((button) => button.classList.remove('activo'));
        e.target.classList.add('activo');
    });
    document.querySelector('.arrows').appendChild(btnpag);
}

pelicula.forEach((movie) => {
    movie.addEventListener('mouseenter', (e) => {
        const elements = e.currentTarget;
        setTimeout(() => {
            pelicula.forEach(movie => movie.classList.remove('hover'));
            elements.classList.add('hover')
        }, 300);
    });
});
fila.addEventListener('mouseleave', () =>{
    pelicula.forEach(movie => movie.classList.remove('hover'));
})
