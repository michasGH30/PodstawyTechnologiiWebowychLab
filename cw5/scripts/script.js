var lp = 1;
document.getElementById("dodaj").onclick = function () {
    document.getElementById("kapibara").classList.remove("biega_anim");
    document.getElementById("kapibara").classList.add("biega");
    const wiersz = document.createElement("tr");

    const numer = document.createElement("td");
    const imie = document.createElement("td");
    const nazwisko = document.createElement("td");
    const email = document.createElement("td");
    const wiek = document.createElement("td");
    const data = document.createElement("td");
    const plec = document.createElement("td");
    const grupa = document.createElement("td");

    numer.innerHTML = lp;
    imie.innerHTML = document.getElementById("imie").value;
    nazwisko.innerHTML = document.getElementById("nazwisko").value;
    email.innerHTML = document.getElementById("email").value;
    wiek.innerHTML = document.getElementById("wiek").value;
    data.innerHTML = document.getElementById("uro").value;
    // https://stackoverflow.com/questions/9618504/how-to-get-the-selected-radio-button-s-value
    plec.innerHTML = document.querySelector('input[name="plec"]:checked').value;
    let g = document.getElementById("grupa").value;
    grupa.innerHTML = g;


    numer.className = g;
    imie.className = g;
    nazwisko.className = g;
    email.className = g;

    wiek.className = g;
    data.className = g;
    plec.className = g;
    grupa.className = g;

    wiersz.appendChild(numer);
    wiersz.appendChild(imie);
    wiersz.appendChild(nazwisko);
    wiersz.appendChild(email);
    wiersz.appendChild(wiek);
    wiersz.appendChild(data);
    wiersz.appendChild(plec);
    wiersz.appendChild(grupa);

    document.getElementById("cialo").appendChild(wiersz);
    lp++;
    document.getElementById("kapibara").classList.remove("biega");
    setTimeout(function () {
        document.getElementById("kapibara").classList.add("biega_anim");
    }, 10);
}
