<?php
include "../../database/connection.php";

// Platform
$platformTitleArray = array();
$platformValueArrayEN = array();
$platformValueArrayTR = array();
$platformValueArrayAR = array();
// Storage
$storageTitleArray = array();
$storageValueArrayEN = array();
$storageValueArrayTR = array();
$storageValueArrayAR = array();
// I/O
$ioTitleArray = array();
$ioValueArrayEN = array();
$ioValueArrayTR = array();
$ioValueArrayAR = array();
// Power and Mechanical
$powerAndMechTitleArray = array();
$powerAndMechValueArrayEN = array();
$powerAndMechValueArrayTR = array();
$powerAndMechValueArrayAR = array();
// OS and Certifications
$osAndCertTitleArray = array();
$osAndCertValueArrayEN = array();
$osAndCertValueArrayTR = array();
$osAndCertValueArrayAR = array();
// Physical and Environmental
$physicalAndEnvTitleArray = array();
$physicalAndEnvValueArrayEN = array();
$physicalAndEnvValueArrayTR = array();
$physicalAndEnvValueArrayAR = array();
// System Memory
$systemMemoTitleArray = array();
$systemMemoValueArrayEN = array();
$systemMemoValueArrayTR = array();
$systemMemoValueArrayAR = array();
// Networking
$networkingTitleArray = array();
$networkingValueArrayEN = array();
$networkingValueArrayTR = array();
$networkingValueArrayAR = array();
// I/O Interface
$ioInterfaceTitleArray = array();
$ioInterfaceValueArrayEN = array();
$ioInterfaceValueArrayTR = array();
$ioInterfaceValueArrayAR = array();

$query2 = $vt->prepare("SELECT * FROM spec");
$query2->execute();
$specResult = $query2->fetchAll(PDO::FETCH_OBJ);

$specCount = count($specResult);

$userNameInput = trim(filter_input(INPUT_POST, 'userNameInput'));

$prodName = trim(filter_input(INPUT_POST, 'prodName'));

$prodShortDescriptionEN = trim(filter_input(INPUT_POST, 'prodShortDescriptionEN'));
$prodShortDescriptionTR = trim(filter_input(INPUT_POST, 'prodShortDescriptionTR'));
$prodShortDescriptionAR = trim(filter_input(INPUT_POST, 'prodShortDescriptionAR'));

$prodKeyFeaturesEN = $_POST['prodKeyFeaturesEN'];
$prodKeyFeaturesTR = $_POST['prodKeyFeaturesTR'];
$prodKeyFeaturesAR = $_POST['prodKeyFeaturesAR'];

$prodOverviewEN = trim(filter_input(INPUT_POST, 'prodOverviewEN'));
$prodOverviewTR = trim(filter_input(INPUT_POST, 'prodOverviewTR'));
$prodOverviewAR = trim(filter_input(INPUT_POST, 'prodOverviewAR'));

$prodCategory = trim(filter_input(INPUT_POST, 'prodCategory'));
$prodStatus = trim(filter_input(INPUT_POST, 'prodStatus'));





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


if (
    empty($prodName && $prodShortDescriptionEN && $prodOverviewEN  && $prodCategory && $imgFilename)
) {
    $errors['error'] = 'Yıldızla belirtilen alanları tüm dillerde doldurunuz.';
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

// Specs
for ($i = 0; $i < $specCount; $i++) {

    $detailArray = json_decode($specResult[$i]->details);
    $detailsCount = count($detailArray);

    for ($k = 0; $k <  $detailsCount;) {
        $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
        $postedDetailsEN = trim(filter_input(INPUT_POST, "prod$filteredDetail" . "-EN"));
        $postedDetailsTR = trim(filter_input(INPUT_POST, "prod$filteredDetail" . "-TR"));
        $postedDetailsAR = trim(filter_input(INPUT_POST, "prod$filteredDetail" . "-AR"));


        if ($postedDetailsEN != "" && $postedDetailsTR != "" && $postedDetailsAR != "") {
            if ($specResult[$i]->name == "Platform") {
                array_push($platformTitleArray, $detailArray[$k]);
                array_push($platformValueArrayEN, $postedDetailsEN);
                array_push($platformValueArrayTR, $postedDetailsTR);
                array_push($platformValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "Storage") {
                array_push($storageTitleArray, $detailArray[$k]);
                array_push($storageValueArrayEN, $postedDetailsEN);
                array_push($storageValueArrayTR, $postedDetailsTR);
                array_push($storageValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "I/O") {
                array_push($ioTitleArray, $detailArray[$k]);
                array_push($ioValueArrayEN, $postedDetailsEN);
                array_push($ioValueArrayTR, $postedDetailsTR);
                array_push($ioValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "Power and Mechanical") {
                array_push($powerAndMechTitleArray, $detailArray[$k]);
                array_push($powerAndMechValueArrayEN, $postedDetailsEN);
                array_push($powerAndMechValueArrayTR, $postedDetailsTR);
                array_push($powerAndMechValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "OS and Certifications") {
                array_push($osAndCertTitleArray, $detailArray[$k]);
                array_push($osAndCertValueArrayEN, $postedDetailsEN);
                array_push($osAndCertValueArrayTR, $postedDetailsTR);
                array_push($osAndCertValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "Physical and Environmental") {
                array_push($physicalAndEnvTitleArray, $detailArray[$k]);
                array_push($physicalAndEnvValueArrayEN, $postedDetailsEN);
                array_push($physicalAndEnvValueArrayTR, $postedDetailsTR);
                array_push($physicalAndEnvValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "System Memory") {
                array_push($systemMemoTitleArray, $detailArray[$k]);
                array_push($systemMemoValueArrayEN, $postedDetailsEN);
                array_push($systemMemoValueArrayTR, $postedDetailsTR);
                array_push($systemMemoValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "Networking") {
                array_push($networkingTitleArray, $detailArray[$k]);
                array_push($networkingValueArrayEN, $postedDetailsEN);
                array_push($networkingValueArrayTR, $postedDetailsTR);
                array_push($networkingValueArrayAR, $postedDetailsAR);
            }
            if ($specResult[$i]->name == "I/O Interface") {
                array_push($ioInterfaceTitleArray, $detailArray[$k]);
                array_push($ioInterfaceValueArrayEN, $postedDetailsEN);
                array_push($ioInterfaceValueArrayTR, $postedDetailsTR);
                array_push($ioInterfaceValueArrayAR, $postedDetailsAR);
            }
            $k++;
        } else {
            if ($postedDetailsEN == "" && $postedDetailsTR == "" && $postedDetailsAR == "") {
                $k++;
            } else {
                $errors['error'] = 'Eklemeye çalıştığınız bir özellik diğer dillerde yazılmamıştır. Ürün özelliğini lütfen tüm dillerde yazınız.';
                $errors['errorCode'] = "04";
                break;
            }
        }
    }
    if (!empty($errors['errorCode'])) {
        break;
    }
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

    short_description_en,
    short_description_tr,
    short_description_ar,

    key_features_en, 
    key_features_tr, 
    key_features_ar, 

    overview_en,
    overview_tr,
    overview_ar,

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
        :s_desc_en, 
        :s_desc_tr, 
        :s_desc_ar, 
        :k_features_en,
        :k_features_tr,
        :k_features_ar,
        :overview_en,
        :overview_tr,
        :overview_ar,
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
            ':s_desc_en' => $prodShortDescriptionEN,
            ':s_desc_tr' => $prodShortDescriptionTR,
            ':s_desc_ar' => $prodShortDescriptionAR,
            ':k_features_en' => $prodKeyFeaturesEN,
            ':k_features_tr' => $prodKeyFeaturesTR,
            ':k_features_ar' => $prodKeyFeaturesAR,
            ':overview_en' => $prodOverviewEN,
            ':overview_tr' => $prodOverviewTR,
            ':overview_ar' => $prodOverviewAR,
            ':img' => $imgLocation,
            ':datasheet' => $datasheetLocation,
            ':u_manual' => $manualLocation,
            ':spec_platform' => "[" . json_encode($platformTitleArray) . "," . json_encode($platformValueArrayEN)  . "," . json_encode($platformValueArrayTR)  . "," . json_encode($platformValueArrayAR) . "]",
            ':spec_storage' => "[" . json_encode($storageTitleArray) . "," . json_encode($storageValueArrayEN)  . "," . json_encode($storageValueArrayTR)  . "," . json_encode($storageValueArrayAR)  . "]",
            ':spec_io' => "[" . json_encode($ioTitleArray) . "," . json_encode($ioValueArrayEN)  . "," . json_encode($ioValueArrayTR)  . "," . json_encode($ioValueArrayAR)  . "]",
            ':spec_pam' => "[" . json_encode($powerAndMechTitleArray) . "," . json_encode($powerAndMechValueArrayEN)  . "," . json_encode($powerAndMechValueArrayTR)  . "," . json_encode($powerAndMechValueArrayAR)  . "]",
            ':spec_oac' => "[" . json_encode($osAndCertTitleArray) . "," . json_encode($osAndCertValueArrayEN)  . "," . json_encode($osAndCertValueArrayTR)  . "," . json_encode($osAndCertValueArrayAR)  . "]",
            ':spec_pae' => "[" . json_encode($physicalAndEnvTitleArray) . "," . json_encode($physicalAndEnvValueArrayEN)  . "," . json_encode($physicalAndEnvValueArrayTR)  . "," . json_encode($physicalAndEnvValueArrayAR)  . "]",
            ':spec_sm' => "[" . json_encode($systemMemoTitleArray) . "," . json_encode($systemMemoValueArrayEN)  . "," . json_encode($systemMemoValueArrayTR)  . "," . json_encode($systemMemoValueArrayAR)  . "]",
            ':spec_networking' => "[" . json_encode($networkingTitleArray) . "," . json_encode($networkingValueArrayEN)  . "," . json_encode($networkingValueArrayTR)  . "," . json_encode($networkingValueArrayAR)  . "]",
            ':spec_iointerface' => "[" . json_encode($ioInterfaceTitleArray) . "," . json_encode($ioInterfaceValueArrayEN)  . "," . json_encode($ioInterfaceValueArrayTR)  . "," . json_encode($ioInterfaceValueArrayAR)  . "]",
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
