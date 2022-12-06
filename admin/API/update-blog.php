<?php
include "../../database/connection.php";

$idHolder = trim(filter_input(INPUT_POST, 'idHolderInput'));
$blogTitle = filter_input(INPUT_POST, 'blogTitle');
$blogShortContent = trim(filter_input(INPUT_POST, 'blogShortContent'));
$blogContent = $_POST["ckeditordata"];
$blogCategory = trim(filter_input(INPUT_POST, 'blogCategory'));
$image = "blogImage";
$date = date("YY-MM-DD, h:i:sa");



$marks = array("(", ")", "?", ",", ":");
$blogTitleLower = strtolower($blogTitle);
$spaceRemovedTitle = str_replace(" ", "-", $blogTitleLower);
$url = str_replace($marks, "", $spaceRemovedTitle);



// $tmpFilePath = $_FILES[$image]['tmp_name'];

// $filename = $_FILES[$image]["name"];
// $efilename = explode('.', $filename);
// $uzanti = $efilename[count($efilename) - 1];
// $location  = "";

if (
    empty($blogTitle && $blogShortContent && $blogContent) // && $filename
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    // $nameWithURL = $url . ".$uzanti";


    // if ($tmpFilePath != "") {
    //     $location  = "attachments/blog/" . $nameWithURL;
    //     if (file_exists('../../attachments/blog/' . $nameWithURL)) {
    //         unlink('../../attachments/blog/' . $nameWithURL);
    //     }
    //     move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/blog/" . $nameWithURL);
    // }


    $sorgu = $vt->prepare("UPDATE blog SET title = :title, url = :url, short_content = :s_content, content = :content, category_id = :cat_id
    WHERE id='$idHolder'");
    if ($sorgu) {
        $result = $sorgu->execute([
            ':title' => $blogTitle,
            ':url' => $url,
            ':s_content' => $blogShortContent,
            ':content' => $blogContent,
            ':cat_id' => $blogCategory,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Blog başarıyla güncellendi.';
        }
    }
}

// ':image' => $location,
echo json_encode($form_data);

die();
$vt = null;
