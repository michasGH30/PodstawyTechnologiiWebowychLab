<?php
$conn = new mysqli("localhost", "root", "", "dzbanydb");
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$pojemnosc = $_POST["pojemnosc"];
$wysokosc = $_POST["wysokosc"];
$sql = "INSERT INTO dzbany(nazwa, opis, pojemnosc, wysokosc) VALUES ('$nazwa', '$opis', $pojemnosc, $wysokosc)";
$result = $conn->query($sql);
$conn->close();
header('Location: index.php');
