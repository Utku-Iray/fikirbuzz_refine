<?php
require "database/connection.php";

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
              <h1>PCB Design & Manufacturing</h1>
              <p>In addition to being Lanner’s authorized distributor in the Middle East, we also offer sourcing
                services for PCB design & manufacturing.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="index-sec-1 pb-0">
      <div class="container-fluid col-xl-9">
        <div class="textArea pb-5 row">
          <div class="col-md-12">
            <?= $pcbDesign[0]->g_main_content_en ?>
          </div>
        </div>
      </div>
    </div>

    

  <?php include 'php/footer.php' ?>

</body>

</html>