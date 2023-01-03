<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));

$productSubCatNameEN = trim(filter_input(INPUT_POST, 'productSubCatNameEN'));
$productSubCatNameTR = trim(filter_input(INPUT_POST, 'productSubCatNameTR'));
$productSubCatNameAR = trim(filter_input(INPUT_POST, 'productSubCatNameAR'));

$productSubCatDescEN = trim(filter_input(INPUT_POST, 'productSubCatDescEN'));
$productSubCatDescTR = trim(filter_input(INPUT_POST, 'productSubCatDescTR'));
$productSubCatDescAR = trim(filter_input(INPUT_POST, 'productSubCatDescAR'));

$prodMainCategory = trim(filter_input(INPUT_POST, 'prodMainCategory'));
$prodSubCatStatus = trim(filter_input(INPUT_POST, 'prodSubCatStatus'));

if (
    empty($productSubCatNameEN) || empty($productSubCatNameTR) || empty($productSubCatNameAR)
) {
    $errors['error'] = 'Lütfen her dilde alt kategori adını yazınız.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare("UPDATE sub_category SET 
    name_en = :c_name_en, name_tr = :c_name_tr, name_ar = :c_name_ar,
    description_en = :c_desc_en, description_tr = :c_desc_tr, description_ar = :c_desc_ar, 
    category_id = :c_id, status = :c_status WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_name_en' => $productSubCatNameEN,
            ':c_name_tr' => $productSubCatNameTR,
            ':c_name_ar' => $productSubCatNameAR,

            ':c_desc_en' => $productSubCatDescEN,
            ':c_desc_tr' => $productSubCatDescTR,
            ':c_desc_ar' => $productSubCatDescAR,

            ':c_id' => $prodMainCategory,
            ':c_status' => $prodSubCatStatus,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Alt kategori başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
