var lp = 1;
document.getElementById("dodaj").onclick = function () {
    const wiersz = document.createElement("tr");
    const numer = document.createElement("td");
    const tytul = document.createElement("td");
    const rez = document.createElement("td");
    const rok = document.createElement("td");

    numer.innerHTML = lp;
    tytul.innerHTML = document.getElementById("tytul").value;
    rez.innerHTML = document.getElementById("rez").value;
    rok.innerHTML = document.getElementById("rok").value;

    wiersz.appendChild(numer);
    wiersz.appendChild(tytul);
    wiersz.appendChild(rez);
    wiersz.appendChild(rok);

    document.getElementById("cialo").appendChild(wiersz);
    lp++;

    document.getElementById("tytul").value = "";
    document.getElementById("rez").value = "";
    document.getElementById("rok").value = "";
}