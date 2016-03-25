<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Kasutajad</title>
</head>
<body>
	<h3>Kasutajad</h3> <br>
	<a href="/~ardo.liivamagi/progreee/form.html">Registreerima</a> <br>
    <?php
    require "db-api.php";
    $kasutajad = kuva_kasutajad();

    $i = 1;
    $html = '<table>';
    foreach ($kasutajad as $kasutaja) {
      $html .= '
            <tr>
              <td>' . $i++ . '</td>
              <td>
                    <img src="db/' . $kasutaja["id"] . '/pilt.jpg" height="30" width="30">
              </td>
              <td>' . $kasutaja["uname"] . '</td>
              <td>
                    <a href="yksikkirje.php?id=' .
                    $kasutaja["id"] . '">Vaade</a>
                    <a href="muuda.php?id=' .
                    $kasutaja["id"] . '">Muuda</a>
                    <a href="kustuta.php?id=' .
                    $kasutaja["id"] . '">Kustuta</a>
              </td>
            </tr>';
    }
    $html .= '</table>';
    print $html;
    ?>
</body>
</html>
