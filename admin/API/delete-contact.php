<?php
include "../../database/connection.php";

$contactID = trim($_POST["contactID"]);


$sorgu = $vt->prepare("DELETE FROM contact WHERE contact_id ='$contactID'");
$result = $sorgu->execute();
if ($result) {
    $form_data['status'] = true;
    $form_data['message'] = 'İletişim bilgisi başarıyla silindi!';
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
