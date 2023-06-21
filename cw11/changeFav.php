<?php
require("session.php");
require("db.php");

$idDzbana = $_REQUEST["idDzbana"];
$idUzytkownika = $_SESSION["ID"];
$sql = "SELECT ID FROM ulubione WHERE idDzbana = $idDzbana AND idUzytkownika =
$idUzytkownika";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $ID = $result->fetch_object()->ID;
    $sql = "DELETE FROM ulubione WHERE ID = $ID";
} else {
    $sql = "INSERT INTO ulubione (idDzbana, idUzytkownika) VALUES ($idDzbana,
$idUzytkownika)";
}
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->connect_error;
} else {
    echo "sukces";
}
