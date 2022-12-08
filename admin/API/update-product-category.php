<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));
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

    $sorgu = $vt->prepare("UPDATE category SET name = :c_name, status = :c_status WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_name' => $productCatName,
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
