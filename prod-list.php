<?php
require "database/connection.php";

if ($_GET["cid"]) {
  $cid = $_GET["cid"];

  $query = $vt->prepare("SELECT * FROM sub_category WHERE id = '$cid' AND status = 1");
  $query->execute();
  $catResult = $query->fetchAll(PDO::FETCH_OBJ);

  $query = $vt->prepare("SELECT * FROM product WHERE category_id = '$cid' AND status = 1 ORDER BY name ASC");
  $query->execute();
  $productList = $query->fetchAll(PDO::FETCH_OBJ);
} else {
  header("Location: index.php");
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
              <a href="#">Products</a><a href="#"><?= $catResult[0]->name ?></a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1><?= $catResult[0]->name ?></h1>
              <p><?= $catResult[0]->description ?></p>
            </div>
          </div>
          <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
            <img src="<?= $catResult[0]->image ?>" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1">
      <div class="container-fluid col-xl-10">
        <div class="row list clearfix">

          <?php foreach ($productList as $product) { ?>
            <div class="col-xl-3 col-lg-4 mt-5 inp">
              <div class="full-box">
                <div class="outbox">
                  <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $cid ?>">
                    <img src="<?= $product->image ?>">
                  </a>

                </div>
                <div class="description">
                  <h1><?= $product->name ?></h1>
                  <p><?= $product->short_description ?></p>
                </div>
                <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $cid ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE MORE
                  <hr />
                </a>
              </div>
            </div>
          <?php  } ?>

          <button class="load-more__btn mt-5 mb-5">SEE MORE<br /><img src="assets/materials/downron.svg"></button>
        </div>
      </div>
    </div>

    <div class="index-sec-2 related">
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <div class="col-xl-12 text-center seperator">
            <h1 class="mb-4">Most Popular Products</h1>
            <hr>
          </div>
          <ul class="newSlider clearfix mt-5">
            <div class="row justify-content-between pid-1 d-flex">
              <li class="col-xl-3 mt-5">
                <a href="prod-in.html">
                  <div class="flatten">
                    <div class="outbox text-center mx-auto">
                      <img src="assets/materials/prod-1.png">
                    </div>
                    <div class="description mt-xl-0 pt-5">
                      <h1>NCI-200</h1>
                      <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Fusce
                        est sapien, accumsan non efficitur
                        faucibus, suscipit ac mi.</p>
                      <div class="btn-line">See Details
                        <hr />
                      </div>
                    </div>
                  </div>
                </a>
              </li>

              <li class="col-xl-3 mt-5">
                <a href="prod-in.html">
                  <div class="flatten">
                    <div class="outbox text-center mx-auto">
                      <img src="assets/materials/prod-2.png">
                    </div>
                    <div class="description mt-xl-0 pt-5">
                      <h1>NCI-200</h1>
                      <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Fusce
                        est sapien, accumsan non efficitur
                        faucibus, suscipit ac fsdfsdfsdffffdsfsdfdsfdsfsdfds.</p>
                      <div class="btn-line">See Details
                        <hr />
                      </div>
                    </div>
                  </div>
                </a>
              </li>

              <li class="col-xl-3 mt-5">
                <a href="prod-in.html">
                  <div class="flatten">
                    <div class="outbox text-center mx-auto">
                      <img src="assets/materials/prod-3.png">
                    </div>
                    <div class="description mt-xl-0 pt-5">
                      <h1>NCI-200</h1>
                      <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Fusce
                        est sapien, accumsan non efficitur
                        faucibus, suscipit ac mi.</p>
                      <div class="btn-line">See Details
                        <hr />
                      </div>
                    </div>
                  </div>
                </a>
              </li>

              <li class="col-xl-3 mt-5">
                <a href="prod-in.html">
                  <div class="flatten">
                    <div class="outbox text-center mx-auto">
                      <img src="assets/materials/prod-4.png">
                    </div>
                    <div class="description mt-xl-0 pt-5">
                      <h1>NCI-200</h1>
                      <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Fusce
                        est sapien, accumsan non efficitur
                        faucibus, suscipit ac mi.</p>
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