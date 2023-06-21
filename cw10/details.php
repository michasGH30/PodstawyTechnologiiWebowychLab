<?php
include("session.php");
require("db.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP i baza danych</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>Witamy w dzbalni!</h1>
    </header>
    <main>
        <?php
        include("panel.php");
        ?>
        <article>
            <header>
                <h2>Szczegóły dzbanów</h2>
            </header>
            <?php
            $ID = $_GET["id"];
            $sql = "SELECT AVG(ocena) AS srednia FROM recenzje WHERE IdDzbana=$ID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $srednia = $result->fetch_object()->srednia;

                $sql = "SELECT idKategorii, k.nazwa AS nazwaKat, d.nazwa, obrazek, d.opis, pojemnosc, wysokosc FROM dzbany d, kategorie k WHERE d.ID=$ID AND idKategorii=k.ID";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_object();
                    echo "<p>";
                    echo "Nazwa dzbana: {$row->nazwa}<br>Opis: {$row->opis}<br>Pojemność: {$row->pojemnosc} litrów<br>Wysokość: {$row->wysokosc} cm<br>Średnia ocen: {$srednia}<br><img src='images/{$row->obrazek}'/><br><br>";

                    echo "<a href = 'index.php?idKat={$row->idKategorii}'>Inne dzbany z tej kategorii</a> <br><br>";
                    echo "</p>";
                } else {
                    echo "Wystąpił błąd!!!";
                }
            } else {
                echo "Nie masz żadnych dzbanów w swojej kolecji.";
            }
            ?>
        </article>
        <article>
            <header>
                <h2>Dodaj recenzję</h2>
            </header>
            <form action="insertReview.php" method="post">
                <input type="hidden" name="ID" value="<?= $ID ?>">
                <p>Twoja ocena: </p>
                <select name="ocena" id="ocena">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p>
                    Treść recenzji:
                </p>
                <textarea name="tresc" id="tresc" cols="30" rows="10"></textarea> <br> <br>
                <input type="submit" value="Dodaj recenzję">
            </form>
        </article>
        <article>
            <header>
                <h2>Wszystkie recenzje</h2>
            </header>
            <?php
            $sql = "SELECT nick, ocena, tresc, data FROM recenzje WHERE idDzbana=$ID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    echo "<section>";
                    echo "<p>Nick recenzenta: {$row->nick}<br>Ocena: {$row->ocena}<br>Treść recenzji: {$row->tresc}<br>Data dodania recenzji: {$row->data}</p>";
                    echo "</section>";
                }
            } else {
                echo "Dzban nie ma jeszcze żadnych recenzji.";
            }
            $conn->close();
            ?>
        </article>
        <a href="index.php">Powrót</a>
    </main>
</body>

</html>