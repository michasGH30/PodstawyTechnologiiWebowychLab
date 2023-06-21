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
                <h2>Dodaj dzbana</h2>
            </header>
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <p>Podaj nazwę dzbana: </p>
                <input type="text" name="nazwa" id="nazwa">
                <p>Obrazek: </p>
                <input type="file" name="obrazek" id="obrazek">
                <p>Kategoria: </p>
                <select name="idKategorii" id="idKategorii">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "dzbanyv2db");
                    $sql = "SELECT ID, nazwa FROM kategorie";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo "<option value='{$row->ID}'>{$row->nazwa}</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <p>Opis: </p>
                <textarea name="opis" cols="30" rows="10"></textarea>
                <p>Podaj pojemność w litrach: </p>
                <input type="number" name="pojemnosc" id="pojemnosc">
                <p>Podaj wysokość w cm: </p>
                <input type="number" name="wysokosc" id="wysokosc"><br>
                <br>
                <input type="submit" value="Dodaj dzbana">
            </form>
            <br>
            <a href='index.php'>Powrót</a>
        </article>
    </main>
</body>

</html>