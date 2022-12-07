<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));
$blogCatName = trim(filter_input(INPUT_POST, 'blogCatName'));

if (
    empty($blogCatName)
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare("UPDATE blog_category SET name = :b_name WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':b_name' => $blogCatName,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Blog başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
