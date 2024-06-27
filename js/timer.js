var countdownTime = 300;

function startTimer() {
    var timer = setInterval(function() {
        var minutes = Math.floor(countdownTime / 60);
        var seconds = countdownTime % 60;

        document.getElementById('timer').innerHTML = "0" + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

        if (countdownTime <= 0) {
            clearInterval(timer);
            window.location.href = "peliculas.php";
        }
        countdownTime--;
    }, 1000);
}