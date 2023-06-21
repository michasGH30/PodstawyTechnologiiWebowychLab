document.getElementById("dodaj_tech").onclick = function () {
    const nowa = document.createElement("li");
    nowa.innerHTML = document.getElementById("nazwa").value;
    document.getElementById("tech").appendChild(nowa);
    document.getElementById("nazwa").value = "";
}

document.getElementById("usun").onclick = function () {
    const count = document.getElementById("tech").children.length;
    if (count > 0) {
        document.getElementById("tech").removeChild(document.getElementById("tech").children[count - 1]);
    }
}

document.getElementById("wszystkie").onclick = function () {
    const count = document.getElementById("tech").children.length;
    if (count > 0) {
        Array.from(document.getElementById("tech").children).forEach(li => document.getElementById("tech").removeChild(li));
    }
}