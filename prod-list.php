<?php
require "database/connection.php";
include "config.php";

if (isset($_GET["cid"])) {
  $cid = $_GET["cid"];

  $query = $vt->prepare("SELECT * FROM sub_category WHERE id = '$cid' AND status = 1");
  $query->execute();
  $catResult = $query->fetchAll(PDO::FETCH_OBJ);

  $query = $vt->prepare("SELECT * FROM product WHERE category_id = '$cid' AND status = 1 ORDER BY name ASC");
  $query->execute();
  $productList = $query->fetchAll(PDO::FETCH_OBJ);

  $query = $vt->prepare("SELECT * FROM product WHERE status = 1 ORDER BY click_count DESC LIMIT 4");
  $query->execute();
  $mostPopularProduct = $query->fetchAll(PDO::FETCH_OBJ);
} else {
  header("Location: index.php");
}

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
              <a href="#">Products</a>
              <a href="#">
                <?php if ($_SESSION['lang'] == "en") {
                  echo $catResult[0]->name_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $catResult[0]->name_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $catResult[0]->name_ar;
                }
                ?>
              </a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1>
                <?php if ($_SESSION['lang'] == "en") {
                  echo $catResult[0]->name_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $catResult[0]->name_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $catResult[0]->name_ar;
                }
                ?>
              </h1>
              <p>
                <?php if ($_SESSION['lang'] == "en") {
                  echo $catResult[0]->description_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $catResult[0]->description_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $catResult[0]->description_ar;
                }
                ?>
              </p>
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
                  <p>

                    <?php if ($_SESSION['lang'] == "en") {
                      echo $product->short_description_en;
                    } else if ($_SESSION['lang'] == "tr") {
                      echo $product->short_description_tr;
                    } else if ($_SESSION['lang'] == "ar") {
                      echo $product->short_description_ar;
                    }
                    ?>
                  </p>
                </div>
                <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $cid ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang['seeMore'] ?>
                  <hr />
                </a>
              </div>
            </div>
          <?php  } ?>

          <button class="load-more__btn mt-5 mb-5"><?php echo $lang['seeMore'] ?><br /><img src="assets/materials/downron.svg"></button>
        </div>
      </div>
    </div>

    <div class="index-sec-2 related">
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <div class="col-xl-12 text-center seperator">
            <h1 class="mb-4"><?php echo $lang['mostPopulerProducts'] ?></h1>
            <hr>
          </div>
          <ul class="newSlider clearfix mt-5">
            <div class="row justify-content-between pid-1 d-flex">

              <?php
              foreach ($mostPopularProduct as $mprod) {    ?>
                <li class="col-xl-3 mt-5">
                  <a href="prod-in.php?pid=<?= $mprod->id ?>&cid=<?= $mprod->category_id ?>">
                    <div class="flatten">
                      <div class="outbox text-center mx-auto">
                        <img src="<?= $mprod->image ?>">
                      </div>
                      <div class="description mt-xl-0 pt-5">
                        <h1><?= $mprod->name ?></h1>
                        <p>
                          <?php if ($_SESSION['lang'] == "en") {
                            echo $mprod->short_description_en;
                          } else if ($_SESSION['lang'] == "tr") {
                            echo $mprod->short_description_tr;
                          } else if ($_SESSION['lang'] == "ar") {
                            echo $mprod->short_description_ar;
                          }
                          ?>
                        </p>
                        <div class="btn-line"><?php echo $lang['seeDetails'] ?>
                          <hr />
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              <?php   }
              ?>



            </div>
          </ul>
        </div>
      </div>
    </div>



    <?php include 'php/footer.php' ?>
</body>

</html>