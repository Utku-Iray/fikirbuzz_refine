<?php
require "database/connection.php";

$query = $vt->prepare("SELECT * FROM blog ORDER BY created_at ASC");
$query->execute();
$blogResult = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

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
                            <p>In addition to being Lanner’s authorized distributor in the Middle East, we also offer sourcing services for PCB design & manufacturing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 blog-page">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix">
                    <div class="col-xl-12 ms-auto text-end title mb-5">
                        <h1>Related Products <img class="ms-2" src="assets/materials/smb.svg"></h1>
                    </div>
                    <div class="boxed-content mx-auto mx-xl-0 p-0 row col-xl-7">
                        <div class="col-xl-6 inp mb-4 mb-xl-0">
                            <div class="full-box">
                                <div class="outbox">
                                    <img src="assets/materials/blog-box-cover.png">
                                </div>
                                <div class="description">
                                    <h1>Where is 5g technology used?</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac mi.</p>
                                </div>
                                <div class="details d-flex">
                                    <div class="post-tag">SECURITY</div>
                                    <div class="date">
                                        <img src="assets/materials/calendar.svg"><span>22.03.22</span>
                                    </div>
                                </div>
                                <a href="single-blog.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                                    ARTICLE
                                    <hr />
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-6 inp mb-4 mb-xl-0">
                            <div class="full-box">
                                <div class="outbox">
                                    <img src="assets/materials/blog-box-cover.png">
                                </div>
                                <div class="description">
                                    <h1>Where is 5g technology used?</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac mi.</p>
                                </div>
                                <div class="details d-flex">
                                    <div class="post-tag">SECURITY</div>
                                    <div class="date">
                                        <img src="assets/materials/calendar.svg"><span>22.03.22</span>
                                    </div>
                                </div>
                                <a href="single-blog.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                                    ARTICLE
                                    <hr />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 mt-xl-0 mt-5 sec-right ms-auto">
                        <div class="incontent mb-4">
                            <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur aucibus, suscipit ac mi.</p>
                            <a href="single-blog.php">READ ARTICLE</a>
                        </div>
                        <div class="incontent mb-4">
                            <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur aucibus, suscipit ac mi.</p>
                            <a href="single-blog.php">READ ARTICLE</a>
                        </div>
                        <div class="incontent mb-4">
                            <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur aucibus, suscipit ac mi.</p>
                            <a href="single-blog.php">READ ARTICLE</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 blog-page bg-white">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix align-content-center align-items-center">
                    <div class="col-xl-5 mt-xl-0 mt-5 sec-right">
                        <div class="incontent mb-5">
                            <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur aucibus, suscipit ac mi.</p>
                            <a href="single-blog.php">READ ARTICLE</a>
                        </div>
                        <div class="incontent mb-5">
                            <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur aucibus, suscipit ac mi.</p>
                            <a href="single-blog.php">READ ARTICLE</a>
                        </div>
                    </div>

                    <div class="col-xl-6 ms-auto">
                        <div class="outbox">
                            <img src="assets/materials/world.png">
                            <div class="description row align-items-xl-between align-content-xl-between h">
                                <div class="date d-xl-block d-none">
                                    <a><span>22.03.22</span><img src="assets/materials/calendar.svg"></a>
                                </div>
                                <div class="title">
                                    <div class="post-tag-w">SECURITY</div>
                                    <a href="single-blog.php">
                                        <h1>Where is 5g <br /> technology used?</h1>
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
                                        <div class="post-tag">BLOG</div>
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

        <div class="index-sec-3">
            <div class="container-fluid col-xl-10">
                <div class="row">
                    <div class="col-xl-6 text-xl-start text-center">
                        <h1>Refine is Lanner’s Authorized Distributor In <br /> The Middle East, Türkiye And Pakistan.</h1>
                    </div>
                    <div class="col-xl-6 my-xl-auto mt-3 ms-auto text-xl-end text-center">
                        <a target="blank_" href="https://www.lannerinc.com/"><img src="assets/materials/path74.png"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Fast Contact Nav -->
        <div class="mini-nav d-flex justify-content-center d-xl-none">
            <div class="position-relative d-flex">
                <a href="tel:+90 850 433 87 60" class="btn-white text-center mx-auto"><img src="assets/materials/phone.svg" width="20px" class="me-2">Call Us</a>
                <div class="seperator mx-auto"></div>
                <a href="#" class="btn-white text-center mx-auto"><img src="assets/materials/handshake.svg" width="26px" class="me-2">Be Reseller</a>
            </div>
        </div>
        <!-- Mobile Fast Contact Nav -->


        <!-- Login Area -->
        <div class="container-fluid logMe">
            <div class="row">
                <button class="closer" onclick="closeLogin()"><img src="assets/materials/x.svg"></button>
                <div class="col-xl-5">
                    <div class="outflow d-flex align-content-center align-items-center justify-content-center">
                        <div class="leftSide p-0 text-center row align-content-xl-between align-items-xl-between align-items-center align-content-center">
                            <div>
                                <img src="assets/materials/logo.svg" width="100px">
                            </div>
                            <div class="social d-xl-flex d-none justify-content-center">
                                <a href="https://www.linkedin.com/company/refineinc/" class="me-3">
                                    <div class="sBox"><img src="assets/materials/linked-in.svg"></div>
                                </a>
                                <a href="#" class="me-3">
                                    <div class="sBox"><img src="assets/materials/insta.svg"></div>
                                </a>
                                <a href="#">
                                    <div class="sBox"><img src="assets/materials/youtube.svg"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 p-0">
                    <div class="outflow-half text-center d-flex align-content-center align-items-center justify-content-center">
                        <div class="rightSide">
                            <h1 class="mb-5 pb-xl-5">Reseller Login</h1>
                            <form class="form mt-5" action="account.html">
                                <div class="form-group">
                                    <input type="text" placeholder="E-Mail"><img src="assets/materials/env-mail.svg">
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" placeholder="Password"><img src="assets/materials/env-pw.svg">
                                </div>
                                <div class="form-group buttonArea mt-3 d-flex justify-content-between align-content-center align-items-center">
                                    <button type="submit" class="text-start ps-3">LOGIN</button>
                                    <div class="prefix"><img src="assets/materials/arrow-right.svg"></div>
                                </div>
                                <div class="form-group mt-3 mx-auto d-flex justify-content-center">
                                    <a href="#">Register Now</a>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Login Area -->

        <!--Push Button-->
        <a target="blank_" href="https://api.whatsapp.com/send?phone=+905000000000&text=Merhabalar, Refine Inc. ayrıcalıklarından yararlanmak istiyorum." class="pusher d-xl-flex d-none">
            <img src="assets/materials/chat.svg">
        </a>
        <!--Push Button-->
    </main>

    <?php include 'php/footer.php' ?>

</body>

</html>