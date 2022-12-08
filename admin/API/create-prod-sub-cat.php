<?php
include "../../database/connection.php";

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));

$productSubCatName = trim(filter_input(INPUT_POST, 'productSubCatName'));
$productSubCatDesc = trim(filter_input(INPUT_POST, 'productSubCatDesc'));
$prodMainCategory = trim(filter_input(INPUT_POST, 'prodMainCategory'));
$prodSubCatStatus = trim(filter_input(INPUT_POST, 'prodSubCatStatus'));
$image = "prodSubCatImage";



$marks = array("(", ")", "?", ",", ":", "/");
$productSubCatNameLower = strtolower($productSubCatName);
$spaceRemovedTitle = str_replace(" ", "-", $productSubCatNameLower);
$url = str_replace($marks, "-", $spaceRemovedTitle);

$tmpFilePath = $_FILES[$image]['tmp_name'];

$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";

if (
    empty($productSubCatName  && $prodMainCategory && $filename)
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}

if ($uzanti != "png" && $uzanti != "jpg" && $uzanti != "jpeg") {
    $errors['error'] = 'Seçilen fotoğraf PNG veya JPG olmalıdır.';
}
//Kategoriden aynısı varsa hata çıkacak.

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $nameWithURL = $url . "." . $uzanti;


    if ($tmpFilePath != "") {
        $location  = "attachments/subcategory/" . $nameWithURL;
        if (file_exists('../../attachments/subcategory/' . $nameWithURL)) {
            unlink('../../attachments/subcategory/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/subcategory/" . $nameWithURL);
    }

    $sorgu = $vt->prepare('INSERT INTO sub_category (category_id, name, description, image, sort, status, created_by)
    VALUES (:c_id, :name, :desc, :img, :sort, :status, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_id' => $prodMainCategory,
            ':name' => $productSubCatName,
            ':desc' => $productSubCatDesc,
            ':img' => $location,
            ':sort' => "0",
            ':status' => $prodSubCatStatus,
            ':c_by' => $userNameInput,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Alt kategori başarıyla eklendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
