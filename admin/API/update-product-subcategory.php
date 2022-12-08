<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));
$productSubCatName = trim(filter_input(INPUT_POST, 'productSubCatName'));
$productSubCatDesc = trim(filter_input(INPUT_POST, 'productSubCatDesc'));
$prodMainCategory = trim(filter_input(INPUT_POST, 'prodMainCategory'));
$prodSubCatStatus = trim(filter_input(INPUT_POST, 'prodSubCatStatus'));

if (
    empty($productSubCatName)
) {
    $errors['error'] = 'Alt kategori adı boş bırakılamaz.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare("UPDATE sub_category SET name = :c_name, description = :c_desc, category_id = :c_id, status = :c_status WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_name' => $productSubCatName,
            ':c_desc' => $productSubCatDesc,
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
