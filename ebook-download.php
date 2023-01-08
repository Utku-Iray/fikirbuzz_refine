<?php require "database/connection.php";
include "config.php"; ?>
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
                            <a href="#"><?php echo $lang['ebookBannerShortOne'] ?></a><a href="#"><?php echo $lang['ebookBannerShortTwo'] ?></a>
                        </div>
                        <div class="title">
                            <h1 data-aos="fade-right"><?php echo $lang['ebookBannerTitle'] ?></h1>
                            <p data-aos="fade-right"><?php echo $lang['ebookBannerTitleShort'] ?></p>
                            <div class="datasheets d-md-flex col-xl-8" data-aos="fade-up">
                                <a href="assets/pdf/IOT_brochure.pdf" class="btn-data-w lightbox" style="padding: 1.40em 0.5em 1.40em 0.5em !important;" aria-haspopup="dialog" title="Download.pdf"><?php echo $lang['ebookPdfIntelligent'] ?>
                                    <img class="ms-1" width="15px" src="assets/materials/pdf.svg"></span></a>

                                <a href="assets/pdf/NC_brochure.pdf" class="btn-data-w lightbox" style="padding: 1.40em 0.5em 1.40em 0.5em !important;" aria-haspopup="dialog" title="Download.pdf"><?php echo $lang['ebookPdfNetwork'] ?>
                                    <img class="ms-1" width="15px" src="assets/materials/pdf.svg"></span></a>
                            </div>
                            <div class="datasheets d-md-flex col-xl-8" data-aos="fade-up">
                                <a href="assets/pdf/brochure_2022.pdf" class="btn-data-w lightbox" style="padding:1.40em 0.5em 1.40em 0.5em !important;" aria-haspopup="dialog" title="Download.pdf"><?php echo $lang['ebookPdfTelecom'] ?>
                                    <img class="ms-1" width="15px" src="assets/materials/pdf.svg"></span></a>

                                <a href="assets/pdf/uCPE_brochure_2022-1109.pdf" class="btn-data-w lightbox" style="padding: 1.40em 0.5em 1.40em 0.5em !important;" aria-haspopup="dialog" title="Download.pdf"><?php echo $lang['ebookPdfUcpe'] ?>
                                    <img class="ms-1" width="15px" src="assets/materials/pdf.svg"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
                        <img src="assets/materials/pdf-fikirbuz.png" width="200px" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>








        <?php include 'php/footer.php' ?>
</body>

</html>