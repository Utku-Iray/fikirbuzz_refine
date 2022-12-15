<?php
require "database/connection.php";
$query = $vt->prepare("SELECT * FROM general WHERE g_page_url='about-us'");
$query->execute();
$aboutResult = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

  <?php include 'php/header.php' ?>



  <main>
    <div class="banner dark">
      <div class="image-area">
        <img class="bannerImg" src="assets/materials/about-cover.png">
      </div>
      <div class="container-fluid col-xl-10">
        <div class="row align-content-center align-items-center">
          <div class="col-xl-7">
            <div class="breadcrumb" data-aos="fade-in">
              <a href="index.php">Home</a><a href="#">Network Appliances</a>
            </div>
            <div class="title">
              <h1 data-aos="fade-right">About Us</h1>
              <p data-aos="fade-in">Refine is a customer oriented company focusing on customer collaboration. We believe that your success is ours.Our professional sales team works hand in hand with Lanner ensuring the best solution to your requirements.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea row pb-5">
          <div class="col-md-12">
            <?= $aboutResult[0]->g_main_content_en ?>
          </div>
        </div>
      </div>

      <div class="promote" data-aos="fade-up">
        <div class="col-xl-11 ms-auto">
          <div class="row">
            <div class="col-xl-6 sr-img ms-auto order-xl-1 order-12">
              <img src="assets/materials/about-rubic.png">
            </div>
            <div class="col-xl-5 p-xl-0 p-5">
              <div class="outbox">
                <div class="title d-flex align-content-center align-items-center">
                  <img src="assets/materials/network-ico.svg">
                  <h1 class="my-auto ms-3 abs-low">Network Security</h1>
                  <h1 class="my-auto ms-3">Network Security</h1>
                </div>
                <div class="description mt-4">
                  <p>Lanner Electronics Inc. is one of the world-leading suppliers in designing, engineering and
                    manufacturing advanced network appliances, embedded computers, virtual platforms and rugged
                    industrial
                    hardware.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5">
          <div class="row clearfix slick-promote">
            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/firewall.png">
                </div>
                <div class="description">
                  <h1>FIREWALLS</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/UTM.png">
                </div>
                <div class="description">
                  <h1>UTM</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/ADC.png">
                </div>
                <div class="description">
                  <h1>ADC</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/wan.png">
                </div>
                <div class="description">
                  <h1>WAN</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="promote reverse">
        <div class="col-xl-11 me-auto">
          <div class="row">

            <div class="col-xl-6 sr-img me-auto">
              <img src="assets/materials/sec-2-bg.jpg">
            </div>

            <div class="col-xl-5 p-xl-0 p-5">
              <div class="outbox">
                <div class="title d-flex align-content-center align-items-center justify-content-xl-end text-xl-end">
                  <img src="assets/materials/virtualizastion.svg">
                  <h1 class="my-auto ms-3 abs-low">Virtualization Computing</h1>
                  <h1 class="my-auto ms-3">Virtualization Computing</h1>
                </div>
                <div class="description mt-4 text-xl-end">
                  <p>Lanner Electronics Inc. is one of the world-leading suppliers in designing, engineering and
                    manufacturing advanced network appliances, embedded computers, virtual platforms and rugged
                    industrial
                    hardware.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5">
          <div class="row clearfix slick-promote">
            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/sd-wan.png">
                </div>
                <div class="description">
                  <h1>SD-WAN</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/sd-security.png">
                </div>
                <div class="description">
                  <h1>SD-SECURITY</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/MEC.png">
                </div>
                <div class="description">
                  <h1>MEC</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/cloud-ran.png">
                </div>
                <div class="description">
                  <h1>CLOUD RAN</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/sd-wan.png">
                </div>
                <div class="description">
                  <h1>SD-WAN</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/sd-security.png">
                </div>
                <div class="description">
                  <h1>SD-SECURITY</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/MEC.png">
                </div>
                <div class="description">
                  <h1>MEC</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/cloud-ran.png">
                </div>
                <div class="description">
                  <h1>CLOUD RAN</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="promote">
        <div class="col-xl-11 ms-auto">
          <div class="row">
            <div class="col-xl-6 sr-img ms-auto order-xl-1 order-12">
              <img src="assets/materials/sec-3-bg.jpg">
            </div>
            <div class="col-xl-5 p-xl-0 p-5">
              <div class="outbox">
                <div class="title d-flex align-content-center align-items-center">
                  <img src="assets/materials/network-ico.svg">
                  <h1 class="my-auto ms-3 abs-low">Industrial Computing</h1>
                  <h1 class="my-auto ms-3">Industrial Computing</h1>
                </div>
                <div class="description mt-4">
                  <p>Lanner Electronics Inc. is one of the world-leading suppliers in designing, engineering and
                    manufacturing advanced network appliances, embedded computers, virtual platforms and rugged
                    industrial hardware.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5">
          <div class="row clearfix slick-promote">
            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/firewall.png">
                </div>
                <div class="description">
                  <h1>MACHINE VISION</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/UTM.png">
                </div>
                <div class="description">
                  <h1>SURVEILLANCE</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/ADC.png">
                </div>
                <div class="description">
                  <h1>INTELLIGENT
                    TRANSPORTATION</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-5 inp-short">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/wan.png">
                </div>
                <div class="description">
                  <h1>INDUSTRIAL
                    CYBER SECURITY</h1>
                </div>
                <a href="prod-list.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                  MORE
                  <hr />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   

  <?php include 'php/footer.php' ?>

</body>

</html>