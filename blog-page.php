<?php
require "database/connection.php";
include "config.php";

$query = $vt->prepare("SELECT blog.image, blog.title, blog.short_content, blog.created_at, blog.url, blog_category.name FROM blog, blog_category WHERE blog.category_id = blog_category.id ORDER BY blog.created_at DESC");
$query->execute();
$blogResult = $query->fetchAll(PDO::FETCH_OBJ);


$query = $vt->prepare("SELECT blog.image, blog.title, blog.short_content, blog.created_at, blog.url, blog_category.name FROM blog, blog_category WHERE blog.category_id = blog_category.id AND sort = 5 ORDER BY blog.created_at DESC");
$query->execute();
$highlights = $query->fetchAll(PDO::FETCH_OBJ);

$query = $vt->prepare("SELECT blog.image, blog.title, blog.short_content, blog.created_at, blog.url, blog_category.name FROM blog, blog_category WHERE blog.category_id = blog_category.id ORDER BY blog.click_count DESC");
$query->execute();
$mostRead = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body >

    <?php include 'php/header.php' ?>

    <main>
        <div class="banner dark">
            <div class="image-area">
                <img class="bannerImg" src="assets/materials/blog-cover.png">
            </div>
            <div class="container-fluid col-xl-10">
                <div class="row align-content-center align-items-center">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="index.php'">Home</a><a href="blog-page.php">Blog</a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1>Blog</h1>
                            <p>In addition to being Lanner’s authorized distributor in the Middle East, Türkiye and Pakistan. We also offer sourcing services for PCB design & manufacturing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 blog-page">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix">
                    <div class="col-xl-12 ms-auto text-end title mb-5">
                        <h1>Highlights <img class="ms-2" src="assets/materials/smb.svg"></h1>
                    </div>
                    <div class="boxed-content mx-auto mx-xl-0 p-0 row col-xl-7">

                        <?php
                        for ($i = 0; $i < 2; $i++) { ?>
                            <div class="col-xl-6 inp mb-4 mb-xl-0">
                                <div class="full-box">
                                    <div class="outbox">
                                        <img src="<?= $highlights[$i]->image ?>">
                                    </div>
                                    <div class="description">
                                        <h1><?= $highlights[$i]->title ?></h1>
                                        <p><?= $highlights[$i]->short_content ?></p>
                                    </div>
                                    <div class="details d-flex">
                                        <div class="post-tag"><?= $highlights[$i]->name ?></div>
                                        <div class="date">
                                            <img src="assets/materials/calendar.svg"><span><?= $highlights[$i]->created_at ?></span>
                                        </div>
                                    </div>
                                    <a href="single-blog.php?url=<?= $highlights[$i]->url ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                                        ARTICLE
                                        <hr />
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-xl-5 mt-xl-0 mt-5 sec-right ms-auto">
                        <?php
                        for ($i = 2; $i < 5; $i++) { ?>
                            <div class="incontent mb-4">
                                <h1><?= $highlights[$i]->title ?></h1>
                                <p><?= $highlights[$i]->short_content ?></p>
                                <a href="single-blog.php?url=<?= $highlights[$i]->url ?>">READ ARTICLE</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 blog-page bg-white">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix align-content-center align-items-center">
                    <div class="col-xl-12 ms-auto text-start title mb-5">
                        <h1>Most Read <img class="ms-2" src="assets/materials/smb.svg"></h1>
                    </div>
                    <div class="col-xl-5 mt-xl-0 mt-5 sec-right">
                        <?php
                        for ($i = 0; $i < 2; $i++) { ?>
                            <div class="incontent mb-5">
                                <h1><?= $mostRead[$i]->title ?></h1>
                                <p><?= $mostRead[$i]->short_content ?></p>
                                <a href="single-blog.php?url=<?= $mostRead[$i]->url ?>">READ ARTICLE</a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-xl-6 ms-auto">
                        <div class="outbox">
                            <img src="<?= $mostRead[2]->image ?>">
                            <div class="description row align-items-xl-between align-content-xl-between h">
                            
                                <div class="title mt-4">
                                    <div class="post-tag-w"><?= $mostRead[2]->name ?></div>
                                    <a href="single-blog.php?url=<?= $mostRead[2]->url ?>">
                                        <h1><?= $mostRead[2]->title ?></h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 blog-page">
            <div class="container-fluid col-xl-10">
                <div class="row list-blog clearfix">
                    <div class="col-xl-12 ms-auto text-end title mb-5">
                        <h1>All Posts <img class="ms-2" src="assets/materials/smb.svg"></h1>
                    </div>
                    <div class="boxed-content mx-auto mx-xl-0 p-0 row col-xl-12">

                        <?php foreach ($blogResult as $singleBlog) { ?>
                            <div class="col-xl-4 inp mb-5">
                                <div class="full-box">
                                    <div class="outbox">
                                        <img src="<?= $singleBlog->image ?>">
                                    </div>
                                    <div class="description">
                                        <h1><?= $singleBlog->title ?></h1>
                                        <p><?= $singleBlog->short_content ?></p>
                                    </div>
                                    <div class="details d-flex">
                                        <div class="post-tag"><?= $singleBlog->name ?></div>
                                        <div class="date">
                                            <img src="assets/materials/calendar.svg"><span><?= $singleBlog->created_at ?></span>
                                        </div>
                                    </div>
                                    <a href="single-blog.php?url=<?= $singleBlog->url ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                                        ARTICLE
                                        <hr />
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <button class="load-more__btn mt-5 mb-5">SEE MORE<br /><img src="assets/materials/downron.svg"></button>
                    </div>
                </div>
            </div>
        </div>

       

    <?php include 'php/footer.php' ?>

</body>

</html>