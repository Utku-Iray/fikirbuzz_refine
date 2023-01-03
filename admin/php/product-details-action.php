<?php
$specPlatformArr = json_decode($productResult[0]->spec_platform);
if (!empty($specPlatformArr[0])) {
    foreach ($specPlatformArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPlatformArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specPlatformArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specPlatformArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specStorageArr = json_decode($productResult[0]->spec_storage);
if (!empty($specStorageArr[0])) {
    foreach ($specStorageArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specStorageArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specStorageArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specStorageArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specIOArr = json_decode($productResult[0]->spec_io);
if (!empty($specIOArr[0])) {
    foreach ($specIOArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specIOArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specIOArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specIOArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specPamArr = json_decode($productResult[0]->spec_pam);
if (!empty($specPamArr[0])) {
    foreach ($specPamArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPamArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specPamArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specPamArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specOacArr = json_decode($productResult[0]->spec_oac);
if (!empty($specOacArr[0])) {
    foreach ($specOacArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specOacArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specOacArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specOacArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specPaeArr = json_decode($productResult[0]->spec_pae);
if (!empty($specPaeArr[0])) {
    foreach ($specPaeArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPaeArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specPaeArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specPaeArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specSmArr = json_decode($productResult[0]->spec_sm);
if (!empty($specSmArr[0])) {
    foreach ($specSmArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specSmArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specSmArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specSmArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specNetworkArr = json_decode($productResult[0]->spec_networking);
if (!empty($specNetworkArr[0])) {
    foreach ($specNetworkArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specNetworkArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specNetworkArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specNetworkArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
$specIOInterfaceArr = json_decode($productResult[0]->spec_iointerface);
if (!empty($specIOInterfaceArr[0])) {
    foreach ($specIOInterfaceArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specIOInterfaceArr[1] as $value) {
        array_push($prodValueArrEN, $value);
    }
    foreach ($specIOInterfaceArr[2] as $value) {
        array_push($prodValueArrTR, $value);
    }
    foreach ($specIOInterfaceArr[3] as $value) {
        array_push($prodValueArrAR, $value);
    }
}
