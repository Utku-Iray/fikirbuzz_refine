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


                            <a href="javascript:void(0);" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>

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
                                            <tr class="cat-<?= $singleResult->id ?>">
                                                <td><?= $singleResult->name ?></td>
                                                <td><?= $singleResult->status ?></td>
                                                <td class="text-center"><button class="btn btn-info">DÜZENLE</button></td>
                                                <td class="text-center"><button class="btn btn-danger">SİL</button></td>
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
                            <a href="javascript:void(0);" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>
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
                                                <td class="text-center"><button class="btn btn-info">DÜZENLE</button></td>
                                                <td class="text-center"><button class="btn btn-danger">SİL</button></td>
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
</body>

</html>