<?php
        require "db-api.php";

        kustuta($_GET["id"]);

        header("Location:http://robert.vkhk.ee/~ardo.liivamagi/progre/kirjed.php");
        die();