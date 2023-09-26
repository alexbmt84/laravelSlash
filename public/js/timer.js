let seconds = 0;
let interval;

function pomodoro(mins) {

    seconds = mins*60 || 0;

    interval = setInterval(function() {

        seconds--;

        if(!seconds){
            clearInterval(interval);
            alert("");
        }

    },1000)

}

pomodoro(1);
