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
        <article>
            <header>
                <h2>Szczegóły dzbanów</h2>
            </header>
            <?php
            $conn = new mysqli("localhost", "root", "", "dzbanydb");
            $ID = $_GET["id"];
            $sql = "SELECT ID, nazwa, opis, pojemnosc, wysokosc FROM dzbany WHERE ID=$ID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_object();
                echo "<p>";
                echo "Nazwa dzbana: {$row->nazwa}<br>Opis: {$row->opis}<br>Pojemność: {$row->pojemnosc} litrów<br>Wysokość: {$row->wysokosc} cm<br><br>";
                echo "<a href = 'updateForm.php?id={$row->ID}'>Edytuj dzbana</a> <br><br>";
                echo "<a href = 'delete.php?id={$row->ID}'>Usuń dzbana</a>";
                echo "</p>";
            } else {
                echo "Nie masz żadnych dzbanów w swojej kolecji.";
            }
            $conn->close();
            ?>
            <a href='index.php'>Powrót</a>
        </article>
    </main>
</body>

</html>