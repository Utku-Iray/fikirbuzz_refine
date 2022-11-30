<?php
include 'database/connection.php';


$lorem = 'Lorem ipsum';

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $sorgu = $vt->prepare("SELECT * FROM curunler WHERE ikategori = '$cid' AND igenel_bakis NOT LIKE '%$lorem%'  AND sort <> -1 AND page_description <> 'test'  AND language = '0' GROUP BY page_url");
    $sorgu->execute();
    $productItems = $sorgu->fetchAll(PDO::FETCH_OBJ);

    $sorgu = $vt->prepare("SELECT * FROM ckategoriler WHERE cid = '$cid'  AND sort <> -1 AND page_description <> 'test'  AND language = '0' GROUP BY page_url");
    $sorgu->execute();
    $category = $sorgu->fetchAll(PDO::FETCH_OBJ);
}



?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>

<body>

    <?php include 'php/header.php' ?>

    <main>
        <div class="banner">
            <div class="image-area">
                <img class="bannerImg" src="assets/materials/world.png">
            </div>
            <div class="container-fluid col-xl-10">
                <div class="row align-content-center align-items-center">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="#">Products</a><a><?= $category[0]->iname ?></a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1><?= $category[0]->iname ?></h1>
                            <p>
                                <?= $category[0]->iaciklama ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
                        <img src="assets/materials/prod.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec-1">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix">

                    <?php foreach ($productItems as $prodItem) { ?>
                        <div class="col-xl-3 col-lg-4 mt-5 inp">
                            <div class="full-box">
                                <div class="outbox">
                                    <a href="#">
                                    </a>
                                    <img src="assets/materials/network-device.png">
                                </div>
                                <div class="description">
                                    <h1><?= $prodItem->iname ?></h1>
                                    <p><?= $prodItem->ikisa_aciklama ?></p>
                                </div>
                                <a href="prod-in.php?product=<?= $prodItem->page_url ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                                    MORE
                                    <hr />
                                </a>
                            </div>
                        </div>
                    <?php  } ?>

                    <button class="load-more__btn mt-5 mb-5">SEE MORE<br /><img src="assets/materials/downron.svg"></button>
                </div>
            </div>
        </div>

        <!-- <div class="index-sec-2 related">
            <div class="container-fluid col-xl-10 pt-5">
                <div class="row">
                    <div class="col-xl-12 text-center seperator">
                        <h1 class="mb-4">Most Popular Products</h1>
                        <hr>
                    </div>
                    <ul class="newSlider clearfix mt-5">
                        <div class="row justify-content-between pid-1 d-flex">
                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.php">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-1.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.php">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-2.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac fsdfsdfsdffffdsfsdfdsfdsfsdfds.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.php">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-3.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.php">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-4.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div> -->

        <div class="index-sec-3">
            <div class="container-fluid col-xl-10">
                <div class="row">
                    <div class="col-xl-6 text-xl-start text-center">
                        <h1>Refine is Lanner’s Authorized Distributor In <br /> The Middle East, Turkey And Pakistan.</h1>
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

    <footer>
        <div class="col-xl-12 d-flex mainBlur">
            <div class="col-xl-4 half-drop"></div>
            <div class="col-xl-8 full-drop ms-auto"></div>
        </div>
        <div class="container-fluid col-xl-10 drop">
            <div class="row pt-5 pb-5">
                <div class="col-xl-4 text-center text-xl-start mb-5">
                    <h4 class="mb-5 ms-xl-5 ps-xl-1"><img class="me-4" src="assets/materials/post-ico.svg">How Can We Help?</h4>
                    <div class="mini-box d-flex justify-content-center justify-content-xl-start mt-3">
                        <a href="single-page.html">
                            <div class="text-center mb me-3">
                                <div class="incontent">
                                    <img src="assets/materials/info.svg">
                                    <p class="mt-3">How to buy!</p>
                                </div>
                            </div>
                        </a>
                        <a href="single-page.html">
                            <div class="text-center mb">
                                <div class="incontent">
                                    <img src="assets/materials/product-ico.svg">
                                    <p class="mt-3">Product Support</p>
                                </div>
                            </div>
                    </div>
                    </a>
                    <div class="mini-box d-flex justify-content-center justify-content-xl-start mt-3">
                        <a href="mailto:info@refine-tr.com">
                            <div class="text-center mb me-3">
                                <div class="incontent">
                                    <img src="assets/materials/mail.svg">
                                    <p class="mt-3">E-Mail Sales</p>
                                </div>
                            </div>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=+905000000000&text=Merhabalar,%20Refine%20Inc.%20ayr%C4%B1cal%C4%B1klar%C4%B1ndan%20yararlanmak%20istiyorum.">
                            <div class="text-center mb">
                                <div class="incontent">
                                    <img src="assets/materials/chat.svg">
                                    <p class="mt-3">Chat with Sales </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-1 d-xl-auto d-none"></div>
                <div class="col-xl-7 row p-xl-0 mx-auto ms-xl-auto mx-xl-0 my-auto">
                    <div class="col-xl-4 mb-5 text-center text-xl-start">
                        <h4 class="mb-3 d-xl-flex"><span class="order-1">Menu</span>
                            <hr class="mx-xl-2 mx-auto" />
                        </h4>
                        <a href="about-us.html">
                            <p>About Us</p>
                        </a>
                        <a href="prod-list.html">
                            <p>Products</p>
                        </a>
                        <a href="single-page.html">
                            <p>PCB Design & Manufacturing</p>
                        </a>
                        <a href="blog-page.html">
                            <p>Blog</p>
                        </a>
                        <a href="contact.html">
                            <p>Contact Us</p>
                        </a>
                    </div>

                    <div class="col-xl-1 mb-5"></div>

                    <div class="col-xl-7 mb-5 text-center text-xl-start">
                        <h4 class="mb-3 d-xl-flex"><span class="order-1">Contact</span>
                            <hr class="mx-xl-2 mx-auto" />
                        </h4>
                        <a target="blank_" href="https://g.page/refine-tr?share">
                            <p>HQ: Kasap Sok. Gamze Apt. No:19/1 34394 Esentepe, Şişli, İstanbul, Türkiye</p>
                        </a>
                        <a href="#" target="blank_">
                            <p>Warehouse I: Room 1202, 12/F Global Gateway (Tsuen Wan), 168 Yeung Uk Road, Tsuen Wan, Hong Kong</p>
                        </a>
                        <a href="#" target="blank_">
                            <p>Warehouse II: No. 121 Tai Tao Tsuen Hung Shui Kiu Yuen Long, Hong Kong</p>
                        </a>
                        <div class="numberArea d-flex mt-5">
                            <a href="tel:+90 850 433 87 60" class="d-flex justify-content-center justify-content-xl-start me-3 mb-2"><img src="assets/materials/phone.svg" width="24px">
                                <p>+90 850 433 87 60</p>
                            </a>
                            <a href="mailto:info@refine-tr.com" class="d-flex justify-content-center justify-content-xl-start me-2 mb-2"><img src="assets/materials/mail.svg" width="24px">
                                <p>info@refine-tr.com</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 mt-auto text-center text-xl-start">
                        <h4>Subscribe Newsletter</h4>
                        <form class="form mt-4">
                            <div class="form-group">
                                <input type="text" placeholder="Your E-Mail Address">
                                <button type="submit"><img src="assets/materials/send-icon.svg" alt=""></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-6 mt-auto ms-xl-auto mx-auto text-xl-end text-center">
                        <div class="social d-flex justify-content-xl-end justify-content-center mt-4 mt-xl-auto">
                            <a href="https://www.linkedin.com/company/refineinc/" target="blank_" class="me-3">
                                <div class="sBox"><img src="assets/materials/linked-in.svg"></div>
                            </a>
                            <a href="#" target="blank_" class="me-3">
                                <div class="sBox"><img src="assets/materials/insta.svg"></div>
                            </a>
                            <a href="https://www.youtube.com/channel/UCkyVtjw77RO3C6qRN1uDDXg" target="blank_">
                                <div class="sBox"><img src="assets/materials/youtube.svg"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid col-xl-10 subFooter">
            <div class="row">
                <div class="col-xl-6 text-xl-start text-center">
                    <p>© Copyright <span id="year"></span> Refine Inc.</p>
                </div>
                <div class="col-xl-6 ms-auto text-xl-end text-center">
                    <a href="single-page.html">Privacy</a>
                    <a href="single-page.html">Terms of Use</a>
                    <a href="single-page.html">Sitemap</a>
                </div>
            </div>
        </div>

        <video playsinline autoplay muted loop poster="assets/materials/footer-bg.png" class="d-xl-block d-none">
            <source src="assets/materials/footer-bg.webm" type="video/mp4">
        </video>
    </footer>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/topbox.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>