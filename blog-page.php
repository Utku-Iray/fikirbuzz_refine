<?php

include 'database/connection.php';


$sorgu = $vt->prepare("SELECT * FROM cblog  WHERE (sort <> -1) AND (page_description <> 'test') GROUP BY iname");
$sorgu->execute();
$blogList = $sorgu->fetchAll(PDO::FETCH_OBJ);




?>
<!doctype html>
<html lang="en">

<head>
  <title>Refine</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="author" content="arg0dev">
  <meta name="theme-color" content="#06388a">
  <meta name="copyright" content="arg0dev">
  <meta http-equiv="content-language" content="en">
  <link href='./assets/materials/og/fav64.ico' rel='icon' type='image/x-icon' />

  <!-- arg0 OpenGraph tags -->
  <meta content='website' property='og:type' />
  <meta content='Refine Inc. | Your Title Here' property='og:title' />
  <meta content='Refine Inc. | Your Title Here' property='og:site_name' />
  <meta content='Refine Inc. | Your Description Here' property='og:description' />
  <meta content='https://refine-tr.com' property='og:url' />
  <meta content='https://refine-tr.com/assets/materials/og/og_image.jpg' property='og:image' />
  <link href='./assets/materials/og/app180.png' rel='apple-touch-icon' sizes='180x180' />
  <link href='./assets/materials/og/app192.png' rel='icon' sizes='192x192' type='image/png' />
  <link href='./assets/materials/og/app32.png' rel='icon' sizes='32x32' type='image/png' />

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/scss/topbox.css" type="text/css">
  <link rel="stylesheet" href="assets/scss/aos.css" type="text/css">
  <link rel="stylesheet" href="assets/scss/main.css" type="text/css">

</head>

<body>

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
              <a class="nav-link dropdown-toggle" href="prod-list.html">Products</a>
              <div class="dropdown-menu megamenu pt-5" role="menu">
                <div class="container-fluid col-xl-11">
                  <div class="row">
                    <ul class="col-xl-3 selection prodMegaFilter">
                      <li data-filter="pid-1" class="pid-1 onTrigger adaptive active">Network Appliances</li>
                      <li data-filter="pid-2" class="pid-2 adaptive">Telecom Datacenter Appliances</li>
                      <li data-filter="pid-3" class="pid-3 adaptive">Industrial Communication Platforms</li>
                      <li data-filter="pid-4" class="pid-4 adaptive">Vehicle Computers</li>
                      <li data-filter="pid-5" class="pid-5 adaptive">Embedded Box PCs</li>
                      <li data-filter="pid-6" class="pid-6 adaptive">Extension Modules</li>
                    </ul>
                    <div class="col-xl-9">
                      <ul class="prodMegaSlider clearfix">
                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-1">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>

                        <li class="pid-2">
                          <div class="outbox">
                            <a href="#">
                              <div class="prod-tag">NCA-0123</div>
                            </a>
                            <img src="assets/materials/network-device.png">
                          </div>
                          <div class="description">
                            <h1>DESKTOP NETWORK APPLIANCES PID-2</h1>
                          </div>
                          <a href="#" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                            MORE
                            <hr />
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div> <!-- dropdown-mega-menu.// -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="single-page.html">PCB Design & Manufacturing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="blog-page.html">Blog</a>
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
                  <li><a class="dropdown-item" href="#"><img src="assets/materials/tr.svg" width="24px"></a></li>
                  <li><a class="dropdown-item" href="#"><img src="assets/materials/en.svg" width="24px"></a></li>
                  <li><a class="dropdown-item" href="#"><img src="assets/materials/ar.svg" width="24px"></a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item ms-2">
              <a href="assets/materials/sample.pdf" class="btn-green lightbox" aria-haspopup="dialog" title="Sample.pdf">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
            </li>
            <li class="nav-item ms-2">
              <a class="btn-white login">Reseller Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- MOBILE NAV -->


    <div id="sideNav" class="sidenav-m">
      <div class="menu-items">
        <img src="assets/materials/logo.svg" class="img-fluid mb-5">
        <a href="about-us.html">About Us</a>
        <a href="prod-list.html">Products</a>
        <a href="single-page.html">PCB Design & Manufacturing</a>
        <a href="blog-page.html">Blog</a>
        <a href="contact.html">Contact Us</a>
        <a href="assets//materials/sample.pdf" aria-haspopup="dialog" title="Sample.pdf" class="btn-green lightbox">E-Book <img class="ms-1" width="12px" src="assets/materials/pdf.svg"></span></a>
        <a href="#" class="btn-white login">Reseller Login</a>
        <div class="langArea d-flex">
          <a href="#" class="me-4"><img src="assets/materials/tr.svg" width="24px"></a>
          <a href="#" class="me-4"><img src="assets/materials/en.svg" width="24px"></a>
          <a href="#" class="me-4"><img src="assets/materials/ar.svg" width="24px"></a>
        </div>
      </div>
    </div>

    <!-- MOBILE NAV -->

  </header>

  <main>
    <div class="banner dark">
      <div class="image-area">
        <img class="bannerImg" src="assets/materials/blog-cover.png">
      </div>
      <div class="container-fluid col-xl-10">
        <div class="row align-content-center align-items-center">
          <div class="col-xl-7">
            <div class="breadcrumb" data-aos="fade-in">
              <a href="#">Home</a><a href="#">Blog</a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1>Blog</h1>
              <p>In addition to being Lanner’s authorized distributor in the Middle East, we also offer sourcing
                services for PCB design & manufacturing.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 blog-page">
      <div class="container-fluid col-xl-10">
        <div class="row list clearfix">
          <div class="col-xl-12 ms-auto text-end title mb-5">
            <h1>Related Products <img class="ms-2" src="assets/materials/smb.svg"></h1>
          </div>
          <div class="boxed-content mx-auto mx-xl-0 p-0 row col-xl-7">
            <div class="col-xl-6 inp mb-4 mb-xl-0">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/blog-box-cover.png">
                </div>
                <div class="description">
                  <h1>Where is 5g technology used?</h1>
                  <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Fusce
                    est sapien, accumsan non efficitur
                    faucibus, suscipit ac mi.</p>
                </div>
                <div class="details d-flex">
                  <div class="post-tag">SECURITY</div>
                  <div class="date">
                    <img src="assets/materials/calendar.svg"><span>22.03.22</span>
                  </div>
                </div>
                <a href="single-blog.html" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                  ARTICLE
                  <hr />
                </a>
              </div>
            </div>

            <div class="col-xl-6 inp mb-4 mb-xl-0">
              <div class="full-box">
                <div class="outbox">
                  <img src="assets/materials/blog-box-cover.png">
                </div>
                <div class="description">
                  <h1>Where is 5g technology used?</h1>
                  <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Fusce
                    est sapien, accumsan non efficitur
                    faucibus, suscipit ac mi.</p>
                </div>
                <div class="details d-flex">
                  <div class="post-tag">SECURITY</div>
                  <div class="date">
                    <img src="assets/materials/calendar.svg"><span>22.03.22</span>
                  </div>
                </div>
                <a href="single-blog.html" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                  ARTICLE
                  <hr />
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-5 mt-xl-0 mt-5 sec-right ms-auto">
            <div class="incontent mb-4">
              <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur
                aucibus, suscipit ac mi.</p>
              <a href="single-blog.html">READ ARTICLE</a>
            </div>
            <div class="incontent mb-4">
              <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur
                aucibus, suscipit ac mi.</p>
              <a href="single-blog.html">READ ARTICLE</a>
            </div>
            <div class="incontent mb-4">
              <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur
                aucibus, suscipit ac mi.</p>
              <a href="single-blog.html">READ ARTICLE</a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 blog-page bg-white">
      <div class="container-fluid col-xl-10">
        <div class="row list clearfix align-content-center align-items-center">
          <div class="col-xl-5 mt-xl-0 mt-5 sec-right">
            <div class="incontent mb-5">
              <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur
                aucibus, suscipit ac mi.</p>
              <a href="single-blog.html">READ ARTICLE</a>
            </div>
            <div class="incontent mb-5">
              <h1>WHERE IS 5G TECHNOLOGY USED?</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est sapien, accumsan non efficitur
                aucibus, suscipit ac mi.</p>
              <a href="single-blog.html">READ ARTICLE</a>
            </div>
          </div>

          <div class="col-xl-6 ms-auto">
            <div class="outbox">
              <img src="assets/materials/world.png">
              <div class="description row align-items-xl-between align-content-xl-between h">
                <div class="date d-xl-block d-none">
                  <a><span>22.03.22</span><img src="assets/materials/calendar.svg"></a>
                </div>
                <div class="title">
                  <div class="post-tag-w">SECURITY</div>
                  <a href="single-blog.html">
                    <h1>Where is 5g <br />
                      technology used?</h1>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 blog-page">
      <div class="container-fluid col-xl-10">
        <div class="row list-blog clearfix">
          <div class="col-xl-12 ms-auto text-end title mb-5">
            <h1>All Posts <img class="ms-2" src="assets/materials/smb.svg"></h1>
          </div>
          <div class="boxed-content mx-auto mx-xl-0 p-0 row col-xl-12">

            <?php
            foreach ($blogList as $singleBlog) { ?>
              <div class="col-xl-4 inp mb-5">
                <div class="full-box">
                  <div class="outbox">
                    <img src="https://projects.fikirbuzzprojects.com/refine/img/i/<?= $singleBlog->igorsel  ?>">
                  </div>
                  <div class="description" style="height:160px">
                    <h1><?= $singleBlog->iname  ?></h1>
                    <p>
                      <?= $singleBlog->ikisa_icerik  ?>
                    </p>

                  </div>
                  <div class="details d-flex">
                    <div class="post-tag">BLOG</div>
                    <div class="date">
                      <img src="assets/materials/calendar.svg"><span><?= $singleBlog->cdate  ?></span>
                    </div>
                  </div>
                  <a href="single-blog?name=<?= $singleBlog->page_url  ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">READ
                    ARTICLE
                    <hr />
                  </a>
                </div>
              </div>
            <?php } ?>


            <button class="load-more__btn mt-5 mb-5">SEE MORE<br /><img src="assets/materials/downron.svg"></button>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-3">
      <div class="container-fluid col-xl-10">
        <div class="row">
          <div class="col-xl-6 text-xl-start text-center">
            <h1>Refine is Lanner’s Authorized Distributor In <br />
              The Middle East, Turkey And Pakistan.</h1>
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

  <footer>
    <div class="col-xl-12 d-flex mainBlur">
      <div class="col-xl-4 half-drop"></div>
      <div class="col-xl-8 full-drop ms-auto"></div>
    </div>
    <div class="container-fluid col-xl-10 drop">
      <div class="row pt-5 pb-5">
        <div class="col-xl-4 text-center text-xl-start mb-5">
          <h4 class="mb-5 ms-xl-5 ps-xl-1"><img class="me-4" src="assets/materials/post-ico.svg">How Can We Help?</h4>
          <div class="mini-box d-flex justify-content-center justify-content-xl-start mt-3">
            <a href="single-page.html">
              <div class="text-center mb me-3">
                <div class="incontent">
                  <img src="assets/materials/info.svg">
                  <p class="mt-3">How to buy!</p>
                </div>
              </div>
            </a>
            <a href="single-page.html">
              <div class="text-center mb">
                <div class="incontent">
                  <img src="assets/materials/product-ico.svg">
                  <p class="mt-3">Product Support</p>
                </div>
              </div>
          </div>
          </a>
          <div class="mini-box d-flex justify-content-center justify-content-xl-start mt-3">
            <a href="mailto:info@refine-tr.com">
              <div class="text-center mb me-3">
                <div class="incontent">
                  <img src="assets/materials/mail.svg">
                  <p class="mt-3">E-Mail Sales</p>
                </div>
              </div>
            </a>
            <a href="https://api.whatsapp.com/send?phone=+905000000000&text=Merhabalar,%20Refine%20Inc.%20ayr%C4%B1cal%C4%B1klar%C4%B1ndan%20yararlanmak%20istiyorum.">
              <div class="text-center mb">
                <div class="incontent">
                  <img src="assets/materials/chat.svg">
                  <p class="mt-3">Chat with Sales </p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-1 d-xl-auto d-none"></div>
        <div class="col-xl-7 row p-xl-0 mx-auto ms-xl-auto mx-xl-0 my-auto">
          <div class="col-xl-4 mb-5 text-center text-xl-start">
            <h4 class="mb-3 d-xl-flex"><span class="order-1">Menu</span>
              <hr class="mx-xl-2 mx-auto" />
            </h4>
            <a href="about-us.html">
              <p>About Us</p>
            </a>
            <a href="prod-list.html">
              <p>Products</p>
            </a>
            <a href="single-page.html">
              <p>PCB Design & Manufacturing</p>
            </a>
            <a href="blog-page.html">
              <p>Blog</p>
            </a>
            <a href="contact.html">
              <p>Contact Us</p>
            </a>
          </div>

          <div class="col-xl-1 mb-5"></div>

          <div class="col-xl-7 mb-5 text-center text-xl-start">
            <h4 class="mb-3 d-xl-flex"><span class="order-1">Contact</span>
              <hr class="mx-xl-2 mx-auto" />
            </h4>
            <a target="blank_" href="https://g.page/refine-tr?share">
              <p>HQ: Kasap Sok. Gamze Apt. No:19/1 34394 Esentepe, Şişli, İstanbul, Türkiye</p>
            </a>
            <a href="#" target="blank_">
              <p>Warehouse I: Room 1202, 12/F Global Gateway (Tsuen Wan), 168 Yeung Uk Road, Tsuen Wan, Hong Kong</p>
            </a>
            <a href="#" target="blank_">
              <p>Warehouse II: No. 121 Tai Tao Tsuen Hung Shui Kiu Yuen Long, Hong Kong</p>
            </a>
            <div class="numberArea d-flex mt-5">
              <a href="tel:+90 850 433 87 60" class="d-flex justify-content-center justify-content-xl-start me-3 mb-2"><img src="assets/materials/phone.svg" width="24px">
                <p>+90 850 433 87 60</p>
              </a>
              <a href="mailto:info@refine-tr.com" class="d-flex justify-content-center justify-content-xl-start me-2 mb-2"><img src="assets/materials/mail.svg" width="24px">
                <p>info@refine-tr.com</p>
              </a>
            </div>
          </div>

          <div class="col-xl-6 mt-auto text-center text-xl-start">
            <h4>Subscribe Newsletter</h4>
            <form class="form mt-4">
              <div class="form-group">
                <input type="text" placeholder="Your E-Mail Address">
                <button type="submit"><img src="assets/materials/send-icon.svg" alt=""></button>
              </div>
            </form>
          </div>

          <div class="col-xl-6 mt-auto ms-xl-auto mx-auto text-xl-end text-center">
            <div class="social d-flex justify-content-xl-end justify-content-center mt-4 mt-xl-auto">
              <a href="https://www.linkedin.com/company/refineinc/" target="blank_" class="me-3">
                <div class="sBox"><img src="assets/materials/linked-in.svg"></div>
              </a>
              <a href="#" target="blank_" class="me-3">
                <div class="sBox"><img src="assets/materials/insta.svg"></div>
              </a>
              <a href="https://www.youtube.com/channel/UCkyVtjw77RO3C6qRN1uDDXg" target="blank_">
                <div class="sBox"><img src="assets/materials/youtube.svg"></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid col-xl-10 subFooter">
      <div class="row">
        <div class="col-xl-6 text-xl-start text-center">
          <p>© Copyright <span id="year"></span> Refine Inc.</p>
        </div>
        <div class="col-xl-6 ms-auto text-xl-end text-center">
          <a href="single-page.html">Privacy</a>
          <a href="single-page.html">Terms of Use</a>
          <a href="single-page.html">Sitemap</a>
        </div>
      </div>
    </div>

    <video playsinline autoplay muted loop poster="assets/materials/footer-bg.png" class="d-xl-block d-none">
      <source src="assets/materials/footer-bg.webm" type="video/mp4">
    </video>
  </footer>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/topbox.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>