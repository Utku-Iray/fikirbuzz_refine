<?php

if (!isset($_COOKIE["loginController"]) && $_COOKIE["loginController"] != "1") {
    header("location: login.php");
    $userMail = "";
    $userFullname = "";
    $userRole = "";
} else {
    $userMail = $_COOKIE["email"];
    $userFullname = $_COOKIE["fullname"];
    $userRole = $_COOKIE["role"];
}



// $sorgu = $vt->prepare("SELECT * FROM users WHERE user_nickname = '$nickname'");
// $sorgu->execute();
// $userResult = $sorgu->fetchAll(PDO::FETCH_OBJ);
