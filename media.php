<?php
require "database/connection.php";
include "config.php";
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>

<body dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>">
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
                            <a href="#"><?php echo $lang['mediaBannerShortOne'] ?></a><a href="#"><?php echo $lang['mediaBannerShortTwo'] ?></a>
                        </div>
                        <div class="title">
                            <h1 data-aos="fade-right"><?php echo $lang['mediaBanner'] ?></h1>
                            <p data-aos="fade-right"><?php echo $lang['mediaBannerContent'] ?></p>
                            <div class="datasheets d-md-flex col-xl-8" data-aos="fade-up">
                                <a href="assets/materials/medya-kit/medya-kit.pdf" class="btn-data-w lightbox" aria-haspopup="dialog" title="Download.pdf"><?php echo $lang['mediaBannerPdf'] ?>
                                    <img class="ms-1" width="15px" src="assets/materials/pdf.svg"></span></a>


                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
                        <img style="width:200px !important ;" src="assets/materials/pdf-fikirbuz.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>


        <div class="index-sec-1">
            <div class="container-fluid">
                <div class="row youtube-embed">
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/o5dKGpdlanI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/ZVpEb0rHH3o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/QHoVpa4Qkfs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/7IzNFsA34uc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/GOgeYNdqna0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/td0ndCnTUCM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/dLGJ5D9ojNY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/jpEoAr090qs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/_Op3JYn5TR8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/rofnxzQ6EnI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/Qj4tXaCfoEk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="col-md-4"><iframe width="100%" height="315" src="https://www.youtube.com/embed/gsGERiohpHM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>

        <?php include 'php/footer.php' ?>
</body>

</html>