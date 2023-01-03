<?php
include "../../database/connection.php";

$pcbContentEN = $_POST["ckeditordataEN"];
$pcbContentTR = $_POST["ckeditordataTR"];
$pcbContentAR = $_POST["ckeditordataAR"];

if (
    empty($pcbContentEN)
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
    WHERE g_page_url = 'pcb-design'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':contentEN' => $pcbContentEN,
            ':contentTR' => $pcbContentTR,
            ':contentAR' => $pcbContentAR,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'İçerik başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
