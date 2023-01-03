<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM blog");
$query->execute();
$blogResult = $query->fetchAll(PDO::FETCH_OBJ);

?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Bloglar</title>
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

                            <h2><strong>Refine Admin | Bloglar</strong></h2>


                            <a href="add-new-blog.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>

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
                                            <th>Blog Adı</th>
                                            <th>Blog Tıklanma Sayısı</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($blogResult as $singleResult) { ?>
                                            <tr class="blog-<?= $singleResult->id ?>">
                                                <td><?= $singleResult->title ?></td>
                                                <td><?= $singleResult->click_count ?></td>
                                                <td class="text-center"><a href="blog-details.php?id=<?= $singleResult->id ?>" class="btn btn-info">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger blogDeleteBtn" blog-id=<?= $singleResult->id ?> blog-img="<?= $singleResult->image ?>">SİL</button></td>
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


    <!-- Delete Blog -->
    <script>
        $(document).on('click', '.blogDeleteBtn', function() {
            event.preventDefault();
            var blogID = $(this).attr("blog-id");
            var blogImg = $(this).attr("blog-img");

            Swal.fire({
                title: 'Blogu silmek istediğinize emin misiniz?',
                text: "Not: Geri dönüşü olmayacaktır. Tekrar eklemek zorunda kalabilirsiniz.",
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
                        url: "API/delete-blog.php",
                        type: "POST",
                        data: {
                            blogID: blogID,
                            blogImg: blogImg
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                setInterval(reloadHandler, 3500)
                                $(".blog-" + blogID).fadeOut('slow');
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