<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Metoda Get</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>Opis języka programowania</h1>
    </header>
    <main>
        <?php
        echo "<article>";
        echo "<header><h1>";
        switch ($_GET["id"]) {
            case 1:
                echo "C++";
                break;
            case 2:
                echo "Python";
                break;
            case 3:
                echo "PHP";
                break;
            case 4:
                echo "Java";
                break;
        }
        echo "</h1>";
        echo "<p>";
        switch ($_GET["id"]) {
            case 1:
                echo "C++ jest to nastepca języka C. Posiada pojęcie obiektowości. Używany jest do pisania programów dektopowych i gier.";
                break;
            case 2:
                echo "Python jest językiem interpretowalnym. Posiada prostą składnię. Obecnie ma niesamowicie dużo zastosowań, chociaż najbardziej jest używany w machine learningu.";
                break;
            case 3:
                echo "PHP jest językiem stworzonym do pisania aplikacji webowych jako język BACK-END'owy";
                break;
            case 4:
                echo "Java jest językiem obietkowym mającym różne zastosowania. Jej przewagą jest to, że możemy raz skompilować program oraz za pomocą 'interpretera' uruchomić ją na każdym urządzeniu go mającym";
                break;
        }
        echo "</p>";
        echo "</article>";
        ?>
        <a href="index.html">Powrót</a>
    </main>
</body>

</html>