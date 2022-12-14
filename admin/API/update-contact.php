<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));

$contactTitle = trim(filter_input(INPUT_POST, 'contactTitle'));
$contactAddress = trim(filter_input(INPUT_POST, 'contactAddress'));
$contactMail = trim(filter_input(INPUT_POST, 'contactMail'));
$contactPhone = trim(filter_input(INPUT_POST, 'contactPhone'));
$contactMaps = trim(filter_input(INPUT_POST, 'contactMaps'));
$contactStatus = trim(filter_input(INPUT_POST, 'contactStatus'));

if (
    empty($contactTitle && $contactAddress && $contactMail && $contactPhone)
) {
    $errors['error'] = 'Yıldızlı alanları doldurunuz.';
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare("UPDATE contact SET 
    contact_title = :c_title, 
    contact_address = :c_address, 
    contact_mail = :c_mail, 
    contact_phone = :c_phone, 
    contact_status = :c_status, 
    contact_maps = :c_maps
    WHERE contact_id = $idHolder");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_title' => $contactTitle,
            ':c_address' => $contactAddress,
            ':c_mail' => $contactMail,
            ':c_phone' => $contactPhone,
            ':c_status' => $contactStatus,
            ':c_maps' => $contactMaps,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'İletişim bilgisi başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
