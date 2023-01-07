<?php

$query = $vt->prepare("SELECT * FROM category WHERE status = 1");
$query->execute();
$mainCategoryList = $query->fetchAll(PDO::FETCH_OBJ);

$mainCatCount = count($mainCategoryList);

$query = $vt->prepare("SELECT * FROM sub_category WHERE status = 1");
$query->execute();
$subCategoryList = $query->fetchAll(PDO::FETCH_OBJ);

$subCatCount = count($subCategoryList);


$query = $vt->prepare("SELECT * FROM contact WHERE contact_status = 1");
$query->execute();
$contactResult = $query->fetchAll(PDO::FETCH_OBJ);
?>

<header>
  <button class="navbar-toggler menu-reverse" type="button">
    <div class="menu-icon" onclick="menuTrigger(this)">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
  </button>
  <nav class="navbar navbar-expand-xl navbar-light custom-bg fixed-top bg-scroll">
    <div class="container-fluid col-11">
      <a class="navbar-brand" href="index.php"><img src="assets/materials/logo.svg"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about-us.php">About Us</a>
          </li> -->
          <li class="nav-item ms-2">
            <div class="dropdown ">
              <a class="nav-link" aria-current="page" href="#">Refine</a>

              <ul class="dropdown-menu lang-menu justify-content-center" aria-labelledby="dropdownMenuLink">
                <li>
                  <a class="dropdown-item" style="color:black" href="about-us.php"><?php echo $lang['aboutUsNav'] ?></a>
                </li>
                <li>
                  <a class="dropdown-item" style="color:black" href="media.php"><?php echo $lang['mediaNav'] ?></a>
                </li>

              </ul>
            </div>
          </li>
          <li class="nav-item dropdown has-megamenu">
            <a class="nav-link dropdown-toggle " href="#" style="color:#187352 !important;font-weight:bold">Lanner</a>
            <div class="dropdown-menu megamenu pt-5" role="menu">
              <div class="container-fluid col-xl-11">
                <div class="row">
                  <ul class="col-xl-3 selection prodMegaFilter">
                    <?php

                    for ($i = 0; $i < $mainCatCount; $i++) { ?>
                      <li data-filter="pid-<?= $i + 1 ?>" class="pid-<?= $i + 1; ?>  <?php if ($i + 1 == 1) echo "active onTrigger";
                                                                                      else "" ?> adaptive">

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
                  <div class="col-xl-9">
                    <ul class="prodMegaSlider clearfix">

                      <?php
                      for ($i = 0; $i < $mainCatCount; $i++) {
                        for ($j = 0; $j < $subCatCount; $j++) {
                          if ($subCategoryList[$j]->category_id == $mainCategoryList[$i]->id) { ?>
                            <li class="pid-<?= $i + 1 ?>">
                              <div class="outbox">
                                <a href="#">
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
                                </a>
                                <img src="<?= $subCategoryList[$j]->image ?>" style="width: 200px;">
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
            </div> <!-- dropdown-mega-menu.// -->
            <!-- dropdown-mega-menu.// -->
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" target="_blank" style="color:rgba(150,0,20,1) !important;font-weight:bold" href="https://tr.transcend-info.com/">Transcend</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" target="_blank" style="color:rgba(14, 117, 180, 1) !important;font-weight:bold" href="https://global1.shuttle.com/">Shuttle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="single-page.php"><?php echo $lang['pcbDesignNav'] ?></a>
          </li>
          <li class="nav-item <?php if ($_SESSION['lang'] == "ar"|| $_SESSION['lang'] == "tr") echo "d-none";
                            else echo "d-block"; ?>">
            <a class="nav-link" href="blog-page.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php"><?php echo $lang['contactUsNav'] ?></a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <!-- <li class="nav-item">
            <div class="dropdown mini-searchbox">
              <img width="24px" class="dropdown-toggle langImg me-2" role="button" id="dropdownMenuLink" aria-expanded="false" src="assets/materials/search-icon.svg">

              <ul class="dropdown-menu search-box d-flex" aria-labelledby="dropdownMenuLink">
                <form class="form mx-auto" action="search.php" method="get">
                  <div class="form-group">
                    <input type="text" name="term" placeholder="Type Something...">
                    <button type="submit"><img src="assets/materials/send-icon.svg" alt=""></button>
                  </div>
                </form>
              </ul>
            </div>
          </li> -->
          <li class="nav-item ms-2">
            <div class="dropdown lang-list">
              <img width="24px" class="dropdown-toggle langImg me-2" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" src="assets/materials/lang.svg">

              <ul class="dropdown-menu lang-menu d-flex justify-content-center" aria-labelledby="dropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="<?php
                                                  $langQuery['lang'] = "en";
                                                  $query_result = http_build_query($langQuery);
                                                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>"><img src="assets/materials/en.svg" width="24px"></a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php
                                                  $langQuery['lang'] = "tr";
                                                  $query_result = http_build_query($langQuery);
                                                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>"><img src="assets/materials/tr.svg" width="24px"></a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php
                                                  $langQuery['lang'] = "ar";
                                                  $query_result = http_build_query($langQuery);
                                                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>"><img src="assets/materials/ar.svg" width="24px"></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ms-2">
            <a href="ebook-download.php" class="btn-green lightbox" aria-haspopup="dialog" title="Download.pdf">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
          </li>
          <!-- <li class="nav-item ms-2">
            <a class="btn-white form">Reseller Login</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- MOBILE NAV -->


  <div id="sideNav" class="sidenav-m">

    <div class="menu-items">
      <img src="assets/materials/logo.svg" class="img-fluid mb-5">
      <a href="about-us.php">About Us</a>

      <a href="media.php">Media</a>
      <div class="accordion-item" style="border: none;">
        <h2 class="accordion-header" id="headingTwo">
          <button style="padding:0;margin-bottom:10px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lanerProduct" aria-expanded="false" aria-controls="lanerProduct">
            Lanner
          </button>
        </h2>
        <div id="lanerProduct" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body d-flex " style="padding: 0 !important;">
            <div class="col-12" style="text-align: left;border-style: solid;border-width:1px;border-top: none;padding: 10px;border-radius: 11px;margin-bottom: 10px;">
              <?php

              for ($i = 0; $i < $mainCatCount; $i++) { ?>
                <a href="lanner-product.php?mcid=<?= $mainCategoryList[$i]->id ?>">
                  <?php if ($_SESSION['lang'] == "en") {
                    echo $mainCategoryList[$i]->name_en;
                  } else if ($_SESSION['lang'] == "tr") {
                    echo $mainCategoryList[$i]->name_tr;
                  } else if ($_SESSION['lang'] == "ar") {
                    echo $mainCategoryList[$i]->name_ar;
                  }
                  ?>
                </a>
              <?php }  ?>


            </div>
          </div>
        </div>
      </div>
      <a href="https://tr.transcend-info.com/">Transcend</a>
      <a href="https://global1.shuttle.com/">Shuttle</a>
      <a href="single-page.php"><?php echo $lang['pcbDesignNav'] ?></a>
      <a href="blog-page.php">Blog</a>
      <a href="contact.php"><?php echo $lang['contactUsNav'] ?></a>
      <a href="ebook-download.php" aria-haspopup="dialog" title="Download.pdf" class="btn-green lightbox">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
      <!-- <a href="#" class="btn-white login">Reseller Login</a> -->
      <div class="langArea d-flex">
        <a href="<?php
                  $langQuery['lang'] = "en";
                  $query_result = http_build_query($langQuery);
                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>" class="me-4"><img src="assets/materials/en.svg" width="24px"></a>

        <a href="<?php
                  $langQuery['lang'] = "tr";
                  $query_result = http_build_query($langQuery);
                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>" class="me-4"><img src="assets/materials/tr.svg" width="24px"></a>

        <a href="<?php
                  $langQuery['lang'] = "ar";
                  $query_result = http_build_query($langQuery);
                  echo basename($_SERVER['PHP_SELF']) . "?" . $query_result;  ?>" class="me-4"><img src="assets/materials/ar.svg" width="24px"></a>
      </div>
    </div>
  </div>

  <!-- MOBILE NAV -->

</header>