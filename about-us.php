<?php
require "database/connection.php";
include "config.php";

$query = $vt->prepare("SELECT * FROM general WHERE g_page_url='about-us'");
$query->execute();
$aboutResult = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
            else echo "ltr"; ?>">

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
              <a href="index.php"><?php echo $lang['aboutBannerShortOne'] ?></a><a href="#"><?php echo $lang['aboutBannerShortTwo'] ?></a>
            </div>
            <div class="title">
              <h1 data-aos="fade-right"><?php echo $lang['aboutUsNav'] ?></h1>
              <p data-aos="fade-in"><?php echo $lang['aboutBanner'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea row pb-5">
          <div class="col-md-12">
            <?php if ($_SESSION['lang'] == "en") {
              echo $aboutResult[0]->g_main_content_en;
            } else if ($_SESSION['lang'] == "tr") {
              echo $aboutResult[0]->g_main_content_tr;
            } else if ($_SESSION['lang'] == "ar") {
              echo $aboutResult[0]->g_main_content_ar;
            }
            ?>
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
                  <h1 class="my-auto ms-3 abs-low"><?php echo $lang['bannerOneTitle'] ?></h1>
                  <h1 class="my-auto ms-3"><?php echo $lang['bannerOneTitle'] ?></h1>
                </div>
                <div class="description mt-4">
                  <p><?php echo $lang['bannerOne'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5">
          <div class="row clearfix slick-promote">

            <?php for ($j = 0; $j < $subCatCount; $j++) {
              if ($subCategoryList[$j]->category_id == 1) { ?>
                <div class="col-xl-3 col-lg-4 mt-5 inp-short">
                  <div class="full-box">
                    <div class="outbox">
                      <img src="<?= $subCategoryList[$j]->image ?>">
                    </div>
                    <div class="description" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                                  else echo "ltr"; ?>">
                      <h1>
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $subCategoryList[$j]->name_en;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $subCategoryList[$j]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $subCategoryList[$j]->name_ar;
                        }
                        ?>
                      </h1>
                    </div>
                    <a href="prod-list.php?cid=<?= $subCategoryList[$j]->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang['seeMore'] ?>
                      <hr />
                    </a>
                    </a>
                  </div>
                </div>
            <?php }
            }  ?>



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
                  <h1 class="my-auto ms-3 abs-low"><?php echo $lang['bannerTwoTitle'] ?></h1>
                  <h1 class="my-auto ms-3"><?php echo $lang['bannerTwoTitle'] ?></h1>
                </div>
                <div class="description mt-4 text-xl-end">
                  <p><?php echo $lang['bannerTwo'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5" dir="ltr">
          <div class="row clearfix slick-promote">
          <?php for ($j = 0; $j < $subCatCount; $j++) {
              if ($subCategoryList[$j]->category_id == 2) { ?>
                <div class="col-xl-3 col-lg-4 mt-5 inp-short">
                  <div class="full-box">
                    <div class="outbox">
                      <img src="<?= $subCategoryList[$j]->image ?>">
                    </div>
                    <div class="description" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                                  else echo "ltr"; ?>">
                      <h1>
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $subCategoryList[$j]->name_en;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $subCategoryList[$j]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $subCategoryList[$j]->name_ar;
                        }
                        ?>
                      </h1>
                    </div>
                    <a href="prod-list.php?cid=<?= $subCategoryList[$j]->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang['seeMore'] ?>
                      <hr />
                    </a>
                    </a>
                  </div>
                </div>
            <?php }
            }  ?>
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
                  <h1 class="my-auto ms-3 abs-low"><?php echo $lang['bannerThreeTitle'] ?></h1>
                  <h1 class="my-auto ms-3"><?php echo $lang['bannerThreeTitle'] ?></h1>
                </div>
                <div class="description mt-4">
                  <p><?php echo $lang['bannerThree'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-xl-10 pb-5">
          <div class="row clearfix slick-promote">
          <?php for ($j = 0; $j < $subCatCount; $j++) {
              if ($subCategoryList[$j]->category_id == 6) { ?>
                <div class="col-xl-3 col-lg-4 mt-5 inp-short">
                  <div class="full-box">
                    <div class="outbox">
                      <img src="<?= $subCategoryList[$j]->image ?>">
                    </div>
                    <div class="description" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                                  else echo "ltr"; ?>">
                      <h1>
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $subCategoryList[$j]->name_en;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $subCategoryList[$j]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $subCategoryList[$j]->name_ar;
                        }
                        ?>
                      </h1>
                    </div>
                    <a href="prod-list.php?cid=<?= $subCategoryList[$j]->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang['seeMore'] ?>
                      <hr />
                    </a>
                    </a>
                  </div>
                </div>
            <?php }
            }  ?>
          </div>
        </div>
      </div>
    </div>



    <?php include 'php/footer.php' ?>

</body>

</html>