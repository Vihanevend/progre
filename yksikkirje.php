<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Üks kasutaja</title>
</head>
<body>
        <?php
                require "db-api.php";
                $id = $_GET["id"];
                $kasutajainfo = profiilikuva($id);

                print '<img src="' . "./db/$id/pilt.jpg" . '" height="100" width="100">'. "<br>";
                print "Kasutajanimi : ". $kasutajainfo["uname"]. "<br>";
				print "Salasõna : ". $kasutajainfo["pword"]. "<br>";
                print "Eesnimi : ". $kasutajainfo["fname"]. "<br>";
                print "Perekonnanimi : ". $kasutajainfo["lname"]. "<br>";
                print "Sugu : ". $kasutajainfo["sugu"]. "<br>";
                print "e-mail : ". $kasutajainfo["email"]. "<br>";
                print "Kirjeldus : ". $kasutajainfo["markused"]. "<br>";
                print "Loomisaeg : ". $kasutajainfo["aeg"];
        ?>
</body>
</html>