
document.querySelector('.card-number').oninput = () => {
    const datousuario = document.querySelector('.card-number').value;
    const usuario = formateofecha(datousuario);
    document.querySelector('.cardNumber').innerText = usuario;


    const mes = formateomes();
    const year = formateanio();
    document.querySelector('.exp-month').innerText = mes;
    document.querySelector('.exp-year').innerText = year;

    function formateomes() {
        const fechaactual = new Date();
        const mes = fechaactual.getMonth() + 1;
        const ciframes = mes < 10 ? '0' + mes : mes;
        return ciframes;
    }

    function formateanio() {
        const fechaactual = new Date();
        const anio = fechaactual.getFullYear();
        const aniofuturo = (anio + 5).toString().slice(-2);
        return aniofuturo;
    }
}
function formateofecha(usuariodata) {
    const fechaactual = new Date();
    const mes = fechaactual.getMonth() + 1;
    const anio = fechaactual.getFullYear().toString().slice(-2);
    const ciframes = mes < 10 ? '0' + mes : mes;
    
    const parte1 = usuariodata.slice(0, 4);
    const parte2 = usuariodata.slice(4, 8);
    const formatousuario = ciframes + anio + '-' + parte1 + '-' + parte2;
    
    return formatousuario;
}
document.querySelector('.card-holder').oninput = () => {
    let nombreCompleto = document.querySelector('.card-holder').value;
    let nombreFormateado = convertirAMayusculas(nombreCompleto);
    document.querySelector('.cardHolderName').innerText = nombreFormateado;
}
function convertirAMayusculas(cadena) {
    let palabras = cadena.toLowerCase().split(' ');
    for (let i = 0; i < palabras.length; i++) {
        palabras[i] = palabras[i].charAt(0).toUpperCase() + palabras[i].slice(1);
    }
    return palabras.join(' ');
}

document.querySelector('.cvv-input').addEventListener('focus', () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
});

document.querySelector('.cvv-input').addEventListener('blur', () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
});

document.querySelector('.cvv-input').oninput = () => {
    const textopass = document.querySelector('.cvv-input').value;
    const textomod = remplazardatos(textopass);
    document.querySelector('.cvvBox').innerText = textomod;
}
function remplazardatos(cvv) {
    const textomodificado = cvv.substring(0, cvv.length - 4);
    const textonormal = cvv.substring(cvv.length - 4);
    const txtmod = textomodificado.replace(/./g, '*') + textonormal;
    return txtmod;
}