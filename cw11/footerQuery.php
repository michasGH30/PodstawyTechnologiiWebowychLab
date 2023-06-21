<?php
require("session.php");
require("db.php");

$message = $_REQUEST["data"];
$idUzytkownika = $_SESSION["ID"];
$sql = "INSERT INTO zgloszenia(IDuzytkownika, tresc) VALUES ($idUzytkownika, '$message')";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "sukces";
}
