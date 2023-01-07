<?php
require "database/connection.php";
include "config.php";



$query = $vt->prepare("SELECT * FROM blog WHERE sort = 5 ORDER BY created_at ASC");
$query->execute();
$blogSort = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">


<?php include 'php/head.php' ?>

<body class="wrapper" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>">
  <?php include 'php/header.php' ?>



  <main>
    <div class="mainSlider">
      <div class="container-fluid">
        <div class="row">
          <div class="slide--content">
            <div class="slider--trigger col-xl-11">
              <div class="slide--desc col-xl-7 col-11">
                <div class="searchBox">
                  <form action="search.php" method="get">
                    <input class="mb-4" type="text" name="term" placeholder="<?php echo $lang['search'] ?>">
                    <button type="submit" class="searchBtn"><img src="assets/materials/search-icon.svg"></button>
                  </form>
                </div>
                <div dir="ltr" class="main-pusher">
                  <div dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>" class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4"><?php echo $lang['sliderOne'] ?></h1>
                      </div>
                      <a href="single-blog.php?url=who-is-refine-what-benefits-does-refine-provide-for-you" class="btn-view"><span><?php echo $lang['seeDetails'] ?>
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>" class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4"><?php echo $lang['sliderTwo'] ?></h1>
                      </div>
                      <a href="lanner-product.php?mcid=1" class="btn-view"><span><?php echo $lang['seeDetails'] ?>
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>" class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4"><?php echo $lang['sliderThree'] ?></h1>
                      </div>
                      <a href="https://www.lannerinc.com/contact/channel-partners" class="btn-view"><span><?php echo $lang['seeDetails'] ?>
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>" class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4"><?php echo $lang['sliderFour'] ?></h1>
                      </div>
                      <a href="lanner-product.php?mcid=4" class="btn-view"><span><?php echo $lang['seeDetails'] ?>
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                            else echo "ltr"; ?>" class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4"><?php echo $lang['sliderFive'] ?></h1>
                      </div>
                      <a style="cursor: pointer;" class="btn-view form"><span><?php echo $lang['seeDetails'] ?>
                          <hr>
                        </span></a>
                    </div>
                  </div>
                </div>
                <div class="swiper-btns">
                  <?php if ($_SESSION['lang'] == "ar") echo '<button type="button" class="btn btn-primary btn-next"><i class="fa-solid fa-chevron-right"></i></button><button type="button" class="btn btn-primary btn-prev"><i class="fa-solid fa-chevron-left me-3"></i></button>
                            ';
                  else echo '<button type="button" class="btn btn-primary btn-prev"><i class="fa-solid fa-chevron-left me-3"></i></button>
                            <button type="button" class="btn btn-primary btn-next"><i class="fa-solid fa-chevron-right"></i></button>'; ?>

                </div>
              </div>
              <div class="next--slide d-xl-flex d-none justify-content-end col-xl-4 ms-auto">
                <div class="slide--incontent trigs-m">
                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-flex align-content-center align-items-center"><span><?php echo $lang['sliderOneShort'] ?></span>
                      <img class="ms-3" src="assets/materials/slider-bg.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-flex align-content-center align-items-center"><span><?php echo $lang['sliderTwoShort'] ?></span>
                      <img class="ms-3" src="assets/materials/sec-2-bg.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span><?php echo $lang['sliderThreeShort'] ?></span>
                      <img class="ms-3" src="assets/materials/slide-2.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span><?php echo $lang['sliderFourShort'] ?></span>
                      <img class="ms-3" src="assets/materials/slide-3.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span><?php echo $lang['sliderFiveShort'] ?></span>
                      <img class="ms-3" src="assets/materials/slide-4.jpg"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="img-pusher">
              <div class="push-it-img">
                <img src="assets/materials/slider-bg.jpg">
              </div>

              <div class="push-it-img">
                <img src="assets/materials/sec-2-bg.jpg">
              </div>

              <div class="push-it-img">
                <img src="assets/materials/slide-2.jpg">
              </div>

              <div class="push-it-img">
                <img src="assets/materials/slide-3.jpg">
              </div>

              <div class="push-it-img">
                <img src="assets/materials/slide-4.jpg">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-0 pt-xl-0 pt-5 pb-5 pb-xl-0" dir="ltr">
      <div class="container-fluid col-xl-10 mx-auto">
        <div class="row">
          <div class="col-xl-3"></div>
          <div class="col-xl-9">
            <div class="title">
              <h2 data-aos="fade-right" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                              else echo "ltr"; ?>"><?php echo $lang['blueTitle'] ?></h2>
              <p data-aos="fade-in" dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                          else echo "ltr"; ?>"><?php echo $lang['blueContent'] ?></p>
              <div class="swiper-btns mt-5 mb-3">
                <button type="button" class="btn btn-primary btn-next-box"><i class="fa-solid fa-chevron-left"></i></button>
                <button type="button" class="btn btn-primary btn-prev-box"><i class="fa-solid fa-chevron-right"></i></button>
              </div>
            </div>
            <div class="box--slider" data-aos="fade-in">
              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/industrial-iot.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderOneTitle'] ?></h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderOneContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/it-network-security.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderTwoTitle'] ?></h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderTwoContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/sd-wan-ucpe.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderThreeTitle'] ?></h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderThreeContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/edge-cloud.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderFourTitle'] ?> </h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderFourContent'] ?> </p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/edge-all.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderFiveTitle'] ?></h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderFiveContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/ot-network-security.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderSixTitle'] ?> </h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderSixContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="clearfix">
                <a>
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/pcb.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3 dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                  else echo "ltr"; ?>"><?php echo $lang['blueSliderSevenTitle'] ?></h3>
                        <p dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
                                else echo "ltr"; ?>"><?php echo $lang['blueSliderSevenContent'] ?></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Anasayfa Urunler Kısmı -->
    <div class="index-sec-1" dir="ltr">
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <ul class="prodFilter">
            <?php
            for ($i = 0; $i < $mainCatCount; $i++) { ?>
              <li data-filter="pid-<?= $i + 1 ?>" class="pid-<?= $i + 1; ?>  <?php if ($i + 1 == 1) echo "onTrigger active-prod";
                                                                              else "" ?>">
                <?php if ($_SESSION['lang'] == "en") {
                  echo $mainCategoryList[$i]->name_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $mainCategoryList[$i]->name_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $mainCategoryList[$i]->name_ar;
                }
                ?>
              </li>
            <?php }  ?>
          </ul>

          <ul class="prodSlider clearfix" data-aos="fade-up">

            <?php
            for ($i = 0; $i < $mainCatCount; $i++) {
              for ($j = 0; $j < $subCatCount; $j++) {
                if ($subCategoryList[$j]->category_id == $mainCategoryList[$i]->id) { ?>
                  <li class="pid-<?= $i + 1 ?>">
                    <div class="outbox">

                      <div class="prod-tag">
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $mainCategoryList[$i]->name_en;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $mainCategoryList[$i]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $mainCategoryList[$i]->name_ar;
                        }
                        ?>
                      </div>

                      <img src="<?= $subCategoryList[$j]->image ?>">
                    </div>
                    <div class="description">
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
                      <p style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $subCategoryList[$j]->description_en;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $subCategoryList[$j]->description_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $subCategoryList[$j]->description_ar;
                        }
                        ?>
                      </p>
                    </div>
                    <a href="prod-list.php?cid=<?= $subCategoryList[$j]->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                      MORE
                      <hr />
                    </a>
                  </li>
            <?php }
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="index-sec-2 <?php if ($_SESSION['lang'] == "ar" || $_SESSION['lang'] == "tr") echo "d-none";
                            else echo "d-block"; ?>">
      <div class="container-fluid">
        <div class="row sep">
          <div class="col-xl-1 p-0"></div>
          <div class="col-xl-11 p-0 sep-2">
            <div class="col-4" style="float: right;margin-right:45px">
              <a href="https://www.lannerinc.com/news-and-events/latest-news" target="_blank" class="btn-loader" style="margin-top: 27px;background-color:#187352"> Lanner News <img class="ms-2" src="assets/materials/mouse.png"></a>
            </div>
            <ul class="newsFilter">
              <li data-filter="pid-1" class="pid-1 active">Blogs</li>
              <!-- <li data-filter="pid-2" class="pid-2">Event</li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <ul class="newSlider clearfix">
            <div class="row justify-content-between pid-1 pid-2 d-flex">

              <?php for ($i = 0; $i < 4; $i++) { ?>
                <li class="col-xl-6">
                  <a href="single-blog.php">
                    <div class="flatten list-hover d-xl-flex">
                      <div class="outbox me-xl-4">
                        <img src="<?= $blogSort[$i]->image  ?>">
                      </div>
                      <div class="description mt-xl-0 mt-4">
                        <h1><?= $blogSort[$i]->title ?></h1>
                        <p><?= $blogSort[$i]->short_content ?></p>
                      </div>
                    </div>
                  </a>
                </li>


              <?php    } ?>

            </div>


          </ul>
          <div class="col-xl-12 text-center mt-5 position-relative mb-5 d-flex justify-content-center">
            <a href="blog-page.php" class="btn-loader">See All <img class="ms-2" src="assets/materials/smb.svg"></a>
          </div>

        </div>
      </div>
    </div>



    <?php include 'php/footer.php' ?>
</body>

</html>