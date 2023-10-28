<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href=" https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/cart_i.png" />
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

        <main class="page cartBody">
            <section class="shopping-cart cartBody"><?php require "header.php"; ?>
                <div class="container">
                    <div class="block-heading">
                        <hr>
                        <h2 class="fw-bold fs-1 text-bg-primary">Shopping Cart</h2>
                        <p class="fw_bold fs-4 text-bg-warning">The customer is very important, the customer will be followed by the customer. Now, as an urn, I have no right to be in possession of property..</p>
                    </div>
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
                                <div class="col-md-12 col-lg-8">
                                    <div class="items"><span class="col-12 text-center fw-bold fs-2">Your cart items - (<?php echo $cart_num; ?>)</span>
                                        <hr>
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
                                            <div class="product"><span class="col-12 fs-3 fw-bold text-center">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="<?php echo $img_data["img_path"]; ?>" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="info">
                                                                <div class="row">
                                                                    <div class="col-md-5 product-name">
                                                                        <div class="product-name">
                                                                            <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>">
                                                                                <h5 class="card-title fw-bold"><?php echo $product_data["title"]; ?></h5>
                                                                            </a>
                                                                            <div class="product-info">
                                                                                <div>Seller: <span class="value"><?php echo $seller ?></span></div>
                                                                                <div>Colour: <span class="value"><?php echo $color_data["clr_name"]; ?></span></div>
                                                                                <div>Condition: <span class="value"><?php echo $condition_data["condition_name"]; ?></span></div>
                                                                                <div>Available Items: <span class="value"><?php echo $product_data["qty"]; ?></span></div>
                                                                            </div>
                                                                        </div><span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                                        <span class="fw-bold text-black fs-5">Rs <?php
                                                                                                                    if ($address_data["did"] == 5) {
                                                                                                                        $ship = $product_data["delivery_fee_colombo"];
                                                                                                                        echo $ship;
                                                                                                                    } else {
                                                                                                                        $ship = $product_data["delivery_fee_other"];
                                                                                                                        echo $ship;
                                                                                                                    }
                                                                                                                    .00 ?></span>


                                                                    </div>
                                                                    <div class="col-md-3" style="background-color:wheat">
                                                                        <span>Quantity : </span>
                                                                        <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[1-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />

                                                                        <div class="position-absolute qty-buttons" style="background-color:white;">
                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                                            border border-1 qty-inc">
                                                                                <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                            </div>
                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                                            border border-1 qty-dec">
                                                                                <i class="bi bi-caret-down-fill text-primary fs-5" onclick='qty_dec();'></i>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-3 price">
                                                                        <span class="fw-bold fs-5 text-black-50">RS. <?php echo $product_data["price"]  + $ship ?> .00</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card-body d-grid">
                                                    <br><a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"><button class="btn btn-outline-success col-12" type="submit" id="payhere-payment">Pay Now</button></a> <a class="btn btn-outline-danger mb-2" onclick="removeFromCart(<?php echo $cart_data['id']; ?>);">Remove Item</a>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="summary" style="background-color:wheat">
                                        <h3>Summary</h3>
                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-6 mb-3">
                                            <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="fs-6 fw-bold">Cost for items</span>
                                        </div>

                                        <div class="col-6 text-end mb-3">
                                            <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="fs-6 fw-bold">Shipping Cost</span>
                                        </div>

                                        <div class="col-6 text-end">
                                            <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <hr />
                                        </div>qty_input

                                        <div class="col-12 mt-2 text-end">
                                            <span class="fs-4 fw-bold">Full Total</span>
                                        </div>

                                        <div class="col-12 mt-2 text-end">
                                            <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                                        </div>
                                        <button class="btn btn-outline-primary text-uppercase" type="submit" id="payhere-payment" onclick="buynows();">Checkout
                                        </button>
                                        <a href="home.php"><button class="btn btn-outline-dark text-uppercase" type="submit">Back to Home
                                            </button></a>
                                        <button class="btn btn-outline-danger text-uppercase" type="submit" onclick="clearSort();">Clear
                                        </button>
                                    </div>
                                </div> <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
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

    <?php  require "footer.php";
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