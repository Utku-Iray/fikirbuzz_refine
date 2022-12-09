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
                                <!-- Product Short Description -->
                                <label for="prodShortDescription" class="mb-1">Kısa Açıklama *</label>
                                <div class="form-group mb-3">
                                    <input type="text" id="prodShortDescription" name="prodShortDescription" class="form-control" placeholder="Kısa Açıklama">
                                </div>
                                <!-- Product Ana Özellikler -->
                                <label for="ckeditorKeyFeatures" class="mb-1">Ana Özellikler</label>
                                <div class="form-group mb-3">
                                    <textarea id="ckeditorKeyFeatures" name="ckeditorKeyFeatures"></textarea>
                                </div>
                                <!-- Product Overview -->
                                <label for="prodOverview" class="mb-1">Genel Bakış *</label>
                                <div class="form-group mb-3">
                                    <textarea id="prodOverview" name="prodOverview" class="form-control" placeholder="Genel Bakış"></textarea>
                                </div>

                                <!-- Product Category -->
                                <label for="prodCategory" class="mb-1">Kategori *</label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="prodCategory" name="prodCategory">
                                        <option class="d-none" value="" selected>Kategori Seçiniz</option>
                                        <?php
                                        foreach ($subCatResult as $catResult) {   ?>
                                            <option value="<?= $catResult->id ?>"><?= $catResult->name ?></option>
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

                                <!-- Product Specifications Start -->
                                <?php for ($i = 0; $i < $specCount; $i++) { ?>
                                    <h3 class="mt-2 mb-2 bg-dark text-white text-center"><strong><?= $specResult[$i]->name ?></strong></h3>
                                    <div class="row mt-2">
                                        <?php
                                        $detailArray = json_decode($specResult[$i]->details);
                                        $detailsCount = count($detailArray);

                                        for ($k = 0; $k <  $detailsCount; $k++) {
                                            $filteredDetail =  str_replace(" ", "", $detailArray[$k]);
                                        ?>
                                            <div class="col-md-6">
                                                <label for="prod<?= $filteredDetail ?>" class="mb-1"><?= $detailArray[$k] ?></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="prod<?= $filteredDetail ?>" name="prod<?= $filteredDetail ?>" class="form-control" placeholder="<?= $detailArray[$k] ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <!-- Product Specifications End -->

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
            CKEDITOR.replace('ckeditorKeyFeatures');
            CKEDITOR.config.height = 300;

        });
    </script>

    <!-- Create Product -->
    <script>
        $('#newProductForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var ckeditordata = CKEDITOR.instances['ckeditorKeyFeatures'].getData();

            $data.append("prodKeyFeatures", ckeditordata);

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
                            setInterval(location.href = "products.php", 2500);
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
                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>