<?php

include 'database/connection.php';

$lorem = 'Lorem ipsum';

if (isset($_GET["product"])) {
    $product = $_GET["product"];

    $sorgu = $vt->prepare("SELECT * FROM curunler WHERE page_url = '$product' AND igenel_bakis NOT LIKE '%$lorem%'  AND sort <> -1 AND page_description <> 'test' AND user <> 'root' AND language = '0' GROUP BY page_url");
    $sorgu->execute();
    $productItem = $sorgu->fetchAll(PDO::FETCH_OBJ);

    $prodCategory = $productItem[0]->ikategori;

    $sorgu = $vt->prepare("SELECT * FROM curunler WHERE ikategori = '$prodCategory' AND igenel_bakis NOT LIKE '%$lorem%'  AND sort <> -1 AND page_description <> 'test' AND user <> 'root' AND language = '0' GROUP BY page_url");
    $sorgu->execute();
    $relatedProductList = $sorgu->fetchAll(PDO::FETCH_OBJ);
} else {
    //* kategoriye geri atıcak 
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
                            <a>Products</a><a href="#">Network Appliances</a><a><?= $productItem[0]->iname ?></a>
                        </div>
                        <div class="title">
                            <h1 data-aos="fade-right"><?= $productItem[0]->iname ?></h1>
                            <p data-aos="fade-right"><?= $productItem[0]->ikisa_aciklama ?></p>
                            <!-- <div class="datasheets d-md-flex col-xl-8" data-aos="fade-up">
                                <a href="assets/materials/sample.pdf" class="btn-data-w lightbox" aria-haspopup="dialog" title="Sample.pdf">Datasheet <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>

                                <a href="assets/materials/sample.pdf" class="btn-data-w lightbox" aria-haspopup="dialog" title="Sample.pdf">User Manual <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
                        <img src="https://projects.fikirbuzzprojects.com/refine/img/i/products/<?= $productItem[0]->iresim ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec-1 pb-0">
            <div class="container-fluid col-xl-9">
                <div class="textArea row pb-5">
                    <div class="mb-5 col-xl-6 kf">
                        <h1><img src="assets/materials/kf-ico.svg" class="me-4">Key Features</h1>
                        <?= $productItem[0]->iana_ozellikler ?></p>
                    </div>
                    <div class="mb-5 col-xl-5 ms-auto ov">
                        <h1>Overview</h1>
                        <div class="bg-white">
                            <p id="limiter" class="p-5">
                                <?= $productItem[0]->igenel_bakis ?></p>
                        </div>
                    </div>

                    <div class="featured-device bg-transparent">
                        <div class="col-xl-12 my-auto mx-auto pt-5 pb-5">
                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Platform
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>CPU</h5>
                                                <h5>Chipset</h5>
                                                <h5>BIOS</h5>
                                                <h5>Memory Technology</h5>
                                                <h5>Memory Capacity</h5>
                                                <h5>Memory Socket</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->icpu != "") echo $productItem[0]->icpu;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ichipset != "") echo $productItem[0]->ichipset;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ibios != "") echo $productItem[0]->ibios;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->imemory_technology != "") echo $productItem[0]->imemory_technology;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->imemory_capacity != "") echo $productItem[0]->imemory_capacity;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->imemory_socket != "") echo $productItem[0]->imemory_socket;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Storage
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>SATA Storage</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->isata_storage != "") echo $productItem[0]->isata_storage;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            I/O
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>Max LAN</h5>
                                                <h5>Bypass</h5>
                                                <h5>Console</h5>
                                                <h5>Display Output</h5>
                                                <h5>USB 3.0</h5>
                                                <h5>TPM</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->imax_lan != "") echo $productItem[0]->imax_lan;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ibypass != "") echo $productItem[0]->ibypass;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iconsole != "") echo $productItem[0]->iconsole;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->idisplay_output != "") echo $productItem[0]->idisplay_output;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iusb_3_0 != "") echo $productItem[0]->iusb_3_0;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5> <?php
                                                        if ($productItem[0]->itpm != "") echo $productItem[0]->itpm;
                                                        else echo '-';
                                                        ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Power and Mechanical
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>Power input</h5>
                                                <h5>Type/Watt</h5>
                                                <h5>Expansion</h5>
                                                <h5>Reset</h5>
                                                <h5>System cooling</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ipower_input != "") echo $productItem[0]->ipower_input;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->itype_watt != "") echo $productItem[0]->itype_watt;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iexpansion != "") echo $productItem[0]->iexpansion;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ireset != "") echo $productItem[0]->ireset;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->isystem_cooling != "") echo $productItem[0]->isystem_cooling;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            OS and Certifications
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>Certifications</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->icertifications != "") echo $productItem[0]->icertifications;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Physical and Environmental
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                                        <div class="accordion-body d-flex justify-content-between">
                                            <div class="col-xl-4">
                                                <h5>Storage temperature</h5>
                                                <h5>Operating temperature</h5>
                                                <h5>Operating humidity</h5>
                                                <h5>Dimensions (W x H x D)</h5>
                                                <h5>Weight</h5>
                                                <h5>Watchdog</h5>
                                                <h5>Internal RTC</h5>
                                            </div>
                                            <div class="col-xl-8 ms-auto text-end">
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->istorage_temperature != "") echo $productItem[0]->istorage_temperature;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ioperating_temperature != "") echo $productItem[0]->ioperating_temperature;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->ioperating_humidity != "") echo $productItem[0]->ioperating_humidity;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->idimensions_w_x_h_x_d_ != "") echo $productItem[0]->idimensions_w_x_h_x_d_;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iweight != "") echo $productItem[0]->iweight;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iwatchdog != "") echo $productItem[0]->iwatchdog;
                                                    else echo '-';
                                                    ?></h5>
                                                <h5>
                                                    <?php
                                                    if ($productItem[0]->iinternal_rtc != "") echo $productItem[0]->iinternal_rtc;
                                                    else echo '-';
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="index-sec-1 with-pattern">
            <div class="container-fluid col-xl-9">
                <div class="row clearfix">
                    <div class="col-xl-12 ms-auto text-end title">
                        <h1>Related Products <img class="ms-2" src="assets/materials/smb.svg"></h1>
                    </div>
                    <?php
                    foreach ($relatedProductList as $relatedProd) { ?>
                        <div class="col-xl-3 col-lg-4 mt-5 inp">
                            <div class="full-box">
                                <div class="outbox">
                                    <img src="assets/materials/network-device.png">
                                </div>
                                <div class="description">
                                    <h1><?= $relatedProd->iname ?></h1>
                                    <p><?= $relatedProd->ikisa_aciklama ?></p>
                                </div>
                                <a href="prod-in.php?product=<?= $relatedProd->page_url ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                                    MORE
                                    <hr />
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>



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

    <?php include 'php/footer.php' ?>
</body>

</html>