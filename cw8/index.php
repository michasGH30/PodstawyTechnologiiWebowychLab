<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PHP i baza danych</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<h1>Witamy w dzbalni!</h1>
	</header>
	<main>
		<article>
			<header>
				<h2>Dodaj dzbana</h2>
			</header>
			<a href="insertForm.php">Dodaj</a>
		</article>
		<article>
			<header>
				<h2>Wybierz dzbana</h2>
			</header>
			<?php
			$conn = new mysqli("localhost", "root", "", "dzbanydb");
			$sql = "SELECT ID, nazwa FROM dzbany";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<ul>";
				while ($row = $result->fetch_object()) {
					echo "<li><a href = 'details.php?id={$row->ID}'>{$row->nazwa}</a></li>";
				}
				echo "</ul>";
			} else {
				echo "Nie masz żadnych dzbanów w swojej kolecji.";
			}
			$conn->close();
			?>
		</article>
	</main>
</body>

</html>