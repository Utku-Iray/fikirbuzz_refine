<?php
include "../../database/connection.php";

$mainCatID = trim($_POST["mainCatID"]);


$sorgu = $vt->prepare("DELETE FROM category WHERE id ='$mainCatID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'Ana kategori başarıyla silindi!';
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
