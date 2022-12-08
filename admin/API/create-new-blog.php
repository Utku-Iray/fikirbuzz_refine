<?php
include "../../database/connection.php";

$blogTitle = trim(filter_input(INPUT_POST, 'blogTitle'));
$blogShortContent = trim(filter_input(INPUT_POST, 'blogShortContent'));
$blogContent = $_POST["ckeditordata"];
$blogCategory = trim(filter_input(INPUT_POST, 'blogCategory'));
$user = trim(filter_input(INPUT_POST, 'userNameInput'));
$image = "blogImage";
$date = date("YY-MM-DD, h:i:sa");


$marks = array("(", ")", "?", ",", ":", "/");
$blogTitleLower = strtolower($blogTitle);
$spaceRemovedTitle = str_replace(" ", "-", $blogTitleLower);
$url = str_replace($marks, "", $spaceRemovedTitle);


$tmpFilePath = $_FILES[$image]['tmp_name'];

$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";

if (
    empty($blogTitle && $blogShortContent && $blogContent && $filename)
) {
    $errors['error'] = 'Bütün alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $nameWithURL = $url . "." . $uzanti;


    if ($tmpFilePath != "") {
        $location  = "attachments/blog/" . $nameWithURL;
        if (file_exists('../../attachments/blog/' . $nameWithURL)) {
            unlink('../../attachments/blog/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/blog/" . $nameWithURL);
    }


    $sorgu = $vt->prepare('INSERT INTO blog (title, url, short_content, content, image, category_id, sort, created_by)
    VALUES (:title, :url, :s_content, :content, :image, :cat_id, :sort, :c_by)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':title' => $blogTitle,
            ':url' => $url,
            ':s_content' => $blogShortContent,
            ':content' => $blogContent,
            ':image' => $location,
            ':cat_id' => $blogCategory,
            ':sort' => "0",
            ':c_by' => $user,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Yeni blog başarıyla oluşturuldu.';
        }
    }
}


echo json_encode($form_data);

die();
$vt = null;
