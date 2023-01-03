<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM blog_category");
$query->execute();
$blogCategoryResult = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Blog Kategori</title>
</head>

<body data-alpino="theme-purple">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between">

                            <h2><strong>Refine Admin | Blog Kategori</strong></h2>


                            <a href="add-new-blog-category.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($blogCategoryResult as $singleResult) { ?>
                                            <tr class="blogcat-<?= $singleResult->id ?>">
                                                <td><?= $singleResult->name ?></td>
                                                <td class="text-center"><a href="blog-category-details.php?cid=<?= $singleResult->id ?>" class="btn btn-info <?php if ($singleResult->id == 1) echo "disabled" ?>">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger blogCategoryDeleteBtn" blogCat-id="<?= $singleResult->id ?>" <?php if ($singleResult->id == 1) echo "disabled" ?>>SİL</button></td>
                                            </tr>
                                        <?php }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>


    <!-- // UPDATE BLOG CATEGORY // -->

    <!-- // DELETE BLOG CATEGORY // -->
    <script>
        $(document).on('click', '.blogCategoryDeleteBtn', function() {
            event.preventDefault();
            var blogCatID = $(this).attr("blogCat-id");

            Swal.fire({
                title: 'Kategoriyi silmek istediğinize emin misiniz?',
                text: "Not: Silmeniz durumunda bu kategoriye ait bloglar kategorisiz kalacağı için blogları düzenlemeniz gerekebilir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#18ce0f",
                cancelButtonColor: "#FF3636",
                confirmButtonText: 'Evet, eminim!',
                cancelButtonText: 'Vazgeç',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/delete-blog-category.php",
                        type: "POST",
                        data: {
                            blogCatID: blogCatID
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                setInterval(reloadHandler, 3500)
                                $(".blogcat-" + blogCatID).fadeOut('slow');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        }
                    });
                }
            })
        });
    </script>
</body>

</html>