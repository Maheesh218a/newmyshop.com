<?php
session_start();
require "connection.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Bootstrap Example</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0 bd-example-row bd-example-row-flex-cols">

  <!-- Example Code -->

  <div class="container">
    <div class="row align-items-start">
      <div class="col-8 text-center border-end">
        <h1><b>User Details</b></h1>
        <br>
        <hr>
        <br>
        <div class="row col-12">
          <?php
          $email = $_SESSION["u"]["email"];
          $details_rs = Database::search("SELECT * FROM users INNER JOIN gender ON gender.id = users.gender_id WHERE `email` = '" . $email . "'; ");
          $address_rs = Database::search("SELECT * FROM city INNER JOIN users_has_address ON users_has_address.city_city_id = city.city_id INNER JOIN district ON district.district_id = city.district_district_id INNER JOIN province
          ON province.province_id = district.province_province_id WHERE `users_email` =  '" . $email . "';");
          $user_detauils_data = $details_rs->fetch_assoc();
          $address_data = $address_rs->fetch_assoc();

          ?>

          <div class="col-6">
            <label class="form-label"><b>First Name</b></label>
            <input class="form-control" type="text" id="fname" value="<?php echo $user_detauils_data["fname"]; ?>" />
          </div>
          <div class="col-6">
            <label class="form-label"><b>Last Name</b></label>
            <input class="form-control" type="text" id="lname" value="<?php echo $user_detauils_data["lname"]; ?>" />
          </div>
          <div class="row col-12">
            <div class="col-6">
              <label class="form-label"><b>Email</b></label>
              <input class="form-control" type="text" id="lname" value="<?php echo $user_detauils_data["email"]; ?>" />
            </div>
            <div class="col-6">
              <label class="form-label"><b>Mobile</b></label>
              <input class="form-control" type="text" id="lname" value="<?php echo $user_detauils_data["mobile"]; ?>" />
            </div>

          </div>
        </div>
        <br>
        <hr>

        <br>
        <div class="row col-12 text-center">
          <h1><b>Delevery Details</b></h1>
          <br>
          <hr>
          <br>

          <div class="row col-12">
            <?php

            if (empty($address_data["line1"])) {
            ?>
              <div class="col-6">
                <label class="form-label"> <b>Address line 01</b></label>
                <input type="text" id="line1" class="form-control" placeholder="Enter Address Line 01." />
              </div>
            <?php

            } else {
            ?>
              <div class="col-6">
                <label class="form-label"> <b>Address line 01</b></label>
                <input type="text" id="line1" class="form-control" value="<?php echo $address_data["line1"]; ?>" />
              </div>

            <?php
            }

            ?>




            <?php

            if (empty($address_data["line2"])) {
            ?>
              <div class="col-6">
                <label class="form-label"> <b>Address line 02</b></label>
                <input type="text" id="line2" class="form-control" placeholder="Enter your Address line 2.">
              </div>

            <?php
            } else {
            ?>
              <div class="col-6">
                <label class="form-label"> <b>Address line 02</b></label>
                <input type="text" id="line2" class="form-control" value="<?php echo $address_data["line2"] ?>">
              </div>
            <?php
            }
            $province_rs = Database::search("SELECT * FROM `province`");
            $district_rs = Database::search("SELECT * FROM `district`");
            $city_rs = Database::search("SELECT * FROM `city`");

            $province_num = $province_rs->num_rows;
            $district_num = $district_rs->num_rows;
            $city_num = $city_rs->num_rows;
            ?>
          </div>
        </div>
        <br>

        <div class="row">

        <div class="col-md-6" id="provincecol">
                                                <label class="form-label">Province</label>
                                                <select class="form-select" id="province">
                                                    <option value="0">Select Province</option>
                                                    <?php

                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        # code...
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["province_id"]; ?>" <?php


                                                           if (!empty($province_data["province_province_id"])) {
                                                            if ($province_data["province_id"] == $province_data["province_province_id"]) {
                                                        ?> selected <?php
                                                            }
                                                        }

                                                                                                                   
                                                                                    ?>>
                                                            <?php echo $province_data["province_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>


                                                </select>
                                            </div>

          
                                            <div class="col-6">
                                                <label class="form-label">District</label>
                                                <select class="form-select" id="district">
                                                    <option value="0">Select district</option>
                                                    <?php

                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        # code...
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["district_id"]; ?>" <?php

                                                                                                                    if (!empty($district_data["district_district_id"])) {
                                                                                                                        if ($district_data["district_id"] == $district_data["district_district_id"]) {
                                                                                                                    ?> selected <?php
                                                                                                                        }
                                                                                                                    }

                                                                                    ?>>
                                                            <?php echo $district_data["district_name"]; ?>
                                                        </option>

                                                    <?php
                                                    }

                                                    ?>

                                                </select>
                                            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-6">
                                                <label class="form-label">City</label>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select city</option>
                                                    <?php

                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        # code...
                                                        $city_data = $city_rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $city_data["city_id"]; ?>" <?php

                                                                                                            if (!empty($city_data["city_city_id"])) {
                                                                                                                if ($city_data["city_id"] == $city_data["city_city_id"]) {
                                                                                                            ?> selected <?php
                                                                                                                }
                                                                                                            }

                                                                                    ?>>
                                                            <?php echo $city_data["city_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>

                                                </select>
                                            </div>

          <div class="col-md-6">
          <?php

if (empty($address_data["postal_code"])) {
?>
    <div class="col-12">
        <label class="form-label">Postal Code</label>
        <input type="text" id="pc" class="form-control" placeholder="Enter Your Postal Code" />
    </div>
<?php
} else {
?>
    <div class="col-12">
        <label class="form-label">Postal Code</label>
        <input type="text" id="pc" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" />
    </div>
<?php
}

?>
            <br>
            <br>
            <br>
            <br>
          </div>
<div class="col-12">
  <button class="btn btn-success" onclick="updateaddress();">Update Delevery Address</button>
</div>
        </div>
      </div>

      <div class="col-4 text-center">
        <h1><b>Sub total</b></h1>
        <br>
        <hr>
        <?php
        $email1 = $_SESSION["u"]["email"];
        $pcart_rs = Database::search("SELECT cart.*, product.*, (cart.qty * product.price) AS fprice
                            FROM cart
                            INNER JOIN product ON product.id = cart.product_id
                            WHERE cart.users_email =  '" . $email1 . "';
                            ");
        $pcart_num = $pcart_rs->num_rows;
        for ($x = 0; $x < $pcart_num; $x++) {
          $pcart_data = $pcart_rs->fetch_assoc();

        ?>
          <h9><b><?php echo $pcart_data["title"] ?> =</b> Rs. <span id="price<?php echo $pcart_data['id'] ?>"><?php echo $pcart_data["fprice"] ?></span>.00</h9>

          <hr>
        <?php
        }
        ?>

        <br>
        <br>
        <hr>
        <hr>
        <div class="col-12 text-start">
        <?php
                    $product_total = Database::search("SELECT SUM(cart.qty * product.price) AS total_value
                    FROM cart
                    INNER JOIN product ON product.id = cart.product_id WHERE `users_email` = '" .$email1. "';
                    
                        ");
                    $product_total_data = $product_total->fetch_assoc();
                    ?>

                    <h2><b>Total :- Rs <span id="totalgana"><?php echo $product_total_data["total_value"]?></span></b></h2>
                    <br>
                    <div class="col-12">
                      <h5 class="text-start" ><b>Delivery Fee :-</b>
                      <span>Rs. <span  id="delfee">
                      <?php
                        $email = $_SESSION["u"]["email"];
                        $user_province_rs = Database::search("SELECT * FROM province INNER JOIN  district ON district.province_id = province.id 
                        INNER JOIN city ON city.district_id = district.id  INNER JOIN full_address ON full_address.city_id = city.id WHERE  `users_email` = '" .$email. "'");
                        $user_province_num = $user_province_rs->num_rows;
                        $user_province_data = $user_province_rs->fetch_assoc();

                        $provine = $user_province_data["province_name"];

                        if ($provine == "Western") {
                            echo " 500";
                        } else {
                            echo " 700";
                        }
                        
           
                        ?>

                      </span>
                      
                        .00
                      </span>
                      
                    </h5>
                    <br>
                    <div class="col-12 text-center">
                      
                    </div>
                    <br><br>
                    <h5 class="text-start"><b>Sub Total :- <span id="sub_total">Select the province</span> </b> </h5>

                    <br>
                    <br>

                    <div class="col-12">
                      <button class="col-12 btn btn-success" style="height:65px;" onclick="buynow1();">Buy Now</button>
                    </div>
                    
                    </div>
        </div>
      </div>

    </div>
  </div>

  <script src="script.js"></script>
  <!-- End Example Code -->
</body>

</html>