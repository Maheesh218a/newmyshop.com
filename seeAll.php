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
            <hr class="mt-5"> <hr class="mt">

            <?php

            $category_rs = Database::search("SELECT * FROM `catergory`");
            $category_num = $category_rs->num_rows;

            for ($x = 0; $x < $category_num; $x++) {

                $category_data = $category_rs->fetch_assoc();

            ?>

                
            <?php

            }

            ?>

            <?php

            $condition = Database::search("SELECT * FROM `condition`  INNER JOIN `product` ON condition.condition_id=product.condition_condition_id");
            $c_rs = Database::search("SELECT * FROM `catergory`");
            $c_num = $c_rs->num_rows;

            for ($y = 0; $y < $c_num; $y++) {

                $c_data = $c_rs->fetch_assoc();

            ?> <!-- Catergory Name -->

                <!-- products -->
                <div class="col-12 mb-3">
                    <div class="row border border-primary">

                        <div class="col-12">
                            <div class="row justify-content-center gap-2">


                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE 
                `cat_id`='" . $c_data['cat_id'] . "' AND `status_id`='1' ORDER BY 
                `datetime_added` DESC");

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