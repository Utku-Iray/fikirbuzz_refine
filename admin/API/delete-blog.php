<?php
include "../../database/connection.php";

$blogID = trim($_POST["blogID"]);
$blogImg = trim($_POST["blogImg"]);


$sorgu = $vt->prepare("DELETE FROM blog WHERE id ='$blogID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'Blog başarıyla silindi!';

    if (file_exists('../../' . $blogImg)) {
        unlink('../../' . $blogImg);
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
