<?php
include("session.php");
require("db.php");
$idDzbana = $_POST["ID"];
$tresc = $_POST["tresc"];
$ocena = $_POST["ocena"];
$nick = $_SESSION["login"];
$sql = "INSERT INTO recenzje(idDzbana, nick, ocena,tresc) VALUES ($idDzbana, '$nick', $ocena,'$tresc')";
$result = $conn->query($sql);
$conn->close();
header("Location: details.php?id={$idDzbana}");
