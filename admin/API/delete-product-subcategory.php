<?php
include "../../database/connection.php";

$subCatID = trim($_POST["subCatID"]);
$subCatImg = trim($_POST["subCatImg"]);


$sorgu = $vt->prepare("DELETE FROM sub_category WHERE id ='$subCatID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'Alt kategori başarıyla silindi!';
    if (file_exists('../../' . $subCatImg)) {
        unlink('../../' . $subCatImg);
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
