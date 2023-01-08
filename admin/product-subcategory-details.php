<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM category");
$query->execute();
$productCategoryResult = $query->fetchAll(PDO::FETCH_OBJ);


$subCatID = $_GET["scid"];

$query2 = $vt->prepare("SELECT * FROM sub_category WHERE id = '$subCatID'");
$query2->execute();
$productSubCategoryResult = $query2->fetchAll(PDO::FETCH_OBJ);

?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Refine Admin | Alt Kategori Düzenle</title>
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
                            <h2><strong>Refine Admin | </strong>Alt Kategori Düzenle</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="updateProductSubCategory" name="updateProductSubCategory" method="post" enctype="multipart/form-data">

                                <ul class="nav nav-tabs" id="refineTabList" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#tabEN" type="button" role="tab" aria-controls="tabEN" aria-selected="true">İngilizce</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tr-tab" data-bs-toggle="tab" data-bs-target="#tabTR" type="button" role="tab" aria-controls="tabTR" aria-selected="false">Türkçe</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="ar-tab" data-bs-toggle="tab" data-bs-target="#tabAR" type="button" role="tab" aria-controls="tabAR" aria-selected="false">Arapça</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="refineTabContent">
                                    <!-- Content EN -->
                                    <div class="tab-pane fade show active" id="tabEN" role="tabpanel" aria-labelledby="en-tab">

                                        <label for="productSubCatNameEN" class="mb-1">Alt Kategori Adı (İngilizce)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="productSubCatNameEN" name="productSubCatNameEN" class="form-control" placeholder="Alt Kategori Adı" value="<?= $productSubCategoryResult[0]->name_en ?>">
                                        </div>

                                        <label for="productSubCatDescEN" class="mb-1">Alt Kategori Açıklama (İngilizce)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="productSubCatDescEN" name="productSubCatDescEN" class="form-control" placeholder="Alt Kategori Açıklama" value="<?= $productSubCategoryResult[0]->description_en ?>">
                                        </div>

                                    </div>

                                    <!-- Content TR -->
                                    <div class="tab-pane fade" id="tabTR" role="tabpanel" aria-labelledby="tr-tab">

                                        <label for="productSubCatNameTR" class="mb-1">Alt Kategori Adı (Türkçe)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="productSubCatNameTR" name="productSubCatNameTR" class="form-control" placeholder="Alt Kategori Adı" value="<?= $productSubCategoryResult[0]->name_tr ?>">
                                        </div>

                                        <label for="productSubCatDescTR" class="mb-1">Alt Kategori Açıklama (Türkçe)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="productSubCatDescTR" name="productSubCatDescTR" class="form-control" placeholder="Alt Kategori Açıklama" value="<?= $productSubCategoryResult[0]->description_tr ?>">
                                        </div>

                                    </div>

                                    <!-- Content AR -->
                                    <div class="tab-pane fade" id="tabAR" role="tabpanel" aria-labelledby="ar-tab">

                                        <label for="productSubCatNameAR" class="mb-1">Alt Kategori Adı (Arapça)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" dir="rtl" id="productSubCatNameAR" name="productSubCatNameAR" class="form-control" placeholder="Alt Kategori Adı" value="<?= $productSubCategoryResult[0]->name_ar ?>">
                                        </div>

                                        <label for="productSubCatDescAR" class="mb-1">Alt Kategori Açıklama (Arapça)</label>
                                        <div class="form-group mb-3">
                                            <input type="text" dir="rtl" id="productSubCatDescAR" name="productSubCatDescAR" class="form-control" placeholder="Alt Kategori Açıklama" value="<?= $productSubCategoryResult[0]->description_ar ?>">
                                        </div>

                                    </div>
                                </div>


                                <label for="prodMainCategory" class="mb-1">Bağlı Olduğu Ana Kategori</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodMainCategory" name="prodMainCategory">

                                        <?php foreach ($productCategoryResult as $result) {   ?>
                                            <option value="<?= $result->id ?>" <?php if ($productSubCategoryResult[0]->category_id == $result->id) echo "selected"; ?>><?= $result->name_en ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <label for="prodSubCatStatus" class="mb-1">Alt Kategori Durum</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodSubCatStatus" name="prodSubCatStatus" aria-describedby="catStatusHelp">
                                        <option value="1" <?php if ($productSubCategoryResult[0]->status == 1) echo "selected";   ?>>Aktif</option>
                                        <option value="0" <?php if ($productSubCategoryResult[0]->status == 0) echo "selected";   ?>>Pasif</option>
                                    </select>
                                    <small for="catStatusHelp">* Kategori durumu aktif ise ürün eklenebilir ve websitede erişilebilir olacaktır.</small>
                                </div>

                                <!-- Product Sub Category Image -->
                                <!-- <label for="prodSubCatImage" class="mb-1">Fotoğraf</label>
                                <div class="form-group mb-2">
                                    <input type="file" class="form-control-file" id="prodSubCatImage" name="prodSubCatImage" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                    <small for="fileHelp">Fotoğraf türü PNG veya JPG olmalıdır.</small>
                                </div> -->

                                <div style="text-align: right !important">
                                    <input type="text" id="idHolderInput" name="idHolderInput" class="d-none" value="<?= $productSubCategoryResult[0]->id ?>">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
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
        $('#updateProductSubCategory').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'Alt kategoriyi güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-product-subcategory.php",
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
                                setInterval(location.href = "product-category.php", 3500);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>