var countdownTime = 300;

function startTimer() {
    var timer = setInterval(function() {
        var minutes = Math.floor(countdownTime / 60);
        var seconds = countdownTime % 60;

        document.getElementById('timer').innerHTML = "0" + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

        if (countdownTime <= 0) {
            clearInterval(timer);
            document.getElementById('timer').innerHTML = "Time's up!";
        }
        countdownTime--;
    }, 1000);
}