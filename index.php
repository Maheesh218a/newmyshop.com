<?php

session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us | iMobile Shop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/ishop.png">
</head>

<body class="" style="background-color: #f7f7ff;">
    <div class="container-fluid">
        <div class="row">


            <div class="col-12">
                <hr />
            </div>
            <div class="col-12">
                <p class="fs-3 text-center fw-bold">_____ iMobile Shop - Colombo _____</p>
                <div class="col-12  text-lg-end text-md-start">
                    <a href="home.php" class="text-decoration-none"><button class="btn btn-dark me-2"><i class="bi bi-house-fill"></i> Home</button></a> 
                    <a href="contactUs.php" class="text-decoration-none"><button class="btn btn-danger me-2"><i class="bi bi-person-lines-fill"></i> Contact us </button></a>
                    <a href="contactAdmin.php" class="text-decoration-none"><button class="btn btn-info me-2"><i class="bi bi-people-fill"></i> Contact Admin </button></a>
                    <a href="login.php" class="text-decoration-none"><button class="btn btn-warning me-2"><i class="bi bi-people-fill"></i>Log In as Customer </button></a>
                    <a href="adminLogin.php" class="text-decoration-none"><button class="btn btn-secondary me-2"><i class="bi bi-people-fill"></i> Log In as Admin </button></a>
                </div>
            </div>

        </div>
        <!-- Carousel -->
        <hr>
        <div class="col-12 carousel slide d-none d-md-block" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2500">
                    <img src="resources/about-header-bg.jpg" class="d-block poster-img">
                    <div class="carousel-caption d-none d-md-block poster-caption">
                        <h5 class="poster-title" style="color: whitesmoke;">| About Us |</h5>
                        <p class="poster-text" style="color:azure">| Who we are |</p>
                        <P>Why are you wating</P>
                        <a href="home.php" class="text-decoration-none"><button class="btn btn-outline-info">Let's Start Shopping</button></a>
                    </div>
                </div>
            </div>
            <hr class="mt-6">
        </div>
        <!-- Carousel -->

        <!-- Vision & Mission -->
        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <h2 class="title">Our Vision</h2>
                        <p>We are dedicated to the relentless pursuit of our vision, ensuring that our electronic shop remains a beacon of progress, knowledge, and sustainability in the rapidly evolving world of technology. Together with our customers, we aim to make informed, innovative, and eco-conscious choices that shape a brighter future.

                            This vision statement conveys your shop's commitment to technology, innovation, customer support, and environmental responsibility, which are essential elements for a successful electronic shop in today's market. It serves as a guiding force, helping your team stay focused on your long-term objectives and your unique value proposition in the electronics retail industry. </p>
                    </div>

                    <div class="col-lg-6">
                        <h2 class="title">Our Mission</h2>
                        <p>At iMobile Shop, our mission is not just a statement; it's our daily commitment. We are passionate about delivering top-tier electronic products, unparalleled service, and a sense of community. We invite you to join us in our mission of enabling seamless connections, one device at a time, and help us shape a brighter, more connected future.

                            This mission statement conveys your shop's dedication to customers, innovation, sustainability, and community involvement. It defines the essence of your business and sets the tone for your daily operations and long-term goals. </p>
                    </div>
                </div>

                <div class="mb-5"></div>
            </div>
        </div>
        <!-- Vision & Mission -->
        <!-- Who we are -->
        <div class="bg-light pt-6 pb-5 mb-6 mb-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h2 class="title">Who We Are</h2>
                        <p class="lead text-primary mb-3 text-center">We are iMobile Shop - Colombo <br>The best E-shop in Sri Lanka</p><!-- End .lead text-primary -->
                        <p class="mb-2">"At iMobile Shop, we're your trusted destination for all things tech. Discover a world of innovation with our carefully curated selection of electronic gadgets, devices, and accessories. Our knowledgeable team is here to assist you in making informed choices, and our commitment to quality and sustainability ensures that you get the best value for your tech investments. Explore, connect, and stay ahead with the latest in electronics at iMobile Shop."
                        </p>

                        <a href="home.php" class="btn btn-sm btn-minwidth btn-outline-primary">
                            <span>Shop Now</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                            <img src="resources/img-1.jpg" alt="" class="about-img-front">

                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Who we are -->
        <div class="row">
            <div class="col-lg-5">
                <div class="brands-text">
                    <h2 class="title">The world's premium design brands in one destination.</h2><!-- End .title -->
                    <p>Lot of company are join with us our iMobile Shop <br> Also we are athorized seller of Sri Lanka</p>
                </div><!-- End .brands-text -->
            </div><!-- End .col-lg-5 -->
            <div class="col-lg-7">
                <div class="brands-display">
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4">
                            <a href="https://www.apple.com/" target="_blank" class="text-decoration-none">
                                Apple Company <i class="bi bi-apple"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.samsung.com/us/" target="_blank" class="text-decoration-none">
                                Samsung Company <i class="bi bi-tablet"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.nokia.com/" target="_blank" class="text-decoration-none">
                                Nokia Company <i class="bi bi-tablet"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="" target="_blank" class="text-decoration-none">
                                Huawei Company <i class="bi bi-tablet"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.sony.com/en/" target="_blank" class="text-decoration-none">
                                Sony Company <i class="bi bi-tablet"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.htc.com/eu/" target="_blank" class="text-decoration-none">
                                HTC <i class="bi bi-tablet"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.msi.com/index.php" target="_blank" class="text-decoration-none">
                                MSI Company <i class="bi bi-laptop"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.hp.com/lk-en/home.html" target="_blank" class="text-decoration-none">
                                HP Company <i class="bi bi-laptop"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.asus.com/lk/" target="_blank" class="text-decoration-none">
                                Asus Company <i class="bi bi-laptop"></i>
                            </a>
                        </div>

                        <div class="col-6 col-sm-4">
                            <a href="https://www.dell.com/" target="_blank" class="text-decoration-none">
                                Dell Company <i class="bi bi-laptop"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require "footer.php" ?>
</body>

</html>