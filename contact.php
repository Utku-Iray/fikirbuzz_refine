<?php
require "database/connection.php";
include "config.php";
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

  <?php include 'php/header.php' ?>


  <main>
    <div class="banner dark">
      <div class="image-area">
        <img class="bannerImg" src="assets/materials/contact-cover.png">
      </div>
      <div class="container-fluid col-xl-10">
        <div class="row align-content-center align-items-center">
          <div class="col-xl-7">
            <div class="breadcrumb" data-aos="fade-in">
              <a href="#">Products</a><a href="#">Contact</a>
            </div>
            <div class="title" data-aos="fade-right">
              <h1>CONTACT</h1>
              <p>In addition to being Lanner’s authorized distributor in the Middle East Türkiye and Pakistan, we also offer sourcing
                services for PCB design & manufacturing.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 pb-0 contactArea pb-5">
      <div class="container-fluid col-xl-9">
        <form class="col-xl-10 mx-auto row mb-5">
          <div class="form-group col-xl-4 mb-2 mb-xl-0">
            <input type="email" class="form-control" placeholder="E-Mail">
            <img src="assets/materials/env-mail.svg">
          </div>
          <div class="form-group col-xl-4 mb-2 mb-xl-0">
            <input type="text" class="form-control" placeholder="Name Surname">
            <img src="assets/materials/sign.svg">
          </div>
          <div class="form-group col-xl-4 mb-2 mb-xl-0">
            <input type="number" class="form-control" placeholder="Phone">
            <img src="assets/materials/phone-env.svg">
          </div>
          <div class="form-group col-xl-12 mt-3 ta-icon">
            <textarea rows="8" class="form-control p-3 ps-3" placeholder="Message"></textarea>
            <img src="assets/materials/paragraph.svg">
          </div>
          <div class="form-group buttonArea mt-3 d-flex justify-content-between align-content-center align-items-center">
            <button type="submit" class="text-start ps-3">SEND</button>
            <div class="prefix"><img src="assets/materials/arrow-right.svg"></div>
          </div>
        </form>
      </div>
    </div>

    </div>

    <div class="mapSelection">
      <div class="container-fluid">
        <div class="row">
          <div class="stable">
            <div class="featured-device bg-transparent">
              <div class="col-xl-12 my-auto mx-auto pt-5 pb-5">
                <div class="accordion" id="accordionExample">
                  <?php
                  foreach ($contactResult as $contact) {  ?>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading<?= $contact->contact_id ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $contact->contact_id ?>" aria-expanded="true" aria-controls="collapse<?= $contact->contact_id ?>">
                          <?= $contact->contact_title ?>
                        </button>
                      </h2>
                      <div id="collapse<?= $contact->contact_id ?>" class="accordion-collapse collapse <?php if ($contact->contact_id == 1) echo " show" ?> " aria-labelledby="heading<?= $contact->contact_id ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body d-flex justify-content-between">
                          <div class="col-11 ms-auto text-end">
                            <h5 class="mb-4"><?= $contact->contact_address ?></h5>

                            <a href="mailto:<?= $contact->contact_mail ?>">
                              <h5><img src="assets//materials/env-mail.svg" width="16px" class="me-2"><?= $contact->contact_mail ?></h5>
                            </a>
                            <a href="tel:<?= $contact->contact_phone ?>">
                              <h5><img src="assets//materials/phone-env.svg" width="14px" class="me-2"><?= $contact->contact_phone ?>&nbsp;</h5>
                            </a>

                          </div>
                        </div>
                      </div>
                    </div>
                  <?php  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <div class="mapsArea">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.071762615664!2d29.00901981515844!3d41.06742397929473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab7272b56ea45%3A0x7e5abcf92e97bfe6!2sRefine%20-%20Lanner%20Authorized%20Distributor!5e0!3m2!1str!2str!4v1669857585904!5m2!1str!2str" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    
  <?php include 'php/footer.php' ?>

</body>

</html>