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
            $ID = $_SESSION["ID"];
            $rola = $_SESSION["rola"];
            if($rola == "user") {
                $sql = "SELECT IDuzytkownika, tresc, data FROM zgloszenia WHERE IDuzytkownika = $ID";
            }
            else if($rola == "admin") {
                $sql = "SELECT IDuzytkownika, tresc, data FROM zgloszenia";
            }
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    if($rola == "user") {
                        echo "<div>";
                        echo "<p>Do admninitratora wysłałeś wiadomość: $row->tresc, data: $row->data</p>";
                        echo "</div>";
                    }
                    else if($rola == "admin") {
                        $IDu = $row->IDuzytkownika;
                        $sql = "SELECT login, email FROM uzytkownicy WHERE ID = $IDu";
                        $res = $conn->query($sql);
                        $r = $res->fetch_object();
                        echo "<div>";
                        echo "<p>Od użytkownika: $r->login, o email: $r->email, wiadomość: $row->tresc, data: $row->data</p>";
                        echo "</div>";
                    }
                    
                }
            }
            else 
            {
                echo "<div>";
                if($rola == "user") {
                    echo "Nie wysłałeś żadnych wiadomości";
                }
                else if($rola == "admin") {
                    echo "Nie dostałeś żadnych wiadomości.";
                }   
                echo "</div>";
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