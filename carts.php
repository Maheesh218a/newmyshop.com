<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href=" https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/cart_i.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>JavaScript/Vue JS Shopping Cart Example</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="css/demo.css">

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

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

?>


    <body>
        <header class="intro">
            <h1>JavaScript/Vue JS Shopping Cart Example</h1>
            <p>A simple Vue JS shopping cart.</p>

            <div class="action">
                <a href="https://www.codehim.com/collections/javascript-shopping-cart-examples-with-demo/" title="Back to download and tutorial page" class="btn back">Back to Tutorial</a>
            </div>
        </header>

        <div class="col-12">
            <!-- Author -->
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
                                    <div class="d-inline-block font-weight-medium text-uppercase">My Cart</div>
                                </div><span class="badge badge-secondary"><?php echo $cart_num; ?></span>
                            </div>
                        </a>
                        <a class="list-group-item" href="watchlist.php">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="bi bi-box2-heart-fill"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">My Watchlist</div>
                                </div><span class="badge badge-secondary"><?php echo $wish_num; ?></span>
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
            <!-- Author -->

            <div class="content">
                <div class="row">
                    <?php
                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $user . "'");
                    $cart_num = $cart_rs->num_rows;

                    if ($cart_num == 0) {
                    ?>
                        <!-- Empty View -->
                        <div class="col-12" id="cartSearchResult">
                            <div class="row">
                                <div class="col-12 emptyCart"></div>
                                <div class="col-12 text-center mb-2">
                                    <label class="form-label fs-1 fw-bold">
                                        You have no items in your Cart yet.
                                    </label>
                                </div>
                                <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                    <a href="home.php" class="btn btn-outline-danger fs-3 fw-bold">
                                        Start Shopping
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Empty View -->
                    <?php
                    } else {
                    ?>

                        <main>
                            <!-- Start DEMO HTML (Use the following code into your project)-->
                            <header id="site-header">
                                <div class="container">
                                    <h1>Shopping cart <span>[</span> <em>by CodeHim</em> <span class="last-span is-open">]</span></h1>
                                </div>
                            </header>

                            <div class="container">

                                <section id="cart">
                                    <?php
                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE 
                                                    `id`='" . $cart_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                        $address_rs = Database::search("SELECT district.district_id AS `did` FROM 
                                    `users_has_address` INNER JOIN `city` ON
                                    users_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                                    city.district_district_id=district.district_id WHERE `users_email`='" . $user . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        $condition_rs = Database::search("SELECT * FROM `product` INNER JOIN `condition`
                                                                        ON product.condition_condition_id=condition.condition_id WHERE `id`='" . $product_data['id'] . "'");

                                        $condition_data = $condition_rs->fetch_assoc();

                                        $color_rs = Database::search("SELECT * FROM `product` INNER JOIN `color` ON product.color_clr_id=color.clr_id WHERE  `id`='" . $product_data['id'] . "'");
                                        $color_data = $color_rs->fetch_assoc();

                                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                        `product_id`='" . $product_data['id'] . "'");
                                        $img_data = $img_rs->fetch_assoc();

                                        $ship = 0;



                                        if ($address_data["did"] == 5) {
                                            $ship = $product_data["delivery_fee_colombo"];
                                            $shipping = $shipping + $product_data["delivery_fee_colombo"];
                                        } else {
                                            $ship = $product_data["delivery_fee_other"];
                                            $shipping = $shipping + $product_data["delivery_fee_other"];
                                        }

                                        $seller_rs = Database::search("SELECT * FROM `users` WHERE 
                                                                    `email`='" . $product_data["users_email"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["fname"] . " " . $seller_data["lname"];
                                    ?>
                                        <article class="product">
                                            <header>
                                                <a class="remove">
                                                    <img src="<?php echo $img_data["img_path"]; ?>" class="img-fluid rounded-start">

                                                    <h3>Remove product</h3>
                                                </a>

                                            </header>

                                            <div class="content">
                                                <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>">
                                                    <h1><?php echo $product_data["title"]; ?></h1>
                                                </a>
                                                <div>Seller: <span class="value"><?php echo $seller ?></span></div>
                                                <div>Condition: <span class="value"><?php echo $condition_data["condition_name"]; ?></span></div>
                                                <div>Available Items: <span class="value"><?php echo $product_data["qty"]; ?></span></div>

                                                <div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"><?php echo $color_data["clr_name"]; ?></div>
                                                <div style="top: 43px" class="type small"></div>
                                            </div> 

                                            <footer class="content">
                                                <span class="qt-minus">-</span>
                                                <span class="qt">1</span>
                                                <span class="qt-plus">+</span>

                                                <h2 class="full-price">
                                                    100.00€
                                                </h2>

                                                <h2 class="price">
                                                    100.00€
                                                </h2>
                                            </footer>
                                        </article>
                                        <br class="mt-5">
                                    <?php } ?>
                                </section>

                            </div>

                            <footer id="site-footer">
                                <div class="container clearfix">

                                    <div class="left">
                                        <h2 class="subtotal">Subtotal: <span>163.96</span>€</h2>
                                        <h3 class="tax">Taxes (5%): <span>8.2</span>€</h3>
                                        <h3 class="shipping">Shipping: <span>5.00</span>€</h3>
                                    </div>

                                    <div class="right">
                                        <h1 class="total">Total: <span>177.16</span>€</h1>
                                        <a class="btn">Checkout</a>
                                    </div>

                                </div>
                            </footer>
                            <!-- END EDMO HTML (Happy Coding!)-->
                        </main>
                    <?php } ?>
                </div>

                <footer class="credit">Author: 若邪 - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
                <script src="./js/script.js"></script>


    </body>

<?php } ?>

</html>