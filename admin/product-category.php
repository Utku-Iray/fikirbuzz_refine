<?php
require "../database/connection.php";

$query = $vt->prepare("SELECT * FROM category");
$query->execute();
$productCategoryResult = $query->fetchAll(PDO::FETCH_OBJ);

$query2 = $vt->prepare("SELECT * FROM sub_category");
$query2->execute();
$productSubCategoryResult = $query2->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>

    <title>Refine Admin | Ürün Kategori</title>
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
                            <h2><strong>Refine Admin | Ürün Kategori</strong></h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between">

                            <h2><strong>Ana Kategori</strong></h2>


                            <a href="add-new-product-category.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>

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
                                            <th>Kategori Durumu</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($productCategoryResult as $singleResult) { ?>
                                            <tr class="mcat-<?= $singleResult->id ?>">
                                                <td><?= $singleResult->name ?></td>
                                                <td><?= $singleResult->status ?></td>
                                                <td class="text-center"><a href="product-category-details.php?cid=<?= $singleResult->id ?>" class="btn btn-info">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger productMainCategoryDeleteBtn" mcat-id=<?= $singleResult->id ?>>SİL</button></td>
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

            <div class="row mt-4 clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between">
                            <h2><strong>Alt Kategori</strong></h2>
                            <a href="add-new-product-subcategory.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Alt Kategori Adı</th>
                                            <th>Alt Kategori Durumu</th>
                                            <th>Ana Kategorisi</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($productSubCategoryResult as $singleResult) { ?>
                                            <tr class="subcat-<?= $singleResult->id ?>">
                                                <td><?= $singleResult->name ?></td>
                                                <td><?= $singleResult->status ?></td>
                                                <td><?= $singleResult->category_id ?></td>
                                                <td class="text-center"><a href="product-subcategory-details.php?scid=<?= $singleResult->id ?>" class="btn btn-info">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger productSubCategoryDeleteBtn" subcat-id="<?= $singleResult->id ?>" subcat-img="<?= $singleResult->image ?>">SİL</button></td>
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

    <!-- Delete Product Main Category -->
    <script>
        $(document).on('click', '.productMainCategoryDeleteBtn', function() {
            event.preventDefault();
            var mainCatID = $(this).attr("mcat-id");


            Swal.fire({
                title: 'Ana kategoriyi silmek istediğinize emin misiniz?',
                text: "Dikkat: Bu ANA kategoriye ait ALT kategoriler ve ÜRÜNLER SİLİNECEKTİR!",
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
                        url: "API/delete-product-category.php",
                        type: "POST",
                        data: {
                            mainCatID: mainCatID
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                setInterval(reloadHandler, 2500)
                                $(".mcat-" + mainCatID).fadeOut('slow');
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

    <!-- Delete Product Sub Category -->
    <script>
        $(document).on('click', '.productSubCategoryDeleteBtn', function() {
            event.preventDefault();
            var subCatID = $(this).attr("subcat-id");
            var subCatImg = $(this).attr("subcat-img");

            Swal.fire({
                title: 'Alt kategoriyi silmek istediğinize emin misiniz?',
                text: "Dikkat: Bu ALT kategoriye ait ÜRÜNLER SİLİNECEKTİR!",
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
                        url: "API/delete-product-subcategory.php",
                        type: "POST",
                        data: {
                            subCatID: subCatID,
                            subCatImg: subCatImg
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                setInterval(reloadHandler, 2500)
                                $(".subcat-" + subCatID).fadeOut('slow');
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