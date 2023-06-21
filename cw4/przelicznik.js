document.getElementById("przelicz").onclick = function () {
    var wartosc = parseFloat(document.getElementById("zl").value);
    var opcja = document.getElementById("opcje").value;
    var wynik = 0;
    var waluta;
    if (wartosc > 0) {
        if (opcja == "dolar") {
            wynik = wartosc / 4.5;
            waluta = " $";
        }
        else if (opcja == "euro") {
            wynik = wartosc / 5.0;
            waluta = " €";
        }
        wynik = roundN(wynik, 2);
        document.getElementById("wynik").innerHTML = "Wynik: " + wynik + waluta;
    }

}
// https://stackoverflow.com/a/46075337
function roundN(num, n) {
    return parseFloat(Math.round(num * Math.pow(10, n)) / Math.pow(10, n)).toFixed(n);
}