<?php
$conn = new mysqli("localhost", "root", "", "dzbanyv4db");
$nazwa = $_POST["nazwa"];
$idKategorii = $_POST["idKategorii"];
$obrazek = basename($_FILES["obrazek"]["name"]);
$opis = $_POST["opis"];
$pojemnosc = $_POST["pojemnosc"];
$wysokosc = $_POST["wysokosc"];
$sql = "INSERT INTO dzbany(idKategorii, nazwa, obrazek,opis, pojemnosc, wysokosc) VALUES ($idKategorii, '$nazwa', '$obrazek','$opis', $pojemnosc, $wysokosc)";
$result = $conn->query($sql);
move_uploaded_file($_FILES["obrazek"]["tmp_name"], "images/" . $obrazek);
$conn->close();
header('Location: index.php');
