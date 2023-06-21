<?php
include("session.php");
require("db.php");
?>
<p>
    <a href="index.php">Strona główna</a>
    <a href="favourites.php">Ulubione</a>
    <a href="myReviews.php">Moje recenzje</a>
    <a href="myMessages.php">Moje wiadomości</a>
    Witaj <?= $_SESSION["login"] ?>!
    <a href="logout.php">Wyloguj</a>
</p>