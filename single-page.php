<?php
require "database/connection.php";
include "config.php";

$query = $vt->prepare("SELECT * FROM general WHERE g_page_url='pcb-design'");
$query->execute();
$pcbDesign = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

  <?php include 'php/header.php' ?>


  <main>
    <div class="banner dark">
      <div class="image-area">
        <img class="bannerImg" src="assets/materials/single-cover.png">
      </div>
      <div class="container-fluid col-xl-10">
        <div class="row align-content-center align-items-center">
          <div class="col-xl-7">
            <div class="title" data-aos="fade-right">
              <h1><?php echo $lang['pcbDesignPageTitle'] ?></h1>
              <p><?php echo $lang['pcbDesignPageShortDescription'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea pb-5 row">
          <div class="col-md-12">

            <?php if ($_SESSION['lang'] == "en") {
              echo $pcbDesign[0]->g_main_content_en;
            } else if ($_SESSION['lang'] == "tr") {
              echo $pcbDesign[0]->g_main_content_tr;
            } else if ($_SESSION['lang'] == "ar") {
              echo $pcbDesign[0]->g_main_content_ar;
            }
            ?>
          </div>
        </div>
      </div>
    </div>



    <?php include 'php/footer.php' ?>

</body>

</html>