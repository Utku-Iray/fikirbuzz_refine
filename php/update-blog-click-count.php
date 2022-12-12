<?php

include "../database/connection.php";

$click_count = $_POST['click_count'];
$url = $_POST['url'];

if ($click_count == "plus") {
    $sorgu = $vt->prepare("UPDATE blog SET click_count = click_count + 1 WHERE url='$url'");
    $result = $sorgu->execute();
}
