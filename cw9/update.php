<?php
$conn = new mysqli("localhost", "root", "", "dzbanydb");
$ID = $_POST["ID"];
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$pojemnosc = $_POST["pojemnosc"];
$wysokosc = $_POST["wysokosc"];
$sql = "UPDATE dzbany SET nazwa='$nazwa', opis='$opis', pojemnosc=$pojemnosc, wysokosc=$wysokosc WHERE ID=$ID";
$result = $conn->query($sql);
$conn->close();
header("Location: details.php?id=$ID");
