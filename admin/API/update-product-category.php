<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));

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

    $sorgu = $vt->prepare("UPDATE category SET 
    name_en = :c_name_en, name_tr = :c_name_tr, name_ar = :c_name_ar, status = :c_status 
    WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_name_en' => $productCatNameEN,
            ':c_name_tr' => $productCatNameTR,
            ':c_name_ar' => $productCatNameAR,
            ':c_status' => $prodCatStatus,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Ana kategori başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
