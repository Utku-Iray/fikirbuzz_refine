<?php
include "../../database/connection.php";

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));
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

    $sorgu = $vt->prepare('INSERT INTO blog_category (name, created_by)
    VALUES (:title, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':title' => $blogCatName,
            ':c_by' => $userNameInput,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Kategori başarıyla eklendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
