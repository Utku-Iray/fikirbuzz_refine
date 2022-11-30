<?php
$sorgu = $vt->prepare("SELECT * FROM ckategoriler  WHERE (sort <> -1) AND (page_description <> 'test') AND (user <> 'root')  AND language = '0' GROUP BY page_url");
$sorgu->execute();
$categoryList = $sorgu->fetchAll(PDO::FETCH_OBJ);

$mainCategoryList = array();

$categoryCount = count($categoryList);

for ($i = 0; $i < $categoryCount; $i++) {
    if ($categoryList[$i]->up == "0") {
        if (!in_array($categoryList[$i]->iname, $mainCategoryList)) {
            array_push($mainCategoryList, [$categoryList[$i]->iname, $categoryList[$i]->cid]);
        }
    }
}

$mainCatCount = count($mainCategoryList);

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
            <a class="navbar-brand" href="index.html"><img src="assets/materials/logo.svg"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about-us.html">About Us</a>
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
                                                                                        else echo ''; ?> pid-<?= $i + 1 ?> adaptive"><?= $mainCategoryList[$i][0] ?></li>
                                        <?php  } ?>
                                    </ul>
                                    <div class="col-xl-9">
                                        <ul class="prodMegaSlider clearfix">

                                            <?php
                                            for ($i = 0; $i < $mainCatCount; $i++) {

                                                for ($k = 0; $k < $categoryCount; $k++) {
                                                    if ($mainCategoryList[$i][1] == $categoryList[$k]->up) { ?>
                                                        <li class="pid-<?= $i + 1 ?>">
                                                            <div class="outbox">
                                                                <a href="#">
                                                                    <div class="prod-tag"><?= $mainCategoryList[$i][0] ?></div>
                                                                </a>
                                                                <img src="assets/materials/network-device.png">
                                                            </div>
                                                            <div class="description">
                                                                <h1><?= $categoryList[$k]->iname ?></h1>
                                                            </div>
                                                            <a href="prod-list.php?cid=<?= $categoryList[$k]->cid ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
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
                        <a class="nav-link" aria-current="page" href="https://tr.transcend-info.com/">Transcend</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="https://global1.shuttle.com/">Shuttle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="single-page.html">PCB Design & Manufacturing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog-page.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
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

                            <ul class="dropdown-menu lang-menu d-flex" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/tr.svg" width="24px"></a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/en.svg" width="24px"></a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><img src="assets/materials/ar.svg" width="24px"></a>
                                </li>
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
            <a href="about-us.html">About Us</a>
            <a href="#">Lanner</a>
            <a href="https://tr.transcend-info.com/">Transcend</a>
            <a href="https://global1.shuttle.com/">Shuttle</a>
            <a href="single-page.html">PCB Design & Manufacturing</a>
            <a href="blog-page.php">Blog</a>
            <a href="contact.html">Contact Us</a>
            <a href="ebook-download.php" aria-haspopup="dialog" title="Download.pdf" class="btn-green lightbox">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
            <!-- <a href="#" class="btn-white login">Reseller Login</a> -->
            <div class="langArea d-flex">
                <a href="#" class="me-4"><img src="assets/materials/tr.svg" width="24px"></a>
                <a href="#" class="me-4"><img src="assets/materials/en.svg" width="24px"></a>
                <a href="#" class="me-4"><img src="assets/materials/ar.svg" width="24px"></a>
            </div>
        </div>
    </div>

    <!-- MOBILE NAV -->

</header>