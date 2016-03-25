<?php
    date_default_timezone_set('Europe/Tallinn');

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    function registreeri($kasutajainfo) {
        $username = $kasutajainfo["uname"];
    	$pword = $kasutajainfo["pword"];
        $fname = $kasutajainfo["fname"];
        $lname = $kasutajainfo["lname"];
        $email = $kasutajainfo["email"];
    	$sugu = $kasutajainfo["sugu"];
        $markused = $kasutajainfo["markused"];
        $file = $kasutajainfo["pilt"];
    	
        $aeg = time();
        $kaust = 'db/'. $aeg;
        if ( !file_exists($kaust) ){
            $vana = umask(0);
            mkdir ($kaust, 0777, true);
            umask($vana);
        }

        $kasutajainfo = fopen($kaust . '/andmed.json', 'w');
        $andmed = array(
            "id" => $aeg,
            "uname" => $username,
        	"pword" => $pword,
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email,
        	"sugu" => $sugu,
            "markused" => $markused);


        move_uploaded_file($file, $kaust . '/pilt.jpg');
        fwrite($kasutajainfo, json_encode($andmed));
        fclose($kasutajainfo);
    }

    function muuda($kasutajainfo) {
        $id = $kasutajainfo["id"];
        $username = $kasutajainfo["uname"];
        $pword = $kasutajainfo["pword"];
        $fname = $kasutajainfo["fname"];
        $lname = $kasutajainfo["lname"];
        $email = $kasutajainfo["email"];
        $sugu = $kasutajainfo["sugu"];
        $markused = $kasutajainfo["markused"];
        $file = $kasutajainfo["pilt"];

        $kaust = "./db/$id";
        $kasutajainfo = fopen($kaust . '/andmed.json','w');
        $andmed = array(
            "id" => $id,
            "uname" => $username,
            "pword" => $pword,
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email,
            "sugu" => $sugu,
            "markused" => $markused);

        move_uploaded_file($file, $kaust . '/pilt.jpg');
        fwrite($kasutajainfo, json_encode($andmed));
        fclose($kasutajainfo);
    }

    function kuva_yksikkasutaja($id) {
        $json = file_get_contents("./db/$id/andmed.json");
        $kasutajainfo = json_decode($json, true);
        $kasutajainfo["id"] = strftime("%d/%m/%Y %H:%M:%S", $kasutajainfo["id"]);
        return $kasutajainfo;
    }

    function kuva_kasutajad() {
        $kasutajad = [];
        $i = 0;
        foreach (glob('./db/*', GLOB_ONLYDIR) as $kaust) {
            $json = file_get_contents("$kaust/andmed.json");
            $kasutajainfo = json_decode($json, true);
            $kasutajad[$i] = $kasutajainfo;
            $i++;
        }
        return $kasutajad;
    }

    function kustuta($id) {
        $kaust = "./db/$id";
        if (is_dir($kaust)) {
            $failid = glob($kaust . "/*");
            foreach ($failid as $fail) {
                unlink($fail);
            }
            rmdir($kaust);
        }
    }
?>
