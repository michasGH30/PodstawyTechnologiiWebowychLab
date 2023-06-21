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
                <h2>Moje recenzje</h2>
            </header>

            <?php
            $nick = $_SESSION["login"];
            $sql = "SELECT ocena, tresc, data, d.id AS idDzbana, nazwa FROM recenzje r, dzbany d WHERE d.id = idDzbana AND nick = '$nick'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_object()) {
                echo "<div>";
                echo "<p>Ocena: {$row->ocena}, treść: {$row->tresc}, dodano: {$row->data} <br>Dla dzbana: <a href='details.php?id={$row->idDzbana}'>{$row->nazwa}</a></p>";
                echo "</div>";
            }
            ?>
            <a href="index.php">Powrót</a>
        </article>
    </main>
</body>

</html>