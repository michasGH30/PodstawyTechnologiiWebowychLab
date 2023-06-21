<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przywitanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    echo '<p style="color:' . $_POST["kolory"] . '">';
    echo "Witaj " . $_POST["imie"] . " " . $_POST["naz"];
    echo "</p>";
    ?>
    <a href="index.html">Powrót</a>
</body>

</html>