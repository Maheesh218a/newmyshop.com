<?php

session_start();

require "connection.php";

?>
<!DOCTYPE html>

<html>

<head>

    <title>Home | iMobile Shop | New Generation Mobile Shop |</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/ishop.png">

</head>

<body class="indexbody">


    <div class="container-fluid">
        <div class="row">

            <?php require "header.php"; ?>

            <hr class="mt-6">


            <div class="col-12 justify-content-center dd">
                <div class="row">
                    <hr class="mb-5">

                    <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>

                    <div class="col-12 col-lg-6">

                        <div class="input-group mb-3 mt-3">
                            <input type="text" id="kw" class="form-control" aria-label="Text input with dropdown button" />

                            <select class="form-select" style="max-width: 250px;" id="c">
                                <option value="0">All Categories</option>

                                <?php

                                $category_rs = Database::search("SELECT * FROM `catergory`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {

                                    $category_data = $category_rs->fetch_assoc();

                                ?>

                                    <option value="<?php echo $category_data["cat_id"]; ?>">
                                        <?php echo $category_data["cat_name"]; ?>
                                    </option>

                                <?php

                                }

                                ?>

                            </select>

                        </div>
                    </div>

                    <div class="col-12 col-lg-2 d-grid">
                        <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);">Search</button>
                    </div>

                    <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href="advancedSearch.php" class="text-decoration-none link-light fw-bold" style="font-size: 20px;">Advanced Search</a>
                    </div>

                </div>
            </div>
            <!-- Clock -->
            <div class="clock">
                <div class="display">
                </div>
            </div>
            <script>
                setInterval(function() {
                    const clock = document.querySelector(".display");
                    let time = new Date();
                    let sec = time.getSeconds();
                    let min = time.getMinutes();
                    let hr = time.getHours();
                    let day = 'AM';
                    if (hr > 12) {
                        day = 'PM';
                        hr = hr - 12;
                    }
                    if (hr == 0) {
                        hr = 12;
                    }
                    if (sec < 10) {
                        sec = '0' + sec;
                    }
                    if (min < 10) {
                        min = '0' + min;
                    }
                    if (hr < 10) {
                        hr = '0' + hr;
                    }
                    clock.textContent = hr + ':' + min + ':' + sec + " " + day;
                });
            </script>
            <!-- Clock -->

            <hr />
            <div class="col-12 col-lg-6 justify-content-center">
                <div class="row mb-2">

                </div>
            </div>

            <div class="col-12" id="basicSearchResult">

                <!-- Carousel -->
                <hr>
                <div class="col-12 carousel slide d-none d-md-block" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2500">
                            <img src="resources/mandama.jpg" class="d-block poster-img0">
                            <div class="carousel-caption d-none d-md-block poster-caption">
                                <h5 class="poster-title" style="color: whitesmoke;">Welcome|</h5>
                                <p class="poster-text" style="color:azure">| iMobile Shop |</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-6">
                </div>
                <!-- Carousel -->
                <div class="row">


                    <!-- Carousel -->

                    <div id="carouselExampleCaptions" class="col-12 carousel slide d-none d-md-block" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="2500">
                                <img src="resources/slider images/apple.jpg" class="d-block poster-img0">
                                <div class="carousel-caption d-none d-md-block poster-caption">

                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="resources/slider images/laptop.jpg" class="d-block poster-img0">
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="resources/slider images/gaming.jpg" class="d-block poster-img0">
                                <div class="carousel-caption d-none d-md-block poster-caption-1">

                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="resources/slider images/camera.jpg" class="d-block poster-img0">
                                <div class="carousel-caption d-none d-md-block poster-caption-1">

                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="resources/slider images/gopro.jpg" class="d-block poster-img0">
                                <div class="carousel-caption d-none d-md-block poster-caption-1">

                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="resources/slider images/traveling.jpg" class="d-block poster-img0">
                                <div class="carousel-caption d-none d-md-block poster-caption-1">

                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Carousel -->

                    <!-- Catergory Name -->

                    <?php

                    $condition = Database::search("SELECT * FROM `condition`  INNER JOIN `product` ON condition.condition_id=product.condition_condition_id");
                    $c_rs = Database::search("SELECT * FROM `catergory`");
                    $c_num = $c_rs->num_rows;

                    for ($y = 0; $y < $c_num; $y++) {

                        $c_data = $c_rs->fetch_assoc();

                    ?>

                        <div class="col-12 mt-3 mb-3">
                            <a href="#" class="text-decoration-none text-dark fs-3 fw-bold bg-body-secondary">
                                <?php echo $c_data["cat_name"]; ?>
                            </a>&nbsp;&nbsp;
                            <a href="seeAll.php" class="text-decoration-none text-dark fs-6 fw-bold bg-danger-subtle">See All&nbsp;&rarr;</a>
                        </div>

                        <!-- Catergory Name -->

                        <!-- products -->
                        <div class="col-12 mb-3">
                            <div class="row border border-primary">

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE 
                                        `cat_id`='" . $c_data['cat_id'] . "' AND `status_id`='1' ORDER BY 
                                        `datetime_added` DESC LIMIT 4 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($x = 0; $x < $product_num; $x++) {
                                            $product_data = $product_rs->fetch_assoc();
                                            $condition_data = $condition->fetch_assoc();

                                        ?>

                                            <div class="card col-12 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                                <?php

                                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                                `product_id`='" . $product_data['id'] . "'");

                                                $img_data = $img_rs->fetch_assoc();

                                                ?>

                                                <a href="<?php if ($product_data["qty"] != 0) {
                                                                echo "singleProductView.php?id=" . ($product_data["id"]);
                                                            } else {
                                                                echo "outOF.php";
                                                            } ?>">
                                                    <img src="<?php
                                                                echo $img_data["img_path"];
                                                                ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" /> </a>
                                                <div class="fw-bold fs-5" style="color: red;"><?php if ($product_data["condition_condition_id"] == '1') {
                                                                                                    echo ("Brand New");
                                                                                                } else if ($product_data["condition_condition_id"] == '2') {
                                                                                                    echo ("Used");
                                                                                                } else {
                                                                                                    echo ("Re-Condition");
                                                                                                } ?></div>
                                                <div class="card-body ms-0 m-0 text-center">
                                                    <a href="<?php if ($product_data["qty"] != 0) {
                                                                    echo "singleProductView.php?id=" . ($product_data["id"]);
                                                                } else {
                                                                    echo "outOF.php";
                                                                } ?>">
                                                        <h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5>
                                                    </a>
                                                    <span class="badge rounded-pill text-bg-info">
                                                        <?php if ($product_data["condition_condition_id"] == '1') {
                                                            echo ("Brand New");
                                                        } else if ($product_data["condition_condition_id"] == '2') {
                                                            echo ("Used");
                                                        } else {
                                                            echo ("Re-Condition");
                                                        } ?>
                                                    </span><br />
                                                    <span class="card-text text-primary">Rs. <?php echo $product_data["price"]; ?> .00</span><br />
                                                    <span class="card-text text-warning fw-bold">
                                                        <?php if ($product_data["qty"] == 0) {
                                                            echo ("Out of Stock");
                                                        } else {
                                                            echo ("In Stock");
                                                        } ?>
                                                    </span><br />
                                                    <span class="card-text text-success fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                                    <a href="<?php if ($product_data["qty"] != 0) {
                                                                    echo "singleProductView.php?id=" . ($product_data["id"]);
                                                                } else {
                                                                    echo "outOF.php";
                                                                } ?>"><button class="col-12 btn btn-success">Buy Now</button></a>
                                                    <button class="col-12 btn btn-dark mt-2" onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                                        <i class="bi bi-cart4 text-white fs-5"></i>
                                                    </button>
                                                    <button class="col-12 btn btn-outline-light mt-2 border border-danger" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);">
                                                        <i class="bi bi-heart-fill text-danger fs-5"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        <?php

                                        }

                                        ?>



                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- products -->

                    <?php

                    }

                    ?>
                </div>

            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>