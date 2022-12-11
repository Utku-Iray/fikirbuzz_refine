<?php
$specPlatformArr = json_decode($productResult[0]->spec_platform);
if (!empty($specPlatformArr[0])) {
    foreach ($specPlatformArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPlatformArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specStorageArr = json_decode($productResult[0]->spec_storage);
if (!empty($specStorageArr[0])) {
    foreach ($specStorageArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specStorageArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specIOArr = json_decode($productResult[0]->spec_io);
if (!empty($specIOArr[0])) {
    foreach ($specIOArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specIOArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specPamArr = json_decode($productResult[0]->spec_pam);
if (!empty($specPamArr[0])) {
    foreach ($specPamArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPamArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specOacArr = json_decode($productResult[0]->spec_oac);
if (!empty($specOacArr[0])) {
    foreach ($specOacArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specOacArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specPaeArr = json_decode($productResult[0]->spec_pae);
if (!empty($specPaeArr[0])) {
    foreach ($specPaeArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specPaeArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specSmArr = json_decode($productResult[0]->spec_sm);
if (!empty($specSmArr[0])) {
    foreach ($specSmArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specSmArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specNetworkArr = json_decode($productResult[0]->spec_networking);
if (!empty($specNetworkArr[0])) {
    foreach ($specNetworkArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specNetworkArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
$specIOInterfaceArr = json_decode($productResult[0]->spec_iointerface);
if (!empty($specIOInterfaceArr[0])) {
    foreach ($specIOInterfaceArr[0] as $key) {
        array_push($prodKeyArr, $key);
    }
    foreach ($specIOInterfaceArr[1] as $value) {
        array_push($prodValueArr, $value);
    }
}
