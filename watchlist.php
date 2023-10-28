<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Watchlist | iMobile Shop</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="icon" href="resources/watchList.png" />
    </head>
    <?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"]["email"];
    $email = $_SESSION["u"]["email"];
    $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON  
    users.gender_id=gender.id WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `users_email`='" . $email . "'");

    $address_rs = Database::search("SELECT * FROM `users_has_address` INNER JOIN `city` ON  
    users_has_address.city_city_id=city.city_id INNER JOIN 
    `district` ON city.district_district_id=district.district_id 
    INNER JOIN `province` ON 
    district.province_province_id=province.province_id 
    WHERE `users_email`='" . $email . "'");

    $details_data = $details_rs->fetch_assoc();
    $image_data = $image_rs->fetch_assoc();
    $address_data = $address_rs->fetch_assoc();

?>


    <body class="myProductsBody">

        <div class="container-fluid">
            <div class="row">

                <?php include "header.php"; ?>
                <hr class="mt-5">

                <div class="col-12 p-md-3">
                    <div class="col-12">
                        <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                    </div>
                </div>

                <div class="container mb-4">
                    <div class="row">
                        <div class="col-lg-4 pb-5">
                            <!-- Account Sidebar-->
                            <?php
                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $user . "'");
                            $cart_num = $cart_rs->num_rows;

                            $wish_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_email`='" . $user . "'");
                            $wish_num = $wish_rs->num_rows;

                            ?>
                            <div class="author-card pb-3 ">
                                <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip"></a></div>
                                <div class="author-card-profile">
                                    <div class="author-card-avatar"><?php

                                                                    if (empty($image_data["path"])) {
                                                                    ?>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
                                        <?php
                                                                    } else {
                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" />
                                        <?php
                                                                    }

                                        ?>
                                    </div>
                                    <div class="author-card-details">
                                        <h5 class="author-card-name text-lg"><?php echo $details_data["fname"] . " " . $details_data["lname"]; ?></h5><span class="author-card-position"><span class="fw-bold text-black-50"><?php echo $email; ?></span><br>Joined Date: <?php echo $details_data["joined_date"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard">
                                <nav class="list-group list-group-flush">
                                    <a class="list-group-item active" href="watchlist.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div><i class="fa fa-heart mr-1 text-muted"></i>
                                                <div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
                                            </div><span class="badge  bg-dark"><?php echo $wish_num; ?></span>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="cart.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div><i class="bi bi-cart2"></i>
                                                <div class="d-inline-block font-weight-medium text-uppercase">My Cart</div>
                                            </div><span class="badge bg-dark"><?php echo $cart_num; ?></span>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="home.php">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div><i class="bi bi-house-door"></i>
                                                <div class="d-inline-block font-weight-medium text-uppercase">Home Page</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="userProfile.php">
                                        <i class="fa fa-user text-muted"></i>Profile Settings</a><a class="list-group-item" href="#">

                                    </a>

                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-md-block">
                            <img src="resources/apple.jpg" style="height: 400px;">
                        </div>
                        <?php
                        $watclist_rs = Database::search("SELECT * FROM `watchlist` WHERE 
                                `users_email`='" . $_SESSION["u"]["email"] . "'");
                        $watchlist_num = $watclist_rs->num_rows;

                        if ($watchlist_num == 0) {
                        ?>
                            <!-- empty view -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyView"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bold bg-danger">You have no items in your Watchlist yet.</label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                        <a href="home.php" class="btn btn-warning fs-3 fw-bold">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                            <!-- empty view -->

                            <!-- Wishlist-->

                            <?php

                        } else {
                            for ($x = 0; $x < $watchlist_num; $x++) {
                                $watchlist_data = $watclist_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE 
                                                    `id`='" . $watchlist_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();



                                $address_rs = Database::search("SELECT district.district_id AS `did` FROM 
                                    `users_has_address` INNER JOIN `city` ON
                                    users_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                                    city.district_district_id=district.district_id WHERE `users_email`='" . $user . "'");
                                $address_data = $address_rs->fetch_assoc();

                                $condition_rs = Database::search("SELECT * FROM `product` INNER JOIN `condition`
                                                                        ON product.condition_condition_id=condition.condition_id WHERE `id`='" . $product_data['id'] . "'");

                                $condition_data = $condition_rs->fetch_assoc();

                                $color_rs = Database::search("SELECT * FROM `product` INNER JOIN `color` ON product.color_clr_id=color.clr_id WHERE `id`='" . $product_data['id'] . "'");
                                $color_data = $color_rs->fetch_assoc();

                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                        `product_id`='" . $product_data['id'] . "'");
                                $img_data = $img_rs->fetch_assoc();

                                $seller_rs = Database::search("SELECT * FROM `users` WHERE 
                                        `email`='" . $product_data["users_email"] . "'");
                                $seller_data = $seller_rs->fetch_assoc();
                                $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                            ?>

                                <div class="col-12">

                                    <!-- Item-->

                                    <div class="cart-item d-md-flex justify-content-between"><span class="remove-item"><i class="fa fa-times" onclick="removeFromWatchlist(<?php echo $watchlist_data['id']; ?>);"></i></span>
                                        <div class="px-3 my-3">
                                            <a class="cart-item-product" href="#">
                                                <span class="fs-5 fw-bold text-black-50">Seller :</span>
                                                <span class="fs-5 fw-bold text-black"><?php echo $seller ?></span>
                                                <div class="cart-item-product-thumb"><a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"><img src="<?php echo $img_data["img_path"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;"></a></div>
                                                <div class="cart-item-product-info">
                                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>">
                                                        <h3 class="cart-item-product-title"><?php echo $product_data["title"]; ?></h3>
                                                    </a>

                                                    <div class="text-lg text-body font-weight-medium pb-1">Rs. <?php echo $product_data["price"]; ?> .00</div><span>Availability: <span class="text-success font-weight-medium"><?php if ($product_data["qty"] == 0) {
                                                                                                                                                                                                                                    echo ("Out of Stock");
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo ("In Stock");
                                                                                                                                                                                                                                } ?></span></span>
                                                    <span class="fw-bold text-black">Colour : <?php echo $color_data["clr_name"]; ?></span>
                                                    <span class="fw-bold text-black">Condition : <?php echo $condition_data["condition_name"]; ?></span>
                                                    <span class="fw-bold text-black-50">Quantity :</span>
                                                    <span class="fw-bold text-black"><?php echo $product_data["qty"]; ?> Items Available</span>

                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 mt-5">
                                            <div class="card-body d-lg-grid">
                                                <a href="<?php if ($product_data["qty"] != 0) {
                                                                echo "singleProductView.php?id=" . ($product_data["id"]);
                                                            } else {
                                                                echo "outOF.php";
                                                            } ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                <a href="#" onclick="addToCart(<?php echo $product_data['id']; ?>);" class="btn btn-outline-warning mb-2">Add to Cart</a>
                                                <a href="#" onclick="removeFromWatchlist(<?php echo $watchlist_data['id']; ?>);" class="btn btn-outline-danger">Remove</a>
                                            </div>
                                        </div>

                                    </div><?php }
                                    } ?>
                            <!-- Item -->
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" checked="" id="inform-me">
                                <label class="custom-control-label" for="inform-me">Inform me when item from my wishlist is available</label>
                            </div>
                                </div>

                    </div>
                </div>


            <?php
        } else {
            include "header.php";
            ?>
                <hr class="mt-5">
                <div class="col-12 mt-auto text-center">
                    <div class="row text-center">
                        <div class="col-12 bg-body mt-5 mb-5 text-center">
                            <span class="text-center text-bg-warning fw-bolder " style="font-size: xx-large;">
                                Hello Welcome to iMobile shop <br> Your are in iMobile shop <br> Cart Page <br> iMobile.lk
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-auto text-center">
                    <div class="row text-center">
                        <div class="col-12 bg-body mt-5 mb-5 text-center">
                            <span class="text-center text-bg-light fw-bolder" style="font-size: xx-large;">
                                Now You are Signout our Shop <br> <br> If you want to see Your products <br>Please Sign In and Try again
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <div class="row text-center">
                        <span class="text-center fw-bolder" style="font-size: xx-large;">
                            ___ Thank You Very Much ___
                        </span>
                    </div>
                </div> <br><br>
                <div class="col-12 text-center">
                    <div class="row text-center">
                        <span class="text-center fw-bolder" style="font-size: xx-large;">
                            <button class="btn btn-warning"><a href="index.php" class="text-decoration-none">Back to Home Page</a></button>
                        </span>
                    </div>
                </div><br>
                <div class="col-12 text-center">
                    <div class="row text-center">
                        <span class="text-center fw-bolder" style="font-size: xx-large;">
                            <button class="btn btn-primary"><a href="login.php" class="text-decoration-none" style="color: white;">Log In </a></button>
                        </span>
                    </div>
                </div>

            <?php include "footer.php" ;
        }
            ?>

            <?php require "header.php"; ?>
    </body>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>

    </html>