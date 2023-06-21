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
                <h2>Edycja dzbana</h2>
            </header>
            <?php
            $conn = new mysqli("localhost", "root", "", "dzbanydb");
            $ID = $_GET["id"];
            $sql = "SELECT ID, nazwa, opis, pojemnosc, wysokosc FROM dzbany WHERE ID=$ID";
            $result = $conn->query($sql);
            $row = $result->fetch_object();
            $ID = $row->ID;
            $nazwa = $row->nazwa;
            $opis = $row->opis;
            $pojemnosc = $row->pojemnosc;
            $wysokosc = $row->wysokosc;
            $conn->close();
            ?>
            <form action="update.php" method="post">
                <input type="hidden" name="ID" value="<?= $ID ?>">
                <p>Podaj nazwę dzbana: </p>
                <input type="text" name="nazwa" id="nazwa" value="<?= $nazwa ?>">
                <p>Opis: </p>
                <textarea name="opis" cols="30" rows="10"><?= $opis ?></textarea>
                <p>Podaj pojemność w litrach: </p>
                <input type="number" name="pojemnosc" id="pojemnosc" value="<?= $pojemnosc ?>">
                <p>Podaj wysokość w cm: </p>
                <input type="number" name="wysokosc" id="wysokosc" value="<?= $wysokosc ?>"><br> <br>
                <input type="submit" value="Zapisz dzbana">
            </form>
            <a href='index.php'>Powrót</a>
        </article>
    </main>
</body>

</html>