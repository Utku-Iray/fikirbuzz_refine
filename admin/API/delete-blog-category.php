<?php
include "../../database/connection.php";

$blogCatID = trim($_POST["blogCatID"]);


$sorgu = $vt->prepare("DELETE FROM blog_category WHERE id ='$blogCatID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'Kategori başarıyla silindi!';
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
