<?php require "database/connection.php";

if (isset($_GET["pid"])) {
  $pid = $_GET["pid"];
  $query = $vt->prepare("SELECT * FROM product WHERE id = '$pid'");
  $query->execute();
  $productVal = $query->fetchAll(PDO::FETCH_OBJ);
  
  $cid = $_GET["cid"];
  $query = $vt->prepare("SELECT * FROM product WHERE category_id = '$cid' LIMIT 4");
  $query->execute();
  $relatedProds = $query->fetchAll(PDO::FETCH_OBJ);
} else {
  header("Location: product-list.php?cid=$cid");
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
              <a href="#">Products</a><a href="#"><?= $productVal[0]->name ?></a>
            </div>
            <div class="title">
              <h1 data-aos="fade-right"><?= $productVal[0]->name ?></h1>
              <p data-aos="fade-right"><?= $productVal[0]->short_description ?></p>
              <div class="datasheets d-md-flex col-xl-8" data-aos="fade-up">
                <?php
                if ($productVal[0]->datasheet != "") { ?>
                  <a href="<?= $productVal[0]->datasheet ?>" class="btn-data-w lightbox" aria-haspopup="dialog" title="Sample.pdf">Datasheet<img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
                <?php  }
                if ($productVal[0]->user_manual != "") { ?>
                  <a href="<?= $productVal[0]->user_manual ?>" class="btn-data-w lightbox" aria-haspopup="dialog" title="Sample.pdf">User Manual <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
                <?php  }
                ?>

              </div>
            </div>
          </div>
          <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
            <img src="<?= $productVal[0]->image ?>" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea row pb-5">
          <div class="mb-5 col-xl-6 kf">
            <h1><img src="assets/materials/kf-ico.svg" class="me-4">Key Features</h1>
            <div class="mt-5">
              <?= $productVal[0]->key_features ?>
            </div>
          </div>
          <div class="mb-5 col-xl-5 ms-auto ov">
            <h1>Overview</h1>
            <div class="bg-white">
              <p id="limiter" class="p-5">
                <?= $productVal[0]->overview ?>
              </p>
            </div>
          </div>

          <div class="featured-device bg-transparent">
            <div class="col-xl-12 my-auto mx-auto pt-5 pb-5">
              <div class="accordion" id="accordionExample">

                <?php
                $specPlatformArr = json_decode($productVal[0]->spec_platform);
                if (!empty($specPlatformArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Platform
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specPlatformArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>

                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specPlatformArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php
                $specStorageArr = json_decode($productVal[0]->spec_storage);
                if (!empty($specStorageArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Storage
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specStorageArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specStorageArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>


                <?php
                $specIOArr = json_decode($productVal[0]->spec_io);
                if (!empty($specIOArr[0])) {  ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        I/O
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specIOArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specIOArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  } ?>


                <?php
                $specPamArr = json_decode($productVal[0]->spec_pam);
                if (!empty($specPamArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Power and Mechanical
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specPamArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specPamArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  } ?>


                <?php $specOacArr = json_decode($productVal[0]->spec_oac);
                if (!empty($specOacArr[0])) {  ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        OS and Certifications
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specOacArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specOacArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  } ?>


                <?php
                $specPaeArr = json_decode($productVal[0]->spec_pae);
                if (!empty($specPaeArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Physical and Environmental
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specPaeArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specPaeArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php
                $specSmArr = json_decode($productVal[0]->spec_sm);
                if (!empty($specSmArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        System Memory
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specSmArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specSmArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php
                $specNetworkArr = json_decode($productVal[0]->spec_networking);
                if (!empty($specNetworkArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Networking
                      </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specNetworkArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specNetworkArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <?php
                $specIOInterfaceArr = json_decode($productVal[0]->spec_iointerface);
                if (!empty($specIOInterfaceArr[0])) { ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        I/O Interface
                      </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          foreach ($specIOInterfaceArr[0] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          foreach ($specIOInterfaceArr[1] as $key) {
                            echo "  <h5>$key</h5>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

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

          foreach ($relatedProds as $relatedProd) { ?>
            <div class="col-xl-3 col-lg-4 mt-5 inp">
              <div class="full-box">
                <div class="outbox">
                  <img src="<?= $relatedProd->image ?>">
                </div>
                <div class="description">
                  <h1><?= $relatedProd->name ?></h1>
                  <p><?= $relatedProd->short_description ?></p>
                </div>
                <a href="prod-in.php?pid=<?= $relatedProd->id ?>&cid=<?= $cid ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
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

  <script type="text/javascript">
    $(document).ready(function() {
      var interval = 0;
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const pid = urlParams.get('pid')

      setInterval(function() {
        interval++;
        postFunction();
      }, 15000);

      function postFunction() {
        if (interval == 1) {
          $.ajax({
            url: "php/update-product-click-count.php",
            type: "POST",
            dataType: "json",
            data: {
              click_count: "plus",
              pid: pid
            },
            success: function() {}
          });
        }
      }
    });
  </script>

</body>

</html>