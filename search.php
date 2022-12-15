<?php
require "database/connection.php";

$searchCount = 0;
$term = "";
if (isset($_GET["term"])) {
    $term = $_GET["term"];

    $query = $vt->prepare("SELECT * FROM product WHERE name LIKE '%$term%' AND status = 1");
    $query->execute();
    $searchResult = $query->fetchAll(PDO::FETCH_OBJ);

    $searchCount = count($searchResult);
}
?>
<!doctype html>
<html lang="en">

<?php include 'php/head.php' ?>


<body>

    <?php include 'php/header.php' ?>


    <main>
        <div class="banner">
            <div class="image-area">
                <img class="bannerImg" src="assets/materials/world.png">
            </div>
            <div class="container-fluid col-xl-10">
                <div class="row align-content-center align-items-center">
                    <div class="col-xl-7">
                        <div class="breadcrumb" data-aos="fade-in">
                            <a href="index.php">Home</a><a href="#">Search Result</a>
                        </div>
                        <div class="title" data-aos="fade-right">
                            <h1>Search Result</h1>
                            <p></p>
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
                                    <a href="prod-in.php?pid=<?= $product->id ?>&cid=<?= $product->category_id ?>" class="btn-open d-flex justify-content-around align-content-center align-items-center">SEE MORE
                                        <hr />
                                    </a>
                                </div>
                            </div>

                        <?php  }
                    } else { ?>
                        <div class="col-xl-12 col-lg-12 mt-5 inp">
                            <h5>No results were found for "<?= $term ?>".</h5>
                        </div>
                    <?php   }
                    if ($searchCount > 3) {
                        echo '<button class="load-more__btn mt-5 mb-5">SEE MORE<br /><img src="assets/materials/downron.svg"></button>';
                    }
                    ?>


                </div>
            </div>
        </div>

        <div class="index-sec-2 related">
            <div class="container-fluid col-xl-10 pt-5">
                <div class="row">
                    <div class="col-xl-12 text-center seperator">
                        <h1 class="mb-4">Most Popular Products</h1>
                        <hr>
                    </div>
                    <ul class="newSlider clearfix mt-5">
                        <div class="row justify-content-between pid-1 d-flex">
                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.html">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-1.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Fusce
                                                est sapien, accumsan non efficitur
                                                faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.html">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-2.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Fusce
                                                est sapien, accumsan non efficitur
                                                faucibus, suscipit ac fsdfsdfsdffffdsfsdfdsfdsfsdfds.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.html">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-3.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Fusce
                                                est sapien, accumsan non efficitur
                                                faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="col-xl-3 mt-5">
                                <a href="prod-in.html">
                                    <div class="flatten">
                                        <div class="outbox text-center mx-auto">
                                            <img src="assets/materials/prod-4.png">
                                        </div>
                                        <div class="description mt-xl-0 pt-5">
                                            <h1>NCI-200</h1>
                                            <p>Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Fusce
                                                est sapien, accumsan non efficitur
                                                faucibus, suscipit ac mi.</p>
                                            <div class="btn-line">See Details
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        

    <?php include 'php/footer.php' ?>
</body>

</html>