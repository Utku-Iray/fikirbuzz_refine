<?php
require "../database/connection.php";
require "controller.php";

if (isset($_GET["cid"]) && $_GET["cid"] != "1") {
    $catID = $_GET["cid"];
    $query = $vt->prepare("SELECT * FROM blog_category WHERE id='$catID'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    header("Location: blog-category.php");
}



?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Blog Kategori Düzenle</title>
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
                            <h2><strong>Refine Admin | Blog Kategori Düzenle</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="updateBlogCategory" name="updateBlogCategory" method="post" enctype="multipart/form-data">

                                <!-- Blog Cat Name -->
                                <label for="blogTitle" class="mb-1">Kategori Adı</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="blogCatName" name="blogCatName" class="form-control" placeholder="Kategori adını giriniz" value="<?= $result[0]->name ?>">
                                </div>

                                <div style="text-align: right !important">
                                    <input type="text" id="idHolderInput" name="idHolderInput" class="d-none" value="<?= $result[0]->id ?>">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <!-- Create new Blog -->
    <script>
        $('#updateBlogCategory').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'Blog kategorisini güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-blog-category.php",
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
                                setInterval(location.href = "blog-category.php", 3500);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>