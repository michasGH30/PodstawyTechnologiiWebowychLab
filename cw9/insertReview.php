<?php
$conn = new mysqli("localhost", "root", "", "dzbanyv2db");
$idDzbana = $_POST["ID"];
$nick = $_POST["nick"];
$tresc = $_POST["tresc"];
$ocena = $_POST["ocena"];
$sql = "INSERT INTO recenzje(idDzbana, nick, ocena,tresc) VALUES ($idDzbana, '$nick', $ocena,'$tresc')";
$result = $conn->query($sql);
$conn->close();
header("Location: details.php?id={$idDzbana}");
