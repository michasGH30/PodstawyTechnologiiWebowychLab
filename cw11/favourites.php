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
            <?php
            $idUzytkownika = $_SESSION["ID"];
            $sql = "SELECT d.ID, d.nazwa, d.obrazek FROM dzbany d, ulubione u WHERE u.idDzbana = d.ID
            AND idUzytkownika = $idUzytkownika";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table><thead><tr><th>Nazwa</th><th>Zdjęcie</th><th>Szczegóły</th></tr></thead>";
                while ($row = $result->fetch_object()) {
                    echo "<tr><td>{$row->nazwa}</td><td><img src='images/{$row->obrazek}'></td><td><a href='details.php?id={$row->ID}'>Szczegóły</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "Nie masz ulubionych dzbanów.";
            }
            ?>
        </article>
    </main>
<footer>
		<p>Wiadomość do administratora:</p>
		<textarea name="message" id="message" cols="30" rows="10"></textarea>
		<br>
		<input type="button" value="Wyślij" id="sendMessage">
	</footer>
</body>

</html>