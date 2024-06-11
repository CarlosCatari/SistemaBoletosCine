function seleccionarAsiento(label) {
    var seat = document.getElementById(label);
    seat.classList.toggle('active');

    var selectedSeats = document.querySelectorAll('.seat-button.active');
    var selectedLabels = Array.from(selectedSeats).map(seat => seat.id);

    document.getElementById('butacas-seleccionadas').innerText = selectedLabels.join(', ');
}