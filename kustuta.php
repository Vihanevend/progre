<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Kustutamine</title>
</head>
<body>
		<h3>Kasutaja edukalt eemaldatud!</h3>
		<a href="/~ardo.liivamagi/progreee/kirjed.php">Kasutajad</a> <br>

		<?php
				require "db-api.php";

				kustuta($_GET["id"]);
		?>

</body>
</html>           
