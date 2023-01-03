<?php
include "../../database/connection.php";

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));

$productSubCatNameEN = trim(filter_input(INPUT_POST, 'productSubCatNameEN'));
$productSubCatNameTR = trim(filter_input(INPUT_POST, 'productSubCatNameTR'));
$productSubCatNameAR = trim(filter_input(INPUT_POST, 'productSubCatNameAR'));

$productSubCatDescEN = trim(filter_input(INPUT_POST, 'productSubCatDescEN'));
$productSubCatDescTR = trim(filter_input(INPUT_POST, 'productSubCatDescTR'));
$productSubCatDescAR = trim(filter_input(INPUT_POST, 'productSubCatDescAR'));

$prodMainCategory = trim(filter_input(INPUT_POST, 'prodMainCategory'));
$prodSubCatStatus = trim(filter_input(INPUT_POST, 'prodSubCatStatus'));
$image = "prodSubCatImage";



$marks = array("(", ")", "?", ",", ":", "/");
$productSubCatNameLower = strtolower($productSubCatNameEN);
$spaceRemovedTitle = str_replace(" ", "-", $productSubCatNameLower);
$url = str_replace($marks, "-", $spaceRemovedTitle);

$tmpFilePath = $_FILES[$image]['tmp_name'];

$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";

if (
    empty($productSubCatNameEN) ||  empty($productSubCatNameTR) ||
    empty($productSubCatNameAR) || empty($prodMainCategory && $filename)
) {
    $errors['error'] = 'Açıklamalar hariç bütün alanları doldurmanız gerekmektedir.';
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

    $sorgu = $vt->prepare('INSERT INTO sub_category 
    (category_id, 
    name_en, name_tr, name_ar, 
    description_en, description_tr, description_ar,
    image, sort, status, created_by)
    VALUES 
    (:c_id, :name_en, :name_tr, :name_ar, :desc_en, :desc_tr, :desc_ar, :img, :sort, :status, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':c_id' => $prodMainCategory,

            ':name_en' => $productSubCatNameEN,
            ':name_tr' => $productSubCatNameTR,
            ':name_ar' => $productSubCatNameAR,

            ':desc_en' => $productSubCatDescEN,
            ':desc_tr' => $productSubCatDescTR,
            ':desc_ar' => $productSubCatDescAR,

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
