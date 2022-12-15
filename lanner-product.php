<?php
require "database/connection.php";

if (isset($_GET["mcid"])) {
    $mcid = $_GET["mcid"];
    $query = $vt->prepare("SELECT * FROM sub_category WHERE category_id = '$mcid'");
    $query->execute();
    $subCategoryListLanner = $query->fetchAll(PDO::FETCH_OBJ);
}


$query = $vt->prepare("SELECT * FROM category WHERE id='$mcid'");
$query->execute();
$mainCategoryResultLanner = $query->fetchAll(PDO::FETCH_OBJ);



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
                <div class="row align-content-center align-items-center" style="min-height: 300px !important;">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="#">Products</a><a href="#">Category</a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1><?= $mainCategoryResultLanner[0]->name ?></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec-1" style="padding-top: 0 !important;">
            <div class="container-fluid col-xl-10">
                <div class="row list-product clearfix">

                    <?php
                    foreach ($subCategoryListLanner as $singleSubCat) { ?>
                        <div class="col-xl-4 col-lg-4 mt-5 inp">
                            <div class="full-box">
                                <div class="outbox">

                                    <img src="<?= $singleSubCat->image ?>">
                                </div>
                                <div class="description">
                                    <h1><?= $singleSubCat->name ?></h1>
                                    <p><?= $singleSubCat->description ?></p>
                                </div>
                                <a href="prod-list.php?cid=<?= $singleSubCat->id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE
                                    MORE
                                    <hr />
                                </a>
                            </div>
                        </div>
                    <?php   }
                    ?>



                </div>
            </div>
        </div>



        

    <?php include 'php/footer.php' ?>

</body>

</html>