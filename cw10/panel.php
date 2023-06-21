<?php
echo '<p>
Witaj <?= $_SESSION["login"] ?>!
<a href="myReviews.php">Moje recenzje</a>
<a href="logout.php">Wyloguj</a>
</p>';
