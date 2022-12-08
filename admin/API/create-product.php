<?php
include "../../database/connection.php";

// Platform
$platformTitleArray = array();
$platformValueArray = array();
// Storage
$storageTitleArray = array();
$storageValueArray = array();
// I/O
$ioTitleArray = array();
$ioValueArray = array();
// Power and Mechanical
$powerAndMechTitleArray = array();
$powerAndMechValueArray = array();
// OS and Certifications
$osAndCertTitleArray = array();
$osAndCertValueArray = array();
// Physical and Environmental
$physicalAndEnvTitleArray = array();
$physicalAndEnvValueArray = array();
// System Memory
$systemMemoTitleArray = array();
$systemMemoValueArray = array();
// Networking
$networkingTitleArray = array();
$networkingValueArray = array();
// I/O Interface
$ioInterfaceTitleArray = array();
$ioInterfaceValueArray = array();

$query2 = $vt->prepare("SELECT * FROM spec");
$query2->execute();
$specResult = $query2->fetchAll(PDO::FETCH_OBJ);

$specCount = count($specResult);

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));

$prodName = trim(filter_input(INPUT_POST, 'prodName'));
$prodShortDescription = trim(filter_input(INPUT_POST, 'prodShortDescription'));
$prodOverview = trim(filter_input(INPUT_POST, 'prodOverview'));
$prodCategory = trim(filter_input(INPUT_POST, 'prodCategory'));
$prodStatus = trim(filter_input(INPUT_POST, 'prodStatus'));
$prodKeyFeatures = $_POST['prodKeyFeatures'];




$image = "prodImage";
$sheet = "prodDatasheet";
$manual = "prodUserManual";

//Ürün Fotoğraf
$imgTmpFilePath = $_FILES[$image]['tmp_name'];
$imgFilename = $_FILES[$image]["name"];
$efilename = explode('.', $imgFilename);
$imgUzanti = $efilename[count($efilename) - 1];
$imgLocation  = "";

//Datasheet
$datasheetTmpFilePath = $_FILES[$sheet]['tmp_name'];
$datasheetFilename = $_FILES[$sheet]["name"];
$efilename = explode('.', $datasheetFilename);
$datasheetUzanti = $efilename[count($efilename) - 1];
$datasheetLocation  = "";

//User Manual
$manualTmpFilePath = $_FILES[$manual]['tmp_name'];
$manualFilename = $_FILES[$manual]["name"];
$efilename = explode('.', $manualFilename);
$manualUzanti = $efilename[count($efilename) - 1];
$manualLocation  = "";

var_dump($manualTmpFilePath);
var_dump($manualFilename);


// Specs
for ($i = 0; $i < $specCount; $i++) {

    $detailArray = json_decode($specResult[$i]->details);
    $detailsCount = count($detailArray);

    for ($k = 0; $k <  $detailsCount; $k++) {
        $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
        $postedDetails = trim(filter_input(INPUT_POST, "prod$filteredDetail"));

        if ($postedDetails != "") {
            if ($specResult[$i]->name == "Platform") {
                array_push($platformTitleArray, $detailArray[$k]);
                array_push($platformValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "Storage") {
                array_push($storageTitleArray, $detailArray[$k]);
                array_push($storageValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "I/O") {
                array_push($ioTitleArray, $detailArray[$k]);
                array_push($ioValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "Power and Mechanical") {
                array_push($powerAndMechTitleArray, $detailArray[$k]);
                array_push($powerAndMechValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "OS and Certifications") {
                array_push($osAndCertTitleArray, $detailArray[$k]);
                array_push($osAndCertValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "Physical and Environmental") {
                array_push($physicalAndEnvTitleArray, $detailArray[$k]);
                array_push($physicalAndEnvValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "System Memory") {
                array_push($systemMemoTitleArray, $detailArray[$k]);
                array_push($systemMemoValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "Networking") {
                array_push($networkingTitleArray, $detailArray[$k]);
                array_push($networkingValueArray, $postedDetails);
            }
            if ($specResult[$i]->name == "I/O Interface") {
                array_push($ioInterfaceTitleArray, $detailArray[$k]);
                array_push($ioInterfaceValueArray, $postedDetails);
            }
        }
    }
}



if (
    empty($prodName && $prodShortDescription && $prodOverview && $prodCategory && $imgFilename)
) {
    $errors['error'] = 'Yıldızla belirtilen alanları doldurunuz.';
}

if ($imgUzanti != 'png' && $imgUzanti != 'jpg' && $imgUzanti != 'jpeg') {
    $errors['error'] = 'Fotoğraf türü JPG veya PNG olmalıdır.';
}

if ($datasheetFilename != "" && $datasheetUzanti != 'pdf') {
    $errors['error'] = 'Datasheet türü PDF olmalıdır.';
}

if ($manualFilename != "" && $manualUzanti != 'pdf') {
    $errors['error'] = 'User Manual türü PDF olmalıdır.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    // Ürün Fotoğraf
    $imageNameWithProd = $prodName . "." . $imgUzanti;
    if ($imgTmpFilePath != "") {
        $imgLocation  = "attachments/product/product-image/" . $imageNameWithProd;
        if (file_exists('../../attachments/product/product-image/' . $imageNameWithProd)) {
            unlink('../../attachments/product/product-image/' . $imageNameWithProd);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/product/product-image/" . $imageNameWithProd);
    }


    // Ürün Manual
    $manualNameWithProd = $prodName . "." . $manualUzanti;
    if ($manualTmpFilePath != "") {
        $manualLocation  = "attachments/product/manual/" . $manualNameWithProd;
        if (file_exists('../../attachments/product/manual/' . $manualNameWithProd)) {
            unlink('../../attachments/product/manual/' . $manualNameWithProd);
        }
        move_uploaded_file($_FILES[$manual]['tmp_name'], "../../attachments/product/manual/" . $manualNameWithProd);
    }


    // Ürün Datasheet
    $datasheetNameWithProd = $prodName . "." . $datasheetUzanti;
    if ($datasheetTmpFilePath != "") {
        $datasheetLocation  = "attachments/product/datasheet/" . $datasheetNameWithProd;
        if (file_exists('../../attachments/product/datasheet/' . $datasheetNameWithProd)) {
            unlink('../../attachments/product/datasheet/' . $datasheetNameWithProd);
        }
        move_uploaded_file($_FILES[$sheet]['tmp_name'], "../../attachments/product/datasheet/" . $datasheetNameWithProd);
    }



    $sorgu = $vt->prepare(
        'INSERT INTO product 
    (
    name, 
    short_description,
    key_features, 
    overview,
    image,
    datasheet,
    user_manual,
    spec_platform,
    spec_storage,
    spec_io,
    spec_pam,
    spec_oac,
    spec_pae,
    spec_sm,
    spec_networking,
    spec_iointerface,
    status,
    category_id, 
    sort, 
    created_by
    )
    VALUES (
        :name, 
        :s_desc, 
        :k_features,
        :overview,
        :img,
        :datasheet,
        :u_manual,
        :spec_platform, 
        :spec_storage,
        :spec_io,
        :spec_pam,
        :spec_oac,
        :spec_pae,
        :spec_sm,
        :spec_networking,
        :spec_iointerface,
        :status, 
        :cat_id, 
        :sort, 
        :c_by
        )'
    );
    if ($sorgu) {
        $result = $sorgu->execute([
            ':name' => $prodName,
            ':s_desc' => $prodShortDescription,
            ':k_features' => $prodKeyFeatures,
            ':overview' => $prodOverview,
            ':img' => $imgLocation,
            ':datasheet' => $datasheetLocation,
            ':u_manual' => $manualLocation,
            ':spec_platform' => "[" . json_encode($platformTitleArray) . "," . json_encode($platformValueArray)  . "]",
            ':spec_storage' => "[" . json_encode($storageTitleArray) . "," . json_encode($storageValueArray)  . "]",
            ':spec_io' => "[" . json_encode($ioTitleArray) . "," . json_encode($ioValueArray)  . "]",
            ':spec_pam' => "[" . json_encode($powerAndMechTitleArray) . "," . json_encode($powerAndMechValueArray)  . "]",
            ':spec_oac' => "[" . json_encode($osAndCertTitleArray) . "," . json_encode($osAndCertValueArray)  . "]",
            ':spec_pae' => "[" . json_encode($physicalAndEnvTitleArray) . "," . json_encode($physicalAndEnvValueArray)  . "]",
            ':spec_sm' => "[" . json_encode($systemMemoTitleArray) . "," . json_encode($systemMemoValueArray)  . "]",
            ':spec_networking' => "[" . json_encode($networkingTitleArray) . "," . json_encode($networkingValueArray)  . "]",
            ':spec_iointerface' => "[" . json_encode($ioInterfaceTitleArray) . "," . json_encode($ioInterfaceValueArray)  . "]",
            ':status' => $prodStatus,
            ':cat_id' => $prodCategory,
            ':sort' => "0",
            ':c_by' => $userNameInput,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Yeni ürün başarıyla oluşturuldu.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
