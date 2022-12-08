<?php
require "database/connection.php";



$query = $vt->prepare("SELECT * FROM blog WHERE sort = 5 ORDER BY created_at ASC");
$query->execute();
$blogSort = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">


<?php include 'php/head.php' ?>

<body class="wrapper">
  <?php include 'php/header.php' ?>



  <main>
    <div class="mainSlider">
      <div class="container-fluid">
        <div class="row">
          <div class="slide--content">
            <div class="slider--trigger col-xl-11">
              <div class="slide--desc col-xl-7 col-11">
                <div class="searchBox">
                  <input class="mb-4" type="text" placeholder="Type Something...">
                  <button type="submit" class="searchBtn"><img src="assets/materials/search-icon.svg"></button>
                </div>
                <div class="main-pusher">
                  <div class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4">17 years of experience in hardware and information security service…</h1>
                      </div>
                      <a href="single-blog.php?url=who-is-refine-what-benefits-does-refine-provide-for-you" class="btn-view"><span>See Details
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4">Your solution partner for all hardware, network and security solutions your business needs…</h1>
                      </div>
                      <a href="single-blog.php" class="btn-view"><span>See Details
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4">Lanner's authorized distributor in the Middle East, Türkiye and Pakistan…</h1>
                      </div>
                      <a href="https://www.lannerinc.com/contact/channel-partners" class="btn-view"><span>See Details
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4">The easiest logistics and transportation solutions…</h1>
                      </div>
                      <a href="single-blog.php" class="btn-view"><span>See Details
                          <hr>
                        </span></a>
                    </div>
                  </div>
                  <div class="push-it">
                    <div class="slide--incontent">
                      <div class="title mb-5">
                        <h1 class="mb-4">Exclusive offers for you to buy the best quality Lanner products at the most special prices…</h1>
                      </div>
                      <a style="cursor: pointer;"class="btn-view form"><span>See Details
                          <hr>
                        </span></a>
                    </div>
                  </div>
                </div>
                <div class="swiper-btns">
                  <button type="button" class="btn btn-primary btn-prev"><i class="fa-solid fa-chevron-left me-3"></i></button>
                  <button type="button" class="btn btn-primary btn-next"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
              </div>
              <div class="next--slide d-xl-flex d-none justify-content-end col-xl-4 ms-auto">
                <div class="slide--incontent trigs-m">
                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-flex align-content-center align-items-center"><span>17 Years of Experience</span>
                      <img class="ms-3" src="assets/materials/slider-bg.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-flex align-content-center align-items-center"><span>For Your Busniess Need</span>
                      <img class="ms-3" src="assets/materials/sec-2-bg.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span>Lanner</span>
                      <img class="ms-3" src="assets/materials/slide-2.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span>Logistics Solutions</span>
                      <img class="ms-3" src="assets/materials/slide-3.jpg"></a>
                  </div>

                  <div class="next-s my-auto pb-3 pt-3 d-xl-flex d-none justify-content-end">
                    <a href="#" class="p-0 my-auto d-xl-flex d-none align-content-center align-items-center"><span>Exclusive Offers For you</span>
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

    <div class="index-sec-0 pt-xl-0 pt-5 pb-5 pb-xl-0">
      <div class="container-fluid col-xl-10 mx-auto">
        <div class="row">
          <div class="col-xl-3"></div>
          <div class="col-xl-9">
            <div class="title">
              <h2 data-aos="fade-right">Innovating The Solutions You Need Tomorrow, Today</h2>
              <p data-aos="fade-in">Cras ac tortor at magna porttitor consequat quis a lacus. Suspendisse maximus purus
                vestibulum, tempor
                tortor vel, dignissim tortor. Sed sed commodo orci. Nullam eget lectus aliquam, egestas nisl non,
                vehicula
                elit.</p>
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
                        <h3>INDUSTRIAL IOT</h3>
                        <p>Use our network of interconnected smart devices to build systems that monitor, collect, exchange and analyze your data.</p>
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
                        <h3>IT NETWORK SECURITY</h3>
                        <p>Protect your company's infrastructure by preventing a wide variety of potential threats from infiltrating and spreading into your corporate network with our network security solutions. </p>
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
                        <h3>SD-WAN & uCPE</h3>
                        <p>Upload different network features to devices in different locations with SD-WAN, which provides balancing, optimization and visibility.</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="clearfix">
                <a >
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/edge-cloud.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3>EDGE CLOUD </h3>
                        <p>By implementing cloud computing at the user-generated edge, reduce latency and significantly optimize resource utilization with better performance. </p>
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
                        <h3>EDGE AI </h3>
                        <p>Devices process data locally, enabling you to make real-time operating decisions. Reduce your data communication costs by creating a faster and safer workspace with this application.</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="clearfix">
                <a >
                  <div class="inbox">
                    <img src="assets/materials/homepage-box/ot-network-security.png">
                    <div class="desc p-4">
                      <div class="in-content">
                        <h3>OT NETWORK SECURİTY </h3>
                        <p>Easily read and monitor your data by controlling the production equipment used at every stage of industrial production.</p>
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
                        <h3>PCB DESIGN & MANUFACTURING </h3>
                        <p>Use sourcing services for PCB design and manufacturing as well as being Lanner's authorized distributor in the Middle East, Türkiye and Pakistan.</p>
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
    <div class="index-sec-1">
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <ul class="prodFilter">
            <li data-filter="pid-1" class="pid-1 onTrigger active-prod">Network Appliances</li>
            <li data-filter="pid-2" class="pid-2">Telecom Datacenter Appliances</li>
            <li data-filter="pid-3" class="pid-3">Industrial Communication Platforms</li>
            <li data-filter="pid-4" class="pid-4">Vehicle Computers</li>
            <li data-filter="pid-5" class="pid-5">Embedded Box PCs</li>
            <li data-filter="pid-6" class="pid-6">Extension Modules</li>
          </ul>

          <ul class="prodSlider clearfix" data-aos="fade-up">


            <li class="pid-3 pid-1 pid-2 pid-4 pid-5 pid-6">
              <div class="outbox">
                <a href="prod-in.php">
                  <div class="prod-tag">NCA-0123</div>
                </a>
                <!-- <div class="prod-tag">NCA-0123</div> -->
                <img src="assets/materials/network-device.png">
              </div>
              <div class="description">
                <h1>DESKTOP NETWORK APPLIANCES</h1>
                <p>Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Fusce
                  est sapien, accumsan non efficitur
                  faucibus, suscipit ac mi.</p>
              </div>
              <a href="prod-in.php" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                MORE
                <hr />
              </a>
            </li>



          </ul>
        </div>
      </div>
    </div>

    <div class="index-sec-2">
      <div class="container-fluid">
        <div class="row sep">
          <div class="col-xl-1 p-0"></div>
          <div class="col-xl-11 p-0 sep-2">
            <div class="col-4" style="float: right;">
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
              <?php foreach ($blogSort as $sort) { ?>
                <li class="col-xl-6">
                  <a href="single-blog.php">
                    <div class="flatten d-xl-flex">
                      <div class="outbox me-xl-4">
                        <img src="<?= $sort->image  ?>">
                      </div>
                      <div class="description mt-xl-0 mt-4">
                        <h1><?= $sort->title ?></h1>
                        <p><?= $sort->short_content ?></p>
                        
                      </div>
                    </div>
                  </a>
                </li>
              <?php }  ?>


            </div>


          </ul>
          <div class="col-xl-12 text-center mt-5 position-relative mb-5 d-flex justify-content-center">
            <a href="blog-page.php" class="btn-loader">See All <img class="ms-2" src="assets/materials/smb.svg"></a>
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



    <!--Push Button-->
    <a target="blank_" href="https://api.whatsapp.com/send?phone=+905000000000&text=Merhabalar, Refine Inc. ayrıcalıklarından yararlanmak istiyorum." class="pusher d-xl-flex d-none">
      <img src="assets/materials/chat.svg">
    </a>
    <!--Push Button-->
  </main>

  <?php include 'php/footer.php' ?>
</body>

</html>