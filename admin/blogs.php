<?php
require "../database/connection.php";

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
                                                <td><?= $singleResult->name ?></td>
                                                <td><?= $singleResult->click_count ?></td>
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