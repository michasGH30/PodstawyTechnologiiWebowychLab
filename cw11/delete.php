<?php
$conn = new mysqli("localhost", "root", "", "dzbanyv4db");
$ID = $_GET["id"];
$sql = "DELETE FROM dzbany WHERE id=$ID";
$result = $conn->query($sql);
$conn->close();
header('Location: index.php');
