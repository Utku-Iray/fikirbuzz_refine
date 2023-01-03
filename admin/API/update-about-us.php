<?php
include "../../database/connection.php";

$aboutContentEN = $_POST["ckeditordataEN"];
$aboutContentTR = $_POST["ckeditordataTR"];
$aboutContentAR = $_POST["ckeditordataAR"];

if (
    empty($aboutContentEN)
) {
    $errors['error'] = 'Boş alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $sorgu = $vt->prepare("UPDATE general SET 
    g_main_content_en = :contentEN,
    g_main_content_tr = :contentTR,
    g_main_content_ar = :contentAR
    WHERE g_page_url = 'about-us'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':contentEN' => $aboutContentEN,
            ':contentTR' => $aboutContentTR,
            ':contentAR' => $aboutContentAR,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Hakkımızda başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
