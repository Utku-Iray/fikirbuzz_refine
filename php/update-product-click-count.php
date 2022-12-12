<?php

include "../database/connection.php";

$click_count = $_POST['click_count'];
$pid = $_POST['pid'];

if ($click_count == "plus") {
    $sorgu = $vt->prepare("UPDATE product SET click_count = click_count + 1 WHERE id='$pid'");
    $result = $sorgu->execute();
}
