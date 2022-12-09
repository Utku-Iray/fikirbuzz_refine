<?php
require "../database/connection.php";

$query = $vt->prepare("SELECT blog.title, blog.click_count, blog_category.name FROM blog, blog_category WHERE blog.category_id = blog_category.id ORDER BY blog.click_count DESC LIMIT 5");
$query->execute();
$blogResult = $query->fetchAll(PDO::FETCH_OBJ);

$blogCount = $vt->query("SELECT COUNT(*) FROM blog")->fetchColumn();
$blogCategoryCount = $vt->query("SELECT COUNT(*) FROM blog_category")->fetchColumn();
$productCount = $vt->query("SELECT COUNT(*) FROM product")->fetchColumn();
$productCatCount = $vt->query("SELECT COUNT(*) FROM sub_category")->fetchColumn();

$query = $vt->prepare("SELECT * FROM product ORDER BY click_count DESC LIMIT 5");
$query->execute();
$prodResult = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>

    <title>Refine Admin | Anasayfa</title>
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
                            <h2><strong>Refine Admin | </strong>Anasayfa</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mb-3">

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="card info-box-2 hover-zoom-effect s-widget justify-content-center">
                        <div class="content">
                            <div class="text mt-0 h6"><strong>Ürün Sayısı</strong></div>
                            <div class="number"><?= $productCount ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="card info-box-2 hover-zoom-effect  s-widget justify-content-center">
                        <div class="content">
                            <div class="text mt-0 h6"><strong>Ürün KATEGORİ Sayısı</strong></div>
                            <div class="number"><?= $productCatCount ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="card info-box-2 hover-zoom-effect s-widget justify-content-center">
                        <div class="content">
                            <div class="text mt-0 h6"><strong>Blog Sayısı</strong></div>
                            <div class="number"><?= $blogCount ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="card info-box-2 hover-zoom-effect s-widget justify-content-center">
                        <div class="content">
                            <div class="text mt-0 h6"><strong>Blog KATEGORİ Sayısı</strong></div>
                            <div class="number"><?= $blogCategoryCount ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>En Çok Okunan</strong> Bloglar</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive social_media_table">
                                <table class="table mb-0 table-hover">
                                    <tbody>
                                        <?php
                                        foreach ($blogResult as $blog) { ?>
                                            <tr>
                                                <td>
                                                    <span class="list-name d-block"><strong><?= $blog->name ?></strong></span>
                                                    <span class="text-muted"><?= $blog->title ?></span>
                                                </td>
                                                <td class="text-end">
                                                <td><i class="zmdi zmdi-eye zmdi-hc-2x col-amber"></i> <?= $blog->click_count ?></td>
                                                </td>
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
            <div class="row clearfix g-3 mt-2">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>En Çok Ziyaret Edilen</strong> Ürünler</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive social_media_table">
                                <table class="table mb-0 table-hover">
                                    <tbody>
                                        <?php
                                        foreach ($prodResult as $prod) { ?>
                                            <tr>
                                                <td>
                                                    <span class="list-name d-block"><strong><?= $prod->name ?></strong></span>
                                                    <span class="text-muted"><?= $prod->name ?></span>
                                                </td>
                                                <td class="text-end">
                                                <td><i class="zmdi zmdi-mouse zmdi-hc-2x col-amber"></i> <?= $prod->click_count ?></td>
                                                </td>
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