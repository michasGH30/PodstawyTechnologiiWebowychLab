function zmiana_tekstu() {
    document.getElementById("demo").innerHTML = document.getElementById("zmiana").value;
}
function zmiana_css() {
    document.getElementById("demo").style.fontSize = document.getElementById("pixels").value + "px";
}

let zmieniony = false;

function zmiana_atrybutow() {
    if (!zmieniony) {
        document.getElementById("zmiana_btn").setAttribute("value", "Zmieniony");
        zmieniony = true;
    }
    else {
        document.getElementById("zmiana_btn").setAttribute("value", "Zmień tekst");
        zmieniony = false;
    }
}

let widoczny = true;

function zmiana_widocznosci() {
    if (widoczny) {
        document.getElementById("demo").style.display = "none";
        widoczny = false;
    }
    else {
        document.getElementById("demo").style.display = "block";
        widoczny = true;
    }
}

function zmiana_zdjecia(zdjecie) {
    document.getElementById("do_zmiany").setAttribute("src", zdjecie.src);
}

function wykonaj_dzialanie() {
    let n1 = parseInt(document.getElementById("n1").value);
    let n2 = parseInt(document.getElementById("n2").value);
    let dzialanie = document.getElementById("dzialania").value;
    let w;
    if (dzialanie == "+") {
        w = n1 + n2;
    }
    else if (dzialanie == "-") {
        w = n1 - n2;
    }
    else if (dzialanie == "*") {
        w = n1 * n2;
    }
    else if (dzialanie == "/") {
        if (n2 != 0)
            w = n1 / n2;
        else
            w = "Nie można dzielić przez 0";
    }
    document.getElementById("wynik").innerHTML = n1 + " " + dzialanie + " " + n2 + " = " + w;
}