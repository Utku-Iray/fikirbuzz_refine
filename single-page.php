<?php
require "database/connection.php";

$query = $vt->prepare("SELECT * FROM general WHERE g_page_url='pcb-design'");
$query->execute();
$pcbDesign = $query->fetchAll(PDO::FETCH_OBJ);
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
            <div class="title" data-aos="fade-right">
              <h1>PCB Design & Manufacturing</h1>
              <p>In addition to being Lanner’s authorized distributor in the Middle East, we also offer sourcing
                services for PCB design & manufacturing.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea pb-5 row">
          <div class="col-md-12">
            <?= $pcbDesign[0]->g_main_content_en ?>
          </div>
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