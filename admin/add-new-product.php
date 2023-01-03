<?php
require "../database/connection.php";
require "controller.php";

$query = $vt->prepare("SELECT * FROM sub_category");
$query->execute();
$subCatResult = $query->fetchAll(PDO::FETCH_OBJ);

$query2 = $vt->prepare("SELECT * FROM spec");
$query2->execute();
$specResult = $query2->fetchAll(PDO::FETCH_OBJ);

$specCount = count($specResult);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>

    <title>Refine Admin | Yeni Ürün Ekle</title>
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
                            <h2><strong>Refine Admin | </strong>Yeni Ürün Ekle</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form id="newProductForm" name="newProductForm" method="post" enctype="multipart/form-data">

                                <!-- Product Name -->
                                <label for="prodName" class="mb-1">Ürün Adı *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="prodName" name="prodName" class="form-control" placeholder="Ürün Adı">
                                </div>


                                <!-- Product Category -->
                                <label for="prodCategory" class="mb-1">Kategori *</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodCategory" name="prodCategory">
                                        <option class="d-none" value="" selected>Kategori Seçiniz</option>
                                        <?php
                                        foreach ($subCatResult as $catResult) {   ?>
                                            <option value="<?= $catResult->id ?>"><?= $catResult->name_en ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Product Image -->
                                <label for="prodImage" class="mb-1">Fotoğraf *</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control-file" id="prodImage" name="prodImage" accept="image/png, image/jpeg" aria-describedby="imageHelp">
                                    <small for="imageHelp">Fotoğraf türü JPG veya PNG olmalıdır.</small>
                                </div>

                                <!-- Product Datasheet -->
                                <label for="prodDatasheet" class="mb-1">Datasheet</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control-file" id="prodDatasheet" name="prodDatasheet" accept="application/pdf, application/vnd.ms-excel" aria-describedby="datasheetHelp">
                                    <small for="datasheetHelp">Datasheet türü PDF olmalıdır.</small>
                                </div>

                                <!-- Product User Manual -->
                                <label for="prodUserManual" class="mb-1">User Manual</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control-file" id="prodUserManual" name="prodUserManual" accept="application/pdf, application/vnd.ms-excel" aria-describedby="manualHelp">
                                    <small for="manualHelp">User Manual türü PDF olmalıdır.</small>
                                </div>

                                <!-- Product Status -->
                                <label for="prodStatus" class="mb-1">Durum</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodStatus" name="prodStatus">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>

                                <!-- TAB LIST -->
                                <div class="nav nav-pills flex-column flex-sm-row mb-3" id="refineTabList" role="tablist">
                                    <a class="flex-sm-fill text-sm-center nav-link font-weight-bold rounded-0 mt-2 border active" data-bs-toggle="tab" href="#tabEN">
                                        İngilizce
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-link font-weight-bold rounded-0 mt-2 border" data-bs-toggle="tab" href="#tabTR">
                                        Türkçe
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-link font-weight-bold rounded-0 mt-2 border" data-bs-toggle="tab" href="#tabAR">
                                        Arapça
                                    </a>
                                </div>
                                <div class="tab-content mt-2">
                                    <!-- TAB EN -->
                                    <div class="tab-pane fade active show" id="tabEN" role="tabpanel">
                                        <!-- Product Short Description EN -->
                                        <label for="prodShortDescriptionEN" class="mb-1">Kısa Açıklama *</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="prodShortDescriptionEN" name="prodShortDescriptionEN" class="form-control" placeholder="Kısa Açıklama">
                                        </div>
                                        <!-- Product Ana Özellikler EN -->
                                        <label for="ckeditorKeyFeaturesEN" class="mb-1">Ana Özellikler</label>
                                        <div class="form-group mb-3">
                                            <textarea id="ckeditorKeyFeaturesEN" name="ckeditorKeyFeaturesEN"></textarea>
                                        </div>
                                        <!-- Product Overview EN -->
                                        <label for="prodOverviewEN" class="mb-1">Genel Bakış *</label>
                                        <div class="form-group mb-3">
                                            <textarea id="prodOverviewEN" name="prodOverviewEN" class="form-control" placeholder="Genel Bakış"></textarea>
                                        </div>



                                        <!-- Product Specifications Start EN -->
                                        <?php for ($i = 0; $i < $specCount; $i++) { ?>
                                            <h3 class="mt-2 mb-2 bg-dark text-white text-center"><strong><?= $specResult[$i]->name ?> (İngilizce)</strong></h3>
                                            <div class="row mt-2">
                                                <?php
                                                $detailArray = json_decode($specResult[$i]->details);
                                                $detailsCount = count($detailArray);
                                                for ($k = 0; $k <  $detailsCount; $k++) {
                                                    $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
                                                ?>
                                                    <div class="col-md-6">
                                                        <label for="prod<?= $filteredDetail ?>-EN" class="mb-1"><?= $detailArray[$k] ?></label>
                                                        <div class="form-group mb-3">
                                                            <input type="text" id="prod<?= $filteredDetail ?>-EN" name="prod<?= $filteredDetail ?>-EN" class="form-control" placeholder="<?= $detailArray[$k] ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <!-- Product Specifications End EN -->
                                    </div>

                                    <!-- TAB TR -->
                                    <div class="tab-pane fade" id="tabTR" role="tabpanel">
                                        <!-- Product Short Description TR -->
                                        <label for="prodShortDescriptionTR" class="mb-1">Kısa Açıklama *</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="prodShortDescriptionTR" name="prodShortDescriptionTR" class="form-control" placeholder="Kısa Açıklama">
                                        </div>
                                        <!-- Product Ana Özellikler TR -->
                                        <label for="ckeditorKeyFeaturesTR" class="mb-1">Ana Özellikler</label>
                                        <div class="form-group mb-3">
                                            <textarea id="ckeditorKeyFeaturesTR" name="ckeditorKeyFeaturesTR"></textarea>
                                        </div>
                                        <!-- Product Overview TR -->
                                        <label for="prodOverviewTR" class="mb-1">Genel Bakış *</label>
                                        <div class="form-group mb-3">
                                            <textarea id="prodOverviewTR" name="prodOverviewTR" class="form-control" placeholder="Genel Bakış"></textarea>
                                        </div>



                                        <!-- Product Specifications Start TR -->
                                        <?php for ($i = 0; $i < $specCount; $i++) { ?>
                                            <h3 class="mt-2 mb-2 bg-dark text-white text-center"><strong><?= $specResult[$i]->name ?> (Türkçe)</strong></h3>
                                            <div class="row mt-2">
                                                <?php
                                                $detailArray = json_decode($specResult[$i]->details);
                                                $detailsCount = count($detailArray);
                                                for ($k = 0; $k <  $detailsCount; $k++) {
                                                    $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
                                                ?>
                                                    <div class="col-md-6">
                                                        <label for="prod<?= $filteredDetail ?>-TR" class="mb-1"><?= $detailArray[$k] ?></label>
                                                        <div class="form-group mb-3">
                                                            <input type="text" id="prod<?= $filteredDetail ?>-TR" name="prod<?= $filteredDetail ?>-TR" class="form-control" placeholder="<?= $detailArray[$k] ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <!-- Product Specifications End TR -->
                                    </div>

                                    <!-- TAB AR -->
                                    <div class="tab-pane fade" id="tabAR" role="tabpanel">
                                        <!-- Product Short Description AR -->
                                        <label for="prodShortDescriptionAR" class="mb-1">Kısa Açıklama *</label>
                                        <div class="form-group mb-3">
                                            <input type="text" id="prodShortDescriptionAR" name="prodShortDescriptionAR" class="form-control" placeholder="Kısa Açıklama">
                                        </div>
                                        <!-- Product Ana Özellikler AR -->
                                        <label for="ckeditorKeyFeaturesAR" class="mb-1">Ana Özellikler</label>
                                        <div class="form-group mb-3">
                                            <textarea id="ckeditorKeyFeaturesAR" name="ckeditorKeyFeaturesAR"></textarea>
                                        </div>
                                        <!-- Product Overview AR -->
                                        <label for="prodOverviewAR" class="mb-1">Genel Bakış *</label>
                                        <div class="form-group mb-3">
                                            <textarea id="prodOverviewAR" name="prodOverviewAR" class="form-control" placeholder="Genel Bakış"></textarea>
                                        </div>



                                        <!-- Product Specifications Start AR -->
                                        <?php for ($i = 0; $i < $specCount; $i++) { ?>
                                            <h3 class="mt-2 mb-2 bg-dark text-white text-center"><strong><?= $specResult[$i]->name ?> (Arapça)</strong></h3>
                                            <div class="row mt-2">
                                                <?php
                                                $detailArray = json_decode($specResult[$i]->details);
                                                $detailsCount = count($detailArray);
                                                for ($k = 0; $k <  $detailsCount; $k++) {
                                                    $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
                                                ?>
                                                    <div class="col-md-6">
                                                        <label for="prod<?= $filteredDetail ?>-AR" class="mb-1"><?= $detailArray[$k] ?></label>
                                                        <div class="form-group mb-3">
                                                            <input type="text" id="prod<?= $filteredDetail ?>-AR" name="prod<?= $filteredDetail ?>-AR" class="form-control" placeholder="<?= $detailArray[$k] ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <!-- Product Specifications End AR -->
                                    </div>
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
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <script>
        $(function() {
            //CKEditor
            CKEDITOR.replace('ckeditorKeyFeaturesEN');
            CKEDITOR.replace('ckeditorKeyFeaturesTR');
            CKEDITOR.replace('ckeditorKeyFeaturesAR');
            CKEDITOR.config.height = 300;

        });
    </script>

    <!-- Create Product -->
    <script>
        $('#newProductForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var ckeditordataEN = CKEDITOR.instances['ckeditorKeyFeaturesEN'].getData();
            var ckeditordataTR = CKEDITOR.instances['ckeditorKeyFeaturesTR'].getData();
            var ckeditordataAR = CKEDITOR.instances['ckeditorKeyFeaturesAR'].getData();

            $data.append("prodKeyFeaturesEN", ckeditordataEN);
            $data.append("prodKeyFeaturesTR", ckeditordataTR);
            $data.append("prodKeyFeaturesAR", ckeditordataAR);


            Swal.fire({
                title: 'Ürünü eklemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/create-product.php",
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
                                    timer: 2500
                                })
                            } else {
                                setInterval(location.href = "products.php", 3500);
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.success,
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