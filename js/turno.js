function convertirTiempo(tiempo) {
    let [horas, minutos] = tiempo.split(':');
    horas = parseInt(horas, 10);
    return horas + ':' + minutos;
}

function mostrarHorario(tiempo) {
    const tiempoConvertido = convertirTiempo(tiempo);
    document.getElementById('horario').innerText = tiempoConvertido;

    var buttons = document.querySelectorAll('.btn-outline-primary');
    buttons.forEach(function(button) {
        button.classList.remove('active');
    });
    event.target.classList.add('active');
}