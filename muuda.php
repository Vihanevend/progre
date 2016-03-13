<!DOCTYPE html>
<html lang="et">
<head>
        <meta charset="utf-8">
        <title>Muutmine</title>
</head>
<body>
        <?php
                require "db-api.php";
                $id = $_GET["id"];
                $kasutajainfo = profiilikuva($id);
        ?>

        <form action="form.php?id=<?php print $kasutajainfo["id"]; ?>" method="post" enctype="multipart/form-data">
		
            Kasutajanimi: <input type="text" name="uname" value="<?php print $kasutajainfo["uname"]; ?>" required><br>
				
			Salasõna: <input type="password" name="pword" value="<?php print $kasutajainfo["pword"]; ?>" required><br>
				
            Eesnimi: <input type="text" name="fname"  value="<?php print $kasutajainfo["fname"]; ?>" required><br>
				
            Perenimi: <input type="text" name="lname"  value="<?php print $kasutajainfo["lname"]; ?>"required><br>
				
            Sugu: <input value="Mees" type="radio" name="sugu" <?php print ($kasutajainfo["sugu"] == "Mees" ? "checked" : ""); ?> required>Mees
                  <input value="Naine" type="radio" name="sugu" <?php print ($kasutajainfo["sugu"] == "Naine" ? "checked" : ""); ?> required>Naine<br>
					  
            E-mail: <input type="email" name="email" value="<?php print $kasutajainfo["email"]; ?>"required><br>
				
            Loomisaeg: <?php print $kasutajainfo["aeg"]; ?><br>
				
            Lisa pilt:<br>
                <img src="<?php print "./db/$id/pilt.jpg"; ?>" height="100" width="100"><br>
                <input type="file" name="img" accept="image/*"><br>
                <textarea rows="3" name="markused" placeholder="Kirjeldus" required><?php print $kasutajainfo["markused"]; ?></textarea><br>
                <input type="hidden" name="aeg" value="<?php print $kasutajainfo["aeg"]; ?>">
                <input type="submit" value="Salvesta">
        </form>
</body>
</html>