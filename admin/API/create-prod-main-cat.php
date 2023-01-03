<?php
include "../../database/connection.php";

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));

$productCatNameEN = trim(filter_input(INPUT_POST, 'productCatNameEN'));
$productCatNameTR = trim(filter_input(INPUT_POST, 'productCatNameTR'));
$productCatNameAR = trim(filter_input(INPUT_POST, 'productCatNameAR'));

$prodCatStatus = trim(filter_input(INPUT_POST, 'prodCatStatus'));

if (
    empty($productCatNameEN || $productCatNameTR || $productCatNameAR)
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare('INSERT INTO category 
    (name_en, name_tr, name_ar, sort, status, created_by)
    VALUES 
    (:name_en, :name_tr, :name_ar, :sort, :status, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':name_en' => $productCatNameEN,
            ':name_tr' => $productCatNameTR,
            ':name_ar' => $productCatNameAR,
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
