<?php
include "../../database/connection.php";

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));
$productCatName = trim(filter_input(INPUT_POST, 'productCatName'));
$prodCatStatus = trim(filter_input(INPUT_POST, 'prodCatStatus'));

if (
    empty($productCatName)
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare('INSERT INTO category (name, sort, status, created_by)
    VALUES (:name, :sort, :status, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':name' => $productCatName,
            ':sort' => "0",
            ':status' => $prodCatStatus,
            ':c_by' => $userNameInput,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Ana kategori başarıyla eklendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
