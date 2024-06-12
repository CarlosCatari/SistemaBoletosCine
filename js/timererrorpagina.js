function startTimer(duration, display) {
    var timer = duration, seconds;
    setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {
            window.location.href = "loguin.php";
        }
    }, 1000);
}

window.onload = function () {
    var fifteenSeconds = 15,
        display = document.querySelector('#time');
    startTimer(fifteenSeconds, display);
};