<?php

$_COOKIE["loginController"] = "";
$_COOKIE["email"] = "";
$_COOKIE["fullname"] = "";
$_COOKIE["role"] = "";


setcookie("loginController", "", time() - 1, "/");
setcookie("email", "", time() - 1, "/");
setcookie("fullname", "", time() - 1, "/");
setcookie("role", "", time() - 1, "/");

header("location: login.php");
