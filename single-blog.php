<?php
require "database/connection.php";

if (isset($_GET["url"])) {
  $url = $_GET["url"];

  $query = $vt->prepare("SELECT * FROM blog WHERE url= '$url'");
  $query->execute();
  $blogResult = $query->fetchAll(PDO::FETCH_OBJ);
} else {
  header("Location: blog-page.php");
}


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
        <div class="row align-content-center align-items-center">
          <div class="col-xl-7">
            <div class="breadcrumb" data-aos="fade-in">
              <a href="index.php">Home</a><a href="#" disabled><?= $blogResult[0]->title ?></a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1><?= $blogResult[0]->title ?></h1>
              <p><?= $blogResult[0]->short_content ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea row pb-5">
          <h1 class="mb-5"><?= $blogResult[0]->title ?></h1>
          <div class="col-xl-1 d-xl-block d-none">
            <hr>
          </div>
          <div class="col-xl-11 ms-auto pb-3">
            <?= $blogResult[0]->content ?>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="index-sec-2 pb-0 featured-device bg-white">
      <div class="container-fluid">
        <div class="row pb-5">
          <div class="col-xl-4 deviceArea p-0">
            <div class="featured-list">
              <div class="outbox text-center">
                <div class="incontent">
                  <h2>Featured Product</h2>
                  <h3>NCA-1210</h3>
                  <img src="assets/materials/featured-device.png">
                </div>
              </div>

              <div class="outbox reset mx-auto pt-5">
                <div class="incontent">
                  <div class="description">
                    <h5>Overview</h5>
                    <p>Cloud computing eliminates the capital cost of purchasing hardware and software, and setting up and
                      operating data centers on-site.</p>
                  </div>

                </div>
              </div>
            </div>

            <div class="featured-list">
              <div class="outbox text-center">
                <div class="incontent">
                  <h2>Featured Product</h2>
                  <h3>NCA-1211</h3>
                  <img src="assets/materials/featured-device.png">
                </div>
              </div>

              <div class="outbox reset mx-auto pt-5">
                <div class="incontent">
                  <div class="description">
                    <h5>Overview</h5>
                    <p>Cloud computing eliminates the capital cost of purchasing hardware and software, and setting up and
                      operating data centers on-site.</p>
                  </div>

                </div>
              </div>
            </div>

            <div class="featured-list">
              <div class="outbox text-center">
                <div class="incontent">
                  <h2>Featured Product</h2>
                  <h3>NCA-1212</h3>
                  <img src="assets/materials/featured-device.png">
                </div>
              </div>

              <div class="outbox reset mx-auto pt-5">
                <div class="incontent">
                  <div class="description">
                    <h5>Overview</h5>
                    <p>Cloud computing eliminates the capital cost of purchasing hardware and software, and setting up and
                      operating data centers on-site.</p>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="contentArea col-xl-6 mx-auto">
            <div class="col-xl-10 my-auto mx-auto pt-5 pb-5 p-1">
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
                        <h5>Intel® Atom™ processor C2308/C2508 (Codenamed “Rangeley”)</h5>
                        <h5>SoC</h5>
                        <h5>AMI SPI Flash BIOS</h5>
                        <h5>Single Channel DDR3 1333 MHz, 1.5 V, ECC</h5>
                        <h5>8 GB</h5>
                        <h5>1 x 204-pin SODIMM</h5>
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
                        <h5>1x 2.5” Bay - SSD Only (Optional)</h5>
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
                        <h5>6x GbE RJ45 Intel® i211 (By SKU)</h5>
                        <h5>2x Pairs of Gen 3 (By SKU)</h5>
                        <h5>1 x RJ45</h5>
                        <h5>HDMI port x 1</h5>
                        <h5>2 x Type A</h5>
                        <h5>Yes</h5>
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
                        <h5>1 x DC Jack</h5>
                        <h5>12V 3A 36W Power Adapter</h5>
                        <h5>1x Mini-PCIe (with PCIe/USB Signal)</h5>
                        <h5>1 * Reset Button</h5>
                        <h5>Fanless, 1x Cooling Fan (By Configuration)</h5>
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
                        <h5>RoHS</h5>
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
                        <h5>-20°C to 70°C</h5>
                        <h5>0°C to 40°C</h5>
                        <h5>5% to 95% (non-condensing)</h5>
                        <h5>230 mm x 44 mm x 170 mm (9.06" x 1.73" x 6.69")</h5>
                        <h5>1.2 kg (2.64 lbs)</h5>
                        <h5>Yes</h5>
                        <h5>Yes</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-10 my-auto mx-auto pt-5 pb-5 p-1">
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
                        <h5>SEC 2</h5>
                        <h5>SoC</h5>
                        <h5>AMI SPI Flash BIOS</h5>
                        <h5>Single Channel DDR3 1333 MHz, 1.5 V, ECC</h5>
                        <h5>8 GB</h5>
                        <h5>1 x 204-pin SODIMM</h5>
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
                        <h5>1x 2.5” Bay - SSD Only (Optional)</h5>
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
                        <h5>6x GbE RJ45 Intel® i211 (By SKU)</h5>
                        <h5>2x Pairs of Gen 3 (By SKU)</h5>
                        <h5>1 x RJ45</h5>
                        <h5>HDMI port x 1</h5>
                        <h5>2 x Type A</h5>
                        <h5>Yes</h5>
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
                        <h5>1 x DC Jack</h5>
                        <h5>12V 3A 36W Power Adapter</h5>
                        <h5>1x Mini-PCIe (with PCIe/USB Signal)</h5>
                        <h5>1 * Reset Button</h5>
                        <h5>Fanless, 1x Cooling Fan (By Configuration)</h5>
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
                        <h5>RoHS</h5>
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
                        <h5>-20°C to 70°C</h5>
                        <h5>0°C to 40°C</h5>
                        <h5>5% to 95% (non-condensing)</h5>
                        <h5>230 mm x 44 mm x 170 mm (9.06" x 1.73" x 6.69")</h5>
                        <h5>1.2 kg (2.64 lbs)</h5>
                        <h5>Yes</h5>
                        <h5>Yes</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->

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
      const url = urlParams.get('url')

      setInterval(function() {
        interval++;
        postFunction();
      }, 25000);

      function postFunction() {
        if (interval == 1) {
          $.ajax({
            url: "php/update-blog-click-count.php",
            type: "POST",
            dataType: "json",
            data: {
              click_count: "plus",
              url: url
            },
            success: function() {}
          });
          console.log(interval);
        }
      }

    });
  </script>

</body>

</html>