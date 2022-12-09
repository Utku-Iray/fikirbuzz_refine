<?php
require "../database/connection.php";
require "utility/controller.php";

$query = $vt->prepare("SELECT * FROM category");
$query->execute();
$productCategoryResult = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Yeni Alt Kategori Ekle</title>
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
                            <h2><strong>Refine Admin | </strong>Yeni Alt Kategori Ekle</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="addNewProductSubCategory" name="addNewProductSubCategory" method="post" enctype="multipart/form-data">

                                <!-- Product Sub Category Name -->
                                <label for="productSubCatName" class="mb-1">Alt Kategori Adı</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="productSubCatName" name="productSubCatName" class="form-control" placeholder="Alt Kategori Adı">
                                </div>

                                <label for="productSubCatDesc" class="mb-1">Alt Kategori Açıklama</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="productSubCatDesc" name="productSubCatDesc" class="form-control" placeholder="Alt Kategori Açıklama">
                                </div>


                                <label for="prodMainCategory" class="mb-1">Bağlı Olduğu Ana Kategori</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodMainCategory" name="prodMainCategory">
                                        <option selected>Ana Kategori Seçiniz</option>
                                        <?php foreach ($productCategoryResult as $result) {   ?>
                                            <option value="<?= $result->id ?>"><?= $result->name ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <label for="prodSubCatStatus" class="mb-1">Alt Kategori Durum</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodSubCatStatus" name="prodSubCatStatus" aria-describedby="catStatusHelp">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                    <small for="catStatusHelp">* Kategori durumu aktif ise ürün eklenebilir ve websitede erişilebilir olacaktır.</small>
                                </div>

                                <!-- Product Sub Category Image -->
                                <label for="prodSubCatImage" class="mb-1">Fotoğraf</label>
                                <div class="form-group mb-2">
                                    <input type="file" class="form-control-file" id="prodSubCatImage" name="prodSubCatImage" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                    <small for="fileHelp">Fotoğraf türü PNG veya JPG olmalıdır.</small>
                                </div>

                                <div style="text-align: right !important">
                                    <input type="text" id="userNameInput" name="userNameInput" class="d-none" value="admin">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">EKLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include "utility/script.php"; ?>

    <!-- Create new Blog Category -->
    <script>
        $('#addNewProductSubCategory').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'Alt kategoriyi eklemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/create-prod-sub-cat.php",
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
                                setInterval(location.href = "product-category.php", 3000);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>