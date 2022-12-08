<?php
include "../../database/connection.php";

$catID = trim($_POST["catID"]);

$query = $vt->prepare("SELECT * FROM product WHERE id='$catID'");
$query->execute();
$prodResult = $query->fetchAll(PDO::FETCH_OBJ);

$prodImg = $prodResult[0]->image;
$prodDatasheet = $prodResult[0]->datasheet;
$prodManual = $prodResult[0]->user_manual;


$sorgu = $vt->prepare("DELETE FROM product WHERE id ='$catID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'Ürün başarıyla silindi!';

    if (file_exists('../../' . $prodImg)) {
        unlink('../../' . $prodImg);
    }
    if (file_exists('../../' . $prodDatasheet)) {
        unlink('../../' . $prodDatasheet);
    }
    if (file_exists('../../' . $prodManual)) {
        unlink('../../' . $prodManual);
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
