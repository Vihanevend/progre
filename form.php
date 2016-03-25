<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        require "db-api.php";
        $andmed = array(
                "uname" => $_POST['uname'],
				"pword" => $_POST['pword'],
                "fname" => $_POST['fname'],
                "lname" => $_POST['lname'],
                "email" => $_POST['email'],
                "sugu" => $_POST['sugu'],
                "markused" => $_POST['markused'],
                "pilt" => $_FILES['img']['tmp_name']);

        if (isset($_GET["id"])) {
                $andmed["id"] = $_GET["id"];
                muuda($andmed);
        }
        else {
                registreeri($andmed);
        }

        header("Location:http://robert.vkhk.ee/~ardo.liivamagi/progreee/kirjed.php");
        die();
?>
