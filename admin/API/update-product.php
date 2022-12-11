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

$idHolderInput = trim(filter_input(INPUT_POST, 'idHolderInput'));
$prodName = trim(filter_input(INPUT_POST, 'prodName'));
$prodShortDescription = trim(filter_input(INPUT_POST, 'prodShortDescription'));
$prodOverview = trim(filter_input(INPUT_POST, 'prodOverview'));
$prodCategory = trim(filter_input(INPUT_POST, 'prodCategory'));
$prodStatus = trim(filter_input(INPUT_POST, 'prodStatus'));
$prodKeyFeatures = $_POST['prodKeyFeatures'];

$image = "prodImage";
$sheet = "prodDatasheet";
$manual = "prodUserManual";


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


$query = $vt->prepare("SELECT * FROM product WHERE id='$idHolderInput'");
$query->execute();
$productResult = $query->fetchAll(PDO::FETCH_OBJ);

if (
    empty($prodName && $prodShortDescription && $prodOverview && $prodCategory)
) {
    $errors['error'] = 'Yıldızla belirtilen alanları doldurunuz.';
}

//Ürün Fotoğraf
$imgTmpFilePath = $_FILES[$image]['tmp_name'];
if ($imgTmpFilePath != "") {
    $imgFilename = $_FILES[$image]["name"];
    $efilename = explode('.', $imgFilename);
    $imgUzanti = $efilename[count($efilename) - 1];
    if ($imgUzanti != 'png' && $imgUzanti != 'jpg' && $imgUzanti != 'jpeg') {
        $errors['error'] = 'Fotoğraf türü JPG veya PNG olmalıdır.';
    }
} else {
    $imgLocation = $productResult[0]->image;
}

//Datasheet
$datasheetTmpFilePath = $_FILES[$sheet]['tmp_name'];
if ($datasheetTmpFilePath != "") {
    $datasheetFilename = $_FILES[$sheet]["name"];
    $efilename = explode('.', $datasheetFilename);
    $datasheetUzanti = $efilename[count($efilename) - 1];
    if ($datasheetFilename != "" && $datasheetUzanti != 'pdf') {
        $errors['error'] = 'Datasheet türü PDF olmalıdır.';
    }
} else {
    $datasheetLocation = $productResult[0]->datasheet;
}

//User Manual
$manualTmpFilePath = $_FILES[$manual]['tmp_name'];
if ($manualTmpFilePath != "") {
    $manualFilename = $_FILES[$manual]["name"];
    $efilename = explode('.', $manualFilename);
    $manualUzanti = $efilename[count($efilename) - 1];
    if ($manualFilename != "" && $manualUzanti != 'pdf') {
        $errors['error'] = 'User Manual türü PDF olmalıdır.';
    }
} else {
    $manualLocation = $productResult[0]->user_manual;
}



if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {



    // Ürün Fotoğraf
    if ($imgTmpFilePath != "") {
        $imageNameWithProd = $prodName . "." . $imgUzanti;
        $imgLocation  = "attachments/product/product-image/" . $imageNameWithProd;
        if (file_exists('../../' . $productResult[0]->image)) {
            unlink('../../' . $productResult[0]->image);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/product/product-image/" . $imageNameWithProd);
    }

    // Ürün Manual
    if ($manualTmpFilePath != "") {
        $manualNameWithProd = $prodName . "." . $manualUzanti;
        $manualLocation  = "attachments/product/manual/" . $manualNameWithProd;
        if (file_exists('../../' . $productResult[0]->user_manual)) {
            unlink('../../' . $productResult[0]->user_manual);
        }
        move_uploaded_file($_FILES[$manual]['tmp_name'], "../../attachments/product/manual/" . $manualNameWithProd);
    }

    // Ürün Datasheet
    if ($datasheetTmpFilePath != "") {
        $datasheetNameWithProd = $prodName . "." . $datasheetUzanti;
        $datasheetLocation  = "attachments/product/datasheet/" . $datasheetNameWithProd;
        if (file_exists('../../' . $productResult[0]->datasheet)) {
            unlink('../../' . $productResult[0]->datasheet);
        }
        move_uploaded_file($_FILES[$sheet]['tmp_name'], "../../attachments/product/datasheet/" . $datasheetNameWithProd);
    }


    $sorgu = $vt->prepare(
        "UPDATE product SET
    name = :name, 
    short_description = :s_desc,
    key_features = :k_features, 
    overview = :overview,
    image = :img,
    datasheet = :datasheet,
    user_manual = :u_manual,
    spec_platform = :spec_platform, 
    spec_storage = :spec_storage,
    spec_io = :spec_io,
    spec_pam = :spec_pam,
    spec_oac = :spec_oac,
    spec_pae = :spec_pae,
    spec_sm = :spec_sm,
    spec_networking = :spec_networking,
    spec_iointerface = :spec_iointerface,
    status = :status, 
    category_id = :cat_id
    WHERE id ='$idHolderInput'
    "
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
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Ürün başarıyla güncellendi.';
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
