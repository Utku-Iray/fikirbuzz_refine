<?php
$sorgu = $vt->prepare("SELECT * FROM ckategoriler  WHERE (sort <> -1) AND (page_description <> 'test') AND (user <> 'root')  AND language = '1' ORDER BY cdate DESC");
$sorgu->execute();
$categoryList = $sorgu->fetchAll(PDO::FETCH_OBJ);



$categoryCount = count($categoryList);


$mainCategoryList = array();
$mainCatIDList = array();
for ($i = 0; $i < $categoryCount; $i++) {
    if ($categoryList[$i]->up == "0") {
        if (!in_array($categoryList[$i]->iname, $mainCategoryList)) {
            array_push($mainCategoryList, $categoryList[$i]->iname);
            array_push($mainCatIDList, $categoryList[$i]->cid);
        }
    }
}
$mainCatCount = count($mainCategoryList);
$mainCatIDCount = count($mainCatIDList);


$subCategoryList = array();

$subCategoryCidList = array();

for ($j = 0; $j < $mainCatIDCount; $j++) {
    for ($k = 0; $k < $categoryCount; $k++) {
        if ($categoryList[$k]->up == $mainCatIDList[$j]) {
            if (!in_array($categoryList[$k]->cid, $subCategoryCidList)) {
                array_push($subCategoryCidList, $categoryList[$k]->cid);
                array_push($subCategoryList, [$categoryList[$k]->cid, $categoryList[$k]->iname, $categoryList[$k]->up, $categoryList[$k]->iresim]);
            }
        }
    }
}

$subCategoryCount = count($subCategoryList);

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
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about-us.php">About Us</a>
                    </li>

                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" style="color:#187352 !important;font-weight:bold">Lanner</a>
                        <div class="dropdown-menu megamenu pt-5" role="menu">
                            <div class="container-fluid col-xl-11">
                                <div class="row">
                                    <ul class="col-xl-3 selection prodMegaFilter">
                                        <!-- <li data-filter="pid-1" class="pid-1  adaptive active">Network Appliances</li> -->
                                        <?php
                                        for ($i = 0; $i < $mainCatCount; $i++) { ?>
                                            <li data-filter="pid-<?= $i + 1 ?>" class="<?php if ($i + 1 == 1) echo 'active onTrigger';
                                                                                        else echo ''; ?> pid-<?= $i + 1 ?> adaptive"><?= $mainCategoryList[$i] ?></li>
                                        <?php  } ?>
                                    </ul>
                                    <div class="col-xl-9">
                                        <ul class="prodMegaSlider clearfix">

                                            <?php
                                            for ($i = 0; $i < $mainCatIDCount; $i++) {

                                                for ($k = 0; $k < $subCategoryCount; $k++) {
                                                    if ($subCategoryList[$k][2] == $mainCatIDList[$i]) { ?>
                                                        <li class="pid-<?= $i + 1 ?>">
                                                            <div class="outbox">
                                                                <a href="#">
                                                                    <div class="prod-tag"><?= $mainCategoryList[$i] ?></div>
                                                                </a>
                                                                <img src="assets/<?= $subCategoryList[$k][3] ?>" style="width: 200px;">
                                                            </div>
                                                            <div class="description">
                                                                <h1><?= $subCategoryList[$k][1] ?></h1>
                                                            </div>
                                                            <a href="prod-list.php?cid=<?= $subCategoryList[$k][0] ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                                                                MORE
                                                                <hr />
                                                            </a>
                                                        </li>
                                            <?php  }
                                                }
                                            }   ?>



                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- dropdown-mega-menu.// -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" target="_blank" href="https://tr.transcend-info.com/">Transcend</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" target="_blank" href="https://global1.shuttle.com/">Shuttle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="single-page.php">PCB Design & Manufacturing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog-page.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item hiddenSearch">
                        <div class="dropdown mini-searchbox">
                            <img width="24px" class="dropdown-toggle langImg me-2" role="button" id="dropdownMenuLink" aria-expanded="false" src="assets/materials/search-icon.svg">

                            <ul class="dropdown-menu search-box d-flex" aria-labelledby="dropdownMenuLink">
                                <form class="form mx-auto">
                                    <div class="form-group">
                                        <input type="text" placeholder="Type Something">
                                        <button type="submit"><img src="assets/materials/send-icon.svg" alt=""></button>
                                    </div>
                                </form>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ms-2">
                        <div class="dropdown lang-list">
                            <img width="24px" class="dropdown-toggle langImg me-2" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" src="assets/materials/lang.svg">

                            <ul class="dropdown-menu lang-menu d-flex justify-content-center" aria-labelledby="dropdownMenuLink">
                                <!-- <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/tr.svg" width="24px"></a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/en.svg" width="24px"></a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/ar.svg" width="24px"></a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="ebook-download.php" class="btn-green lightbox" aria-haspopup="dialog" title="Download.pdf">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
                    </li>
                    <!-- <li class="nav-item ms-2">
                            <a class="btn-white login">Reseller Login</a>
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
            <a href="#">Lanner</a>
            <a href="https://tr.transcend-info.com/">Transcend</a>
            <a href="https://global1.shuttle.com/">Shuttle</a>
            <a href="single-page.php">PCB Design & Manufacturing</a>
            <a href="blog-page.php">Blog</a>
            <a href="contact.php">Contact Us</a>
            <a href="ebook-download.php" aria-haspopup="dialog" title="Download.pdf" class="btn-green lightbox">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
            <!-- <a href="#" class="btn-white login">Reseller Login</a> -->
            <div class="langArea d-flex">
                <!-- <a href="#" class="me-4"><img src="assets/materials/tr.svg" width="24px"></a> -->
                <a href="#" class="me-4"><img src="assets/materials/en.svg" width="24px"></a>
                <!-- <a href="#" class="me-4"><img src="assets/materials/ar.svg" width="24px"></a> -->
            </div>
        </div>
    </div>

    <!-- MOBILE NAV -->

</header>