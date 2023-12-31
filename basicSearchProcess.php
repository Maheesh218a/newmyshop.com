<?php

require "connection.php";

$text = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($text) && $select == 0) {

    $query .= " WHERE `title` LIKE '%" . $text . "%'";
} else if (empty($text) && $select != 0) {

    $query .= " WHERE `cat_id`='" . $select . "'";
} else if (!empty($text) && $select != 0) {

    $query .= " WHERE `title` LIKE '%" . $text . "%' AND `cat_id`='" . $select . "'";
}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row justify-content-center">

            <?php

            if ("0" != $_POST["page"]) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 4;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " 
                                            OFFSET " . $page_results . " ");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                                    `product_id`='" . $selected_data["id"] . "'");
                $product_img_data = $product_img_rs->fetch_assoc();
                $product_data = $product_rs->fetch_assoc();
                
            ?>

                <!-- card -->

                <div class="card col-12 col-lg-2 mt-2 mb-2" style="width: 18rem;">
                <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"><img src="<?php echo $product_img_data["img_path"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" /></a>
                    <div class="card-body ms-0 m-0 text-center">
                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"><h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5></a>
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
                                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"><button class="col-12 btn btn-success">Buy Now</button></a>
                                                    <button class="col-12 btn btn-dark mt-2">
                                                        <i class="bi bi-cart4 text-white fs-5"></i>
                                                    </button>
                                                    <button class="col-12 btn btn-outline-light mt-2 border border-danger" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);">
                                                        <i class="bi bi-heart-fill text-danger fs-5"></i>
                                                    </button>
                                                </div>
                </div>

                <!-- card -->

            <?php
            }

            ?>

        </div>
    </div>

    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php

                for ($y = 1; $y <= $number_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>