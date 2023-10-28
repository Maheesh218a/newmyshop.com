<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iMobile Shop | User Profile</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/images.png" />

</head>

<body class="userbody">

    <div class="container-fluid">

        <div class="row">

            <?php

            session_start();

            require "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

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

                <hr class="mt-5">
                <div class="col-12">
                    <hr>
                    <p class="fs-1 fw-bold text-center text-capitalize">User Profile Update</p>
                </div>
                <div class="container">
                    <div class="row flex-lg-nowrap">


                        <div class="col">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="e-profile">
                                                <div class="row">
                                                    <div class="col-12 col-sm-auto mb-3">
                                                        <div class="mx-auto" style="width: 140px;">
                                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                <?php

                                                                if (empty($image_data["path"])) {
                                                                ?>
                                                                    <img src="resources/user_profile.svg" class="rounded mt-5" style="width:150px;" />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width:150px;" />
                                                                <?php
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $details_data["fname"] . " " . $details_data["lname"]; ?></h4>
                                                            <p class="mb-0"><?php echo $email; ?></p>
                                                            <div class="text-muted"><small>Last seen few minutes ago</small></div>
                                                            <div class="mt-2">
                                                                <input type="file" class="d-none" id="profileImage" />
                                                                <label for="profileImage" class="btn btn-primary mt-5">Update Profile Image</label>

                                                            </div>
                                                        </div>
                                                        <div class="text-center text-sm-right">
                                                            <span class="badge badge-secondary text-black">administrator</span>
                                                            <div class="text-muted"><small>Joined on: <?php echo $details_data["joined_date"]; ?></small></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                                </ul>
                                                <div class="tab-content pt-3">
                                                    <div class="tab-pane active">
                                                        <form class="form" novalidate="">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label text-bg-light">First Name</label>
                                                                                <input type="text" id="fname" class="form-control" value="<?php echo $details_data["fname"]; ?>" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label  text-bg-light">Last Name</label>
                                                                                <input type="text" id="lname" class="form-control" value="<?php echo $details_data["lname"]; ?>" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label  text-bg-light">Mobile Number</label>
                                                                                <input type="text" id="mobile" class="form-control" value="<?php echo $details_data["mobile"]; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label class="form-label  text-bg-light">Email</label>
                                                                                <input type="text" id="email" class="form-control" value="<?php echo $email; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label class="form-label  text-bg-light">Registered Date</label>
                                                                                <input type="text" class="form-control" readonly value="<?php echo $details_data["joined_date"]; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php

                                                                    if (empty($address_data["line1"])) {
                                                                    ?>
                                                                        <div class="col-12">
                                                                            <label class="form-label  text-bg-light">Address Line 01</label>
                                                                            <input type="text" id="line1" class="form-control" placeholder="Enter Address Line 01" />
                                                                        </div>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <div class="col-12">
                                                                            <label class="form-label  text-bg-light">Address Line 01</label>
                                                                            <input type="text" id="line1" class="form-control" value="<?php echo $address_data["line1"]; ?>" />
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    if (empty($address_data["line2"])) {
                                                                    ?>
                                                                        <div class="col-12">
                                                                            <label class="form-label  text-bg-light">Address Line 02</label>
                                                                            <input type="text" id="line2" class="form-control" placeholder="Enter Address Line 02" />
                                                                        </div>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <div class="col-12">
                                                                            <label class="form-label  text-bg-light">Address Line 02</label>
                                                                            <input type="text" id="line2" class="form-control" value="<?php echo $address_data["line2"]; ?>" />
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

                                                                    <div class="col-12 col-lg-6">
                                                                        <label class="form-label  text-bg-light">Province</label>
                                                                        <select class="form-select" id="province" onchange="loadDistrict();">
                                                                            <option value="0">Select Province</option>
                                                                            <?php

                                                                            for ($x = 0; $x < $province_num; $x++) {
                                                                                $province_data = $province_rs->fetch_assoc();
                                                                            ?>
                                                                                <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                                                                                if (!empty($address_data["province_province_id"])) {
                                                                                                                                                    if ($province_data["province_id"] == $address_data["province_province_id"]) {
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

                                                                    <div class="col-12 col-lg-6">
                                                                        <label class="form-label  text-bg-light">District</label>
                                                                        <select class="form-select" id="district">
                                                                            <option value="0">Select District</option>
                                                                            <?php

                                                                            for ($x = 0; $x < $district_num; $x++) {
                                                                                $district_data = $district_rs->fetch_assoc();
                                                                            ?>
                                                                                <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                                                                                if (!empty($address_data["district_district_id"])) {
                                                                                                                                                    if ($district_data["district_id"] == $address_data["district_district_id"]) {
                                                                                                                                                ?>selected<?php
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                            ?>><?php echo $district_data["district_name"] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label class="form-label  text-bg-light">City</label>
                                                                        <select class="form-select" id="city">
                                                                            <option value="0">Select City</option>
                                                                            <?php

                                                                            for ($x = 0; $x < $city_num; $x++) {
                                                                                $city_data = $city_rs->fetch_assoc();
                                                                            ?>
                                                                                <option value="<?php echo $city_data["city_id"]; ?>" <?php
                                                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                                                            if ($city_data["city_id"] == $address_data["city_city_id"]) {
                                                                                                                                        ?>selected<?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>><?php echo $city_data["city_name"] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <?php

                                                                    if (empty($address_data["postal_code"])) {
                                                                    ?>
                                                                        <div class="col-6">
                                                                            <label class="form-label  text-bg-light">Postal Code</label>
                                                                            <input type="text" id="pc" class="form-control" placeholder="Enter Your Postal Code" />
                                                                        </div>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <div class="col-6">
                                                                            <label class="form-label  text-bg-light">Postal Code</label>
                                                                            <input type="text" id="pc" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" />
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    ?>



                                                                    <div class="col-12">
                                                                        <label class="form-label  text-bg-light">Gender</label>
                                                                        <input type="text" class="form-control" readonly value="<?php echo $details_data["gender_name"]; ?>" />
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6 mb-3">
                                                                    <div class="mb-2"><b>Change Password</b></div>
                                                                    <div class="row">
                                                                        <label class="form-label  text-bg-light">Password</label>
                                                                        <div class="input-group">
                                                                            <input type="password" id="pw" value="<?php echo $details_data["password"]; ?>" class="form-control" aria-describedby="pwb">
                                                                            <span class="input-group-text" id="pwb" onclick="showPassword3();"><i class="bi bi-eye-fill"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                                    <div class="mb-2"><b>Keeping in Touch</b></div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label>Email Notifications</label>
                                                                            <div class="custom-controls-stacked px-2">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                                                                    <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                                                                </div>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                                                                    <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                                                                </div>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                                                                    <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit" onclick="updateProfile();">Save Changes</button>
                                                                </div>

                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="px-xl-3">
                                                <button class="btn btn-block btn-primary" onclick="signout();">
                                                    <i class="bi bi-box-arrow-left"></i>
                                                    <a href="#" class="text-decoration-none" style="color: whitesmoke;"><span class="text-lg-start fw-bold">Log Out</span> </a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title font-weight-bold">Support</h6>
                                            <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                            <a href="contactUs.php"> <button type="button" class="btn btn-primary">Contact Us</button></a>
                                        </div> <hr>
                                        <p  class="fw-bold text-black-50 mt-5 h1">Display Adds</p>
                                        <div class="tenor-gif-embed" data-postid="24394099" data-share-method="host" data-aspect-ratio="1.50943" data-width="100%"><a href="https://tenor.com/view/chocolate-gif-24394099">Chocolate GIF</a>from <a href="https://tenor.com/search/chocolate-gifs">Chocolate GIFs</a></div>
                                        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                                        <div class="tenor-gif-embed" data-postid="313685372583651681" data-share-method="host" data-aspect-ratio="0.706827" data-width="100%"><a href="https://tenor.com/view/milk-2-go-cookies-and-cream-milk-gif-313685372583651681">Milk 2 Go Cookies And Cream GIF</a>from <a href="https://tenor.com/search/milk+2+go-gifs">Milk 2 Go GIFs</a></div>
                                        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php

            } else {
            ?>
                <hr class="mt-5">
                <div class="col-12 mt-auto text-center">
                    <div class="row text-center">
                        <div class="col-12 bg-body mt-5 mb-5 text-center">
                            <span class="text-center text-bg-warning fw-bolder " style="font-size: xx-large;">
                                Hello Welcome to iMobile shop <br> Your are in iMobile shop <br> Profile Update Page <br> iMobile.lk
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-auto text-center">
                    <div class="row text-center">
                        <div class="col-12 bg-body mt-5 mb-5 text-center">
                            <span class="text-center text-bg-light fw-bolder" style="font-size: xx-large;">
                                Now You are Signout our Shop <br> <br> If you want to update Your Profile <br>Please Sign In and Try again
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
                </div>

            <?php

            }

            ?>
            <hr class="mb-5">
            <?php require "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>