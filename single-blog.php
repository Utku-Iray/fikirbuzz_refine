<?php include 'database/connection.php';

if (isset($_GET["name"])) {
  $name = $_GET["name"];

  $sorgu = $vt->prepare("SELECT * FROM cblog WHERE page_url LIKE '%$name%'  AND (sort <> -1) AND (page_description <> 'test')");
  $sorgu->execute();
  $blog = $sorgu->fetchAll(PDO::FETCH_OBJ);
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
              <a href="index.php">Home</a><a href="blog-page.php">Blog</a><a><?= $blog[0]->iname ?></a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1><?= $blog[0]->iname ?></h1>
              <p><?= $blog[0]->ikisa_icerik ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea row pb-5">
          <h1 class="mb-5"><?= $blog[0]->iname ?></h1>
          <div class="col-xl-1 d-xl-block d-none">
            <hr>
          </div>
          <div class="col-xl-11 ms-auto pb-3">
            <?= $blog[0]->iicerik ?>
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
              The Middle East, Turkey And Pakistan.</h1>
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
            <a href="single-page.php">
              <div class="text-center mb me-3">
                <div class="incontent">
                  <img src="assets/materials/info.svg">
                  <p class="mt-3">How to buy!</p>
                </div>
              </div>
            </a>
            <a href="single-page.php">
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
            <a href="about-us.php">
              <p>About Us</p>
            </a>
            <a href="prod-list.php">
              <p>Products</p>
            </a>
            <a href="single-page.php">
              <p>PCB Design & Manufacturing</p>
            </a>
            <a href="blog-page.php">
              <p>Blog</p>
            </a>
            <a href="contact.php">
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
          <a href="single-page.php">Privacy</a>
          <a href="single-page.php">Terms of Use</a>
          <a href="single-page.php">Sitemap</a>
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