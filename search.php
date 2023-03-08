<?php
require "database/connection.php";
include "config.php";

$searchCount = 0;
$term = "";
if (isset($_GET["term"])) {
    $term = $_GET["term"];

    $query = $vt->prepare("SELECT * FROM product WHERE name LIKE '%$term%' AND status = 1");
    $query->execute();
    $searchResult = $query->fetchAll(PDO::FETCH_OBJ);

    $searchCount = count($searchResult);
    
}
$query = $vt->prepare("SELECT * FROM product WHERE status = 1 ORDER BY click_count DESC LIMIT 4");
$query->execute();
$mostPopularProduct = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body dir="<?php if ($_SESSION['lang'] == "ar") echo "rtl";
            else echo "ltr"; ?>">

    <?php include 'php/header.php' ?>

<style>

    .searchBox ::placeholder{
        padding-left: 10px;
    }
</style>
    <main>
        <div class="banner">
            <div class="image-area">
                <img class="bannerImg" src="assets/materials/world.png">
            </div>
            <div class="container-fluid col-xl-10">
                <div class="row align-content-center align-items-center">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="index.php"><?php echo $lang["home"] ?></a><a href="#"><?php echo $lang["searchResult"] ?></a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1><?php echo $lang["searchResult"] ?> "<?= $term ?>"</h1>
                            <p></p>
                        </div>
                        <div class="searchBox">
                            <form action="search.php" method="get">
                                <input class="mb-4" type="text" name="term" placeholder="<?php echo $lang['search'] ?>" style="padding: 5px;
    border-radius: 24px;
    width: 60%;
    border-width: 1px;">
                                <button type="submit" class="searchBtn" style="    background-color: black;
    border-radius: 5px;
    padding: 3px;
    width: 10%;"><img src="assets/materials/search-icon.svg"></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4 ms-xl-auto mx-auto text-center mt-5 mt-xl-auto">
                        <img src="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec-1">
            <div class="container-fluid col-xl-10">
                <div class="row list clearfix">

                    <?php
                    if ($searchCount != 0) {
                        foreach ($searchResult as $product) { ?>
                            <div class="col-xl-3 col-lg-4 mt-5 inp">
                                <div class="full-box">
                                    <div class="outbox">
                                        <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $product->category_id ?>">
                                            <img src="<?= $product->image ?>">
                                        </a>

                                    </div>
                                    <div class="description">
                                        <h1><?= $product->name ?></h1>
                                        <p><?= $product->short_description ?></p>
                                    </div>
                                    <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $product->category_id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center"><?php echo $lang['seeMore'] ?>
                                        <hr />
                                    </a>
                                </div>
                            </div>

                        <?php  }
                    } else { ?>
                        <div class="col-xl-12 col-lg-12 mt-5 inp">
                            <h5><?php echo $lang['noResultsWereFoundFor'] ?> "<?= $term ?>".</h5>
                        </div>
                    <?php   }
                   
                    if ($searchCount > 3) {
                        echo '<button class="load-more__btn mt-5 mb-5">'.$lang['seeMore'].'<br/><img src="assets/materials/downron.svg"></button>';
                    }
                    ?>


                </div>
            </div>
        </div>

        <div class="index-sec-2 related">
      <div class="container-fluid col-xl-10 pt-5">
        <div class="row">
          <div class="col-xl-12 text-center seperator">
            <h1 class="mb-4"><?php echo $lang['mostPopulerProducts'] ?></h1>
            <hr>
          </div>
          <ul class="newSlider clearfix mt-5">
            <div class="row justify-content-between pid-1 d-flex">

              <?php
              foreach ($mostPopularProduct as $mprod) {    ?>
                <li class="col-xl-3 mt-5">
                  <a href="prod-in.php?pid=<?= $mprod->id ?>&cid=<?= $mprod->category_id ?>">
                    <div class="flatten">
                      <div class="outbox text-center mx-auto">
                        <img src="<?= $mprod->image ?>">
                      </div>
                      <div class="description mt-xl-0 pt-5">
                        <h1><?= $mprod->name ?></h1>
                        <p>
                          <?php if ($_SESSION['lang'] == "en") {
                            echo $mprod->short_description_en;
                          } else if ($_SESSION['lang'] == "tr") {
                            echo $mprod->short_description_tr;
                          } else if ($_SESSION['lang'] == "ar") {
                            echo $mprod->short_description_ar;
                          }
                          ?>
                        </p>
                        <div class="btn-line"><?php echo $lang['seeDetails'] ?>
                          <hr />
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              <?php   }
              ?>



            </div>
          </ul>
        </div>
      </div>
    </div>



        <?php include 'php/footer.php' ?>
</body>

</html>