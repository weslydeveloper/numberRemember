//all variables
var lenght = 0;
var number = 1111111;
var score = 0;
var time = 3000;
var input = document.getElementById("input");
var good = document.getElementById("good");
var bad = document.getElementById("bad");
var button = document.getElementById("button");
var text = document.getElementById("text");

//coockie voor highscore
var highscore = getCookie("highscore");
if (highscore == "") {
    highscore = 0;
}

document.getElementById("highscore").innerHTML = "High-score: " + highscore;
document.getElementById("score").innerHTML = "Score: " + score;

button.addEventListener("click", Calculate);

// maak input niet zichtbaar
input.style.display = 'none';


document.addEventListener("keyup", function (event) {
    event.preventDefault();

    //kijkt of er op enter wordt geklikt na het invoeren van getal
    if (event.keyCode == 13 && button.style.display != "none") {
        document.getElementById("button").click();
    }
});

function Calculate() {

    text.style.display = 'block';
    input = document.getElementById("input").value;
    button.style.display = 'none';
    button.value = "Enter to check";
    document.getElementById("input").style.display = 'none';

    //dit gebeurt er bij start van spel of als nummer goed geraden is
    if (input == number || number == 1111111) {
        if (number != 1111111) {
            score++;

            //score wordt in beeld gezet
            document.getElementById("score").innerHTML = "Score: " + score;
        }

        //random nummer wordt gegenereerd
        number = Math.floor(Math.random() * 10).toString();
        for (var i = 0; i < lenght; i++) {
            var random = Math.floor(Math.random() * 10).toString();
            number = number + random;
        }

        //remeber number screen
        text.innerHTML = "Remember the next number";
        setTimeout(StartChange, 2000);
        setTimeout(ChangeName, time);
        lenght++;
        time = time + 700;

        //dit gebeurt er als het nummer niet goed geraden is
    } else {
        var firstscore = document.cookie.substr(10);

        //kijken of de highscore gebroken is van jezelf
        if (score > firstscore) {
            document.cookie = "highscore=" + score;
            highscore = getCookie("highscore");
            document.getElementById("highscore").innerHTML = "High-score: " + highscore;
        }

        //score opslaan scherm
        good.innerHTML = number;
        bad.innerHTML = input;
        var safe = score * 0.546 + 3;
        lenght = 0;
        button.value = "try again";
        button.style.display = 'none';
        text.innerHTML = "submit your score";
        var verstuurform = document.getElementById("verstuur");
        verstuurform.style.display = "block";
        document.getElementById("scorehid").value = score;
        document.getElementById("safehid").value = safe;
        number = 1111111;
        score = 0;

    }

}

//pakt de highscore coockie
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

//laat nummer zien
function StartChange() {
    text.innerHTML = number;
}

// verbergt text en button en laat het weer zien
function ChangeName() {
    text.innerHTML = "...";
    text.style.display = 'none';
    button.style.display = 'inline-block';

    input = document.getElementById("input");
    input.style.display = 'inline-block';
    input.focus();
    input.value = "";
}





