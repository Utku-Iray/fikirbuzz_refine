<?php
require "../database/connection.php";
require "controller.php";

if ($_GET["id"]) {
    $id = $_GET["id"];
    $query = $vt->prepare("SELECT * FROM blog WHERE id='$id'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    header("Location: blogs.php");
}


$query = $vt->prepare("SELECT * FROM blog_category");
$query->execute();
$blogCatResult = $query->fetchAll(PDO::FETCH_OBJ);


?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Blog Düzenle</title>
</head>

<body data-alpino="theme-purple">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Refine Admin | Blog Düzenle</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="updateBlogForm" name="updateBlogForm" method="post" enctype="multipart/form-data">
                                <!-- Blog Title -->
                                <label for="blogTitle" class="mb-1">Başlık</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="blogTitle" name="blogTitle" class="form-control" placeholder="Başlık giriniz" value="<?= $result[0]->title ?>">
                                </div>
                                <!-- Blog Short Content -->
                                <label for="blogShortContent" class="mb-1">Kısa Açıklama</label>
                                <div class="form-group mb-3">
                                    <textarea id="blogShortContent" name="blogShortContent" class="form-control" placeholder="Kısa açıklama giriniz"><?= $result[0]->short_content ?></textarea>
                                </div>

                                <!-- Blog Content -->
                                <label for="ckeditor" class="mb-1">Açıklama</label>
                                <div class="form-group mb-3">
                                    <textarea id="ckeditor" name="ckeditor"><?= $result[0]->content ?></textarea>
                                </div>

                                <!-- Blog Category -->
                                <label for="blogShortContent" class="mb-1">Kategori</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="blogCategory" name="blogCategory">
                                        <option>Kategori Seçiniz</option>
                                        <?php
                                        foreach ($blogCatResult as $catResult) {   ?>
                                            <option value="<?= $catResult->id ?>" <?php if ($result[0]->category_id == $catResult->id) echo 'selected'; ?>><?= $catResult->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Blog Image -->
                                <!-- <label for="blogShortContent" class="mb-1">Fotoğraf</label>
                                <div class="form-group mb-2">
                                    <input type="file" class="form-control-file" id="blogImage" name="blogImage" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                    <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır.</small>
                                </div> -->

                                <div style="text-align: right !important">
                                    <input type="text" value="<?= $_GET["id"] ?>" class="d-none" name="idHolderInput" id="idHolderInput">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5">GÜNCELLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>


    <script>
        $(function() {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.height = 300;

        });
    </script>

    <!-- Update Blog -->
    <script>
        $('#updateBlogForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var ckeditordata = CKEDITOR.instances['ckeditor'].getData();

            $data.append("ckeditordata", ckeditordata)

            Swal.fire({
                title: 'Blogu güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-blog.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: "json",
                        data: $data,
                        success: function(data) {
                            if (data.status == false) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.errors.error,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setInterval(location.href = "blogs.php", 3500);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>