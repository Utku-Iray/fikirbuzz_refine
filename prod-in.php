<?php require "database/connection.php";
include "config.php";

if (isset($_GET["pid"])) {
  $pid = $_GET["pid"];
  $query = $vt->prepare("SELECT * FROM product WHERE id = '$pid'");
  $query->execute();
  $productVal = $query->fetchAll(PDO::FETCH_OBJ);

  $cid = $_GET["cid"];
  $query = $vt->prepare("SELECT * FROM product WHERE category_id = '$cid' AND status = 1 LIMIT 4");
  $query->execute();
  $relatedProds = $query->fetchAll(PDO::FETCH_OBJ);

  $query3 = $vt->prepare("SELECT * FROM spec");
  $query3->execute();
  $specTableResult = $query3->fetchAll(PDO::FETCH_OBJ);

  $specTableCount = count($specTableResult);
} else {
  header("Location: product-list.php?cid=$cid");
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
              <a href="#"><?php echo $lang['products'] ?></a><a href="#"><?= $productVal[0]->name ?></a>
            </div>
            <div class="title">
              <h1 data-aos="fade-right"><?= $productVal[0]->name ?></h1>
              <p data-aos="fade-right">

                <?php if ($_SESSION['lang'] == "en") {
                  echo $productVal[0]->short_description_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $productVal[0]->short_description_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $productVal[0]->short_description_ar;
                }
                ?>
              </p>
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
            <h1><img src="assets/materials/kf-ico.svg" class="me-4"><?php echo $lang['keyFeatures'] ?></h1>
            <div class="mt-5">
              <?php if ($_SESSION['lang'] == "en") {
                echo $productVal[0]->key_features_en;
              } else if ($_SESSION['lang'] == "tr") {
                echo $productVal[0]->key_features_tr;
              } else if ($_SESSION['lang'] == "ar") {
                echo $productVal[0]->key_features_ar;
              }
              ?>
            </div>
          </div>
          <div class="mb-5 col-xl-5 ms-auto ov">
            <h1><?php echo $lang ['overview'] ?></h1>
            <div class="bg-white">
              <p id="limiter" class="p-5">
                <?php if ($_SESSION['lang'] == "en") {
                  echo $productVal[0]->overview_en;
                } else if ($_SESSION['lang'] == "tr") {
                  echo $productVal[0]->overview_tr;
                } else if ($_SESSION['lang'] == "ar") {
                  echo $productVal[0]->overview_ar;
                }
                ?>
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[0]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[0]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[0]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[0]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[0]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[0]->details_ar);
                          foreach ($specPlatformArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>

                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specPlatformArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specPlatformArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specPlatformArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[1]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[1]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[1]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[1]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[1]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[1]->details_ar);

                          foreach ($specStorageArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specStorageArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specStorageArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specStorageArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[2]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[2]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[2]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[2]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[2]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[2]->details_ar);
                          foreach ($specIOArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specIOArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specIOArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specIOArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[3]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[3]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[3]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[3]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[3]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[3]->details_ar);
                          foreach ($specPamArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specPamArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specPamArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specPamArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[4]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[4]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[4]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[4]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[4]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[4]->details_ar);
                          foreach ($specOacArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specOacArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specOacArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specOacArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[5]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[5]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[5]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[5]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[5]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[5]->details_ar);
                          foreach ($specPaeArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specPaeArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specPaeArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specPaeArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[6]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[6]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[6]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[6]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[6]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[6]->details_ar);
                          foreach ($specSmArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specSmArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specSmArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specSmArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[7]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[7]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[7]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[7]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[7]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[7]->details_ar);
                          foreach ($specNetworkArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specNetworkArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specNetworkArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specNetworkArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
                        <?php if ($_SESSION['lang'] == "en") {
                          echo $specTableResult[8]->name;
                        } else if ($_SESSION['lang'] == "tr") {
                          echo $specTableResult[8]->name_tr;
                        } else if ($_SESSION['lang'] == "ar") {
                          echo $specTableResult[8]->name_ar;
                        }
                        ?>
                      </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine">
                      <div class="accordion-body d-flex justify-content-between">
                        <div class="col-xl-4">
                          <?php
                          $encodedSpecListEN = json_decode($specTableResult[8]->details);
                          $encodedSpectListCount = count($encodedSpecListEN);
                          $encodedSpecListTR = json_decode($specTableResult[8]->details_tr);
                          $encodedSpecListAR = json_decode($specTableResult[8]->details_ar);
                          foreach ($specIOInterfaceArr[0] as $key) {
                            for ($i = 0; $i < $encodedSpectListCount; $i++) {
                              if ($key == $encodedSpecListEN[$i]) {
                                if ($_SESSION['lang'] == "tr") {
                                  echo "<h5>" . $encodedSpecListTR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "ar") {
                                  echo "<h5>" . $encodedSpecListAR[$i] . "</h5>";
                                } else if ($_SESSION['lang'] == "en") {
                                  echo "<h5>$key</h5>";
                                }
                              }
                            }
                          }
                          ?>
                        </div>
                        <div class="col-xl-8 ms-auto text-end">
                          <?php
                          if ($_SESSION['lang'] == "en") {
                            foreach ($specIOInterfaceArr[1] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "tr") {
                            foreach ($specIOInterfaceArr[2] as $key) {
                              echo "<h5>$key</h5>";
                            }
                          } else if ($_SESSION['lang'] == "ar") {
                            foreach ($specIOInterfaceArr[3] as $key) {
                              echo "<h5>$key</h5>";
                            }
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
            <h1><?php echo $lang ['relatedProducts'] ?> <img class="ms-2" src="assets/materials/smb.svg"></h1>
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
                  <p>
                    <?php if ($_SESSION['lang'] == "en") {
                      echo $relatedProd->short_description_en;
                    } else if ($_SESSION['lang'] == "tr") {
                      echo $relatedProd->short_description_tr;
                    } else if ($_SESSION['lang'] == "ar") {
                      echo $relatedProd->short_description_ar;
                    }
                    ?>
                  </p>
                </div>
                <a href="prod-in.php?pid=<?= $relatedProd->id ?>&cid=<?= $cid ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang ['seeMore'] ?>
                  <hr />
                </a>
              </div>
            </div>
          <?php } ?>


        </div>
      </div>
    </div>





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