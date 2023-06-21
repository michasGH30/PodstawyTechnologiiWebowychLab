<?php
include("session.php");
require("db.php");
?>

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
		<?php
		include("panel.php");
		?>
		<article>
			<header>
				<h2>Kategorie dzbanów</h2>
			</header>

			<?php
			$conn = new mysqli("localhost", "root", "", "dzbanyv3db");
			$sql = "SELECT id, nazwa FROM kategorie";
			$result = $conn->query($sql);
			echo "<a href='index.php'> Wszyskie</a><br>";
			while ($row = $result->fetch_object()) {
				echo " <a href='index.php?idKat={$row->id}'>{$row->nazwa}</a><br>";
			}
			?>
		</article>
		<article>
			<header>
				<h2>Wyszukaj dzbana</h2>
			</header>
			<form>
				<p>

					<input type="text" name="nazwa">
					<input type="submit" value="Wyszukaj">
				</p>
			</form>
		</article>
		<article>
			<header>
				<h2>Dodaj dzbana</h2>
			</header>
			<a href="insertForm.php">Dodaj</a>
		</article>
		<article>
			<?php
			$sql = "SELECT ID, nazwa, obrazek FROM dzbany";
			if (isset($_GET["idKat"])) {
				$idKat = $_GET["idKat"];
				$sql .= " WHERE idKategorii = $idKat";
			} else if (isset($_GET["nazwa"])) {
				$nazwa = $_GET["nazwa"];
				$sql .= " WHERE nazwa LIKE '%$nazwa%'";
			}
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><thead><tr><th>Nazwa</th><th>Zdjęcie</th><th>Szczegóły</th></tr></thead>";
				while ($row = $result->fetch_object()) {
					echo "<tr><td>{$row->nazwa}</td><td><img src='images/{$row->obrazek}'></td><td><a href='details.php?id={$row->ID}'>Szczegóły</a></td></tr>";
				}
				echo "</table>";
			} else {
				echo "Nie ma dzbanów w tej kategorii.";
			}
			?>
		</article>
	</main>
</body>

</html>