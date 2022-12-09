<?php
require "database/connection.php";

if ($_GET["mcid"]) {
    $mcid = $_GET["mcid"];
    $query = $vt->prepare("SELECT * FROM sub_category WHERE category_id = '$mcid'");
    $query->execute();
    $subCategoryListLanner = $query->fetchAll(PDO::FETCH_OBJ);
}


$query = $vt->prepare("SELECT * FROM category WHERE id='$mcid'");
$query->execute();
$mainCategoryResultLanner = $query->fetchAll(PDO::FETCH_OBJ);



?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

    <?php include 'php/header.php' ?>

    <main>
        <div class="banner dark">
            <div class="image-area">
                <img class="bannerImg" src="assets/materials/single-cover.png">
            </div>
            <div class="container-fluid col-xl-10">
                <div class="row align-content-center align-items-center" style="min-height: 300px !important;">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="#">Products</a><a href="#">Category</a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1><?= $mainCategoryResultLanner[0]->name ?></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec-1" style="padding-top: 0 !important;">
            <div class="container-fluid col-xl-10">
                <div class="row list-product clearfix">

                    <?php
                    foreach ($subCategoryListLanner as $singleSubCat) { ?>
                        <div class="col-xl-4 col-lg-4 mt-5 inp">
                            <div class="full-box">
                                <div class="outbox">

                                    <img src="<?= $singleSubCat->image ?>">
                                </div>
                                <div class="description">
                                    <h1><?= $singleSubCat->name ?></h1>
                                    <p><?= $singleSubCat->description ?></p>
                                </div>
                                <a href="prod-list.php?cid=<?= $singleSubCat->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                                    MORE
                                    <hr />
                                </a>
                            </div>
                        </div>
                    <?php   }
                    ?>



                </div>
            </div>
        </div>



        <div class="index-sec-3">
            <div class="container-fluid col-xl-10">
                <div class="row">
                    <div class="col-xl-6 text-xl-start text-center">
                        <h1>Refine is Lanner’s Authorized Distributor In <br />
                            The Middle East, Türkiye And Pakistan.</h1>
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


        <!--Push Button-->
        <a target="blank_" href="https://api.whatsapp.com/send?phone=+905000000000&text=Merhabalar, Refine Inc. ayrıcalıklarından yararlanmak istiyorum." class="pusher d-xl-flex d-none">
            <img src="assets/materials/chat.svg">
        </a>
        <!--Push Button-->
    </main>

    <?php include 'php/footer.php' ?>

</body>

</html>