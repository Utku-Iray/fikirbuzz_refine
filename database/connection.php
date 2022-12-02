<?php

// try {
//     $servername = "essehost0511.com";

//     $databasename = 'fikirbuzzproject_refine';

//     $username = "fikirbuzzproject_refineadmin";

//     $password = "fikirbuzzrefine2021**";

//     $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
//     // set the PDO error mode to exception
//     $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

try {
    $servername = "ni-jungle.guzelhosting.com";

    $databasename = 'ideapoln_proje_refine';

    $username = "ideapoln_admin";

    $password = "ideapol.123.123";

    $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
