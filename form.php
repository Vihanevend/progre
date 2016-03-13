<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        require "db-api.php";
        $ankeet = array(
                "uname" => $_POST['uname'],
				"pword" => $_POST['pword'],
                "fname" => $_POST['fname'],
                "lname" => $_POST['lname'],
                "email" => $_POST['email'],
                "sugu" => $_POST['sugu'],
                "markused" => $_POST['markused'],
                "pilt" => $_FILES['img']['tmp_name']);

        if (isset($_GET["id"])) {
                $ankeet["id"] = $_GET["id"];
                $ankeet["aeg"] = $_POST['aeg'];
                muutmine($ankeet);
        }
        else {
                loomine($ankeet);
        }

        header("Location:http://robert.vkhk.ee/~ardo.liivamagi/progre/kirjed.php");
        die();


?>
