<?php
include "../../database/connection.php";

$pcbContent = $_POST["ckeditordata"];

if (
    empty($pcbContent)
) {
    $errors['error'] = 'Boş alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $sorgu = $vt->prepare("UPDATE general SET g_main_content_en = :content WHERE g_page_url = 'pcb-design'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':content' => $pcbContent,
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
