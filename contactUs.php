<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Contact Us | iMobile Shop |</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="resources/ishop.png">

</head>

<body class="contactBody">
    <?php require "header.php"; ?> <hr class="mt-5">

    <div class="container-fluid">
        <div class="col-12">
            <hr class="mt-6">
            <div class="row">
                <div class="col-12 text-center fw-bold border-danger" style="font-size: xx-large;">Weclome to iMobile Shop</div>
                <div class="col-12 text-center fw-bold border-danger" style="font-size: xx-large;">Help and Contact us</div>
                <hr>
                <div class="col-12 text-center"><?php
                                                if (isset($_SESSION["u"])) {
                                                    $session_data = $_SESSION["u"];
                                                ?>
                        <span class="text-lg-start fs-1 fw-bold"><b>Welcome </b>
                            <?php echo $session_data["fname"] . " " . $session_data["lname"]; ?>

                        </span>
                </div> <?php
                                                } else
                        ?>
            <!-- Carousel -->
            <div id="carouselExampleCaptions" class="col-12 carousel slide d-none d-md-block" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2500">
                        <img src="resources/contact-header-bg.jpg" class="d-block poster-img">
                        <div class="carousel-caption d-none d-md-block poster-caption">
                            <h5 class="poster-title" style="color: whitesmoke;">| Contact Us |</h5>
                            <p class="poster-text" style="color:azure">| Keep in touch with us |</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-6">
            </div>
            <!-- Carousel -->
            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-2 mb-lg-0" style="background-color: wheat;">
                            <h2 class="title mb-1">Contact Information</h2>
                            <p class="mb-3">We are iMobile Shop&trade; <br> We always help to you any situtation. <br> If you want to konw about something <br> Send we us message on message box <br> We are connecting you as soon as posible</p>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="contact-info">
                                        <h3>The Office</h3>


                                        <div class="col-12">
                                            <p> <i class="bi bi-house-door"></i> Liberty Plaza, 1st Flor, Bambalapitiya, Colombo, Sri Lanka</p>
                                            <a href="mailto:#" style="color: black;">
                                                <p><i class="bi bi-envelope-at"></i> imboileshop@gmail.com</p>
                                            </a>
                                            <a href="tel:#" style="color: black;" class="text-decoration-none">
                                                <p><i class="bi bi-telephone-fill"></i> +94 767 900 101</p>
                                            </a>
                                            <a href="tel:#" style="color: black;" class="text-decoration-none">
                                                <p><i class="bi bi-telephone-fill"></i> +94 112 220 485</p>
                                            </a>
                                            <a href="https://wa.me/767900101" style="color: black;" class="text-decoration-none" target="_blank">
                                                <p><i class="bi bi-whatsapp"></i> +94 767 900 101</p>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="contact-info">
                                        <h3>The Office</h3>

                                        <ul class="contact-list">
                                            <p>
                                                <i class="bi bi-calendar-minus"></i>
                                                <span class="text-dark">Monday-Saturday</span> <br>10am-6pm
                                            </p>
                                            <p>
                                                <i class="bi bi-calendar-minus"></i>
                                                <span class="text-dark">Sunday</span> <br>10am-4pm
                                            </p>
                                            <p>
                                                <i class="bi bi-calendar-minus"></i>
                                                <span class="text-dark">On Poya Days' We are close</span>
                                            </p>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="background-color: wheat;">
                            <h2 class="title mb-1">Got Any Questions?</h2>
                            <p class="mb-2">Use the form below to get in touch with the sales team</p>

                            <form action="#" class="contact-form mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                                        <input type="text" class="form-control" id="cname" placeholder="Name *" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                                    </div>
                                </div> <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                                        <input type="tel" class="form-control" id="cphone" placeholder="Phone">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                                        <input type="text" class="form-control" id="csubject" placeholder="Subject">
                                    </div>
                                </div> <br>

                                <label for="cmessage" class="sr-only">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea> <br>

                                <button type="submit" class="btn btn-outline-danger btn-minwidth-sm col-5">
                                    <span>SUBMIT</span>
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr class="mt-4 mb-5">

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="col-12 text-uppercase text-decoration-underline fw-bold" style="font-size: 50px;">Our Location</div>
                <div class="col-12 col-lg-6 elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2ed0c604" data-id="2ed0c604" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-8a7ca32 elementor-widget elementor-widget-google_maps" data-id="8a7ca32" data-element_type="widget" data-widget_type="google_maps.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.14.0 - 26-06-2023 */
                                    .elementor-widget-google_maps .elementor-widget-container {
                                        overflow: hidden
                                    }

                                    .elementor-widget-google_maps .elementor-custom-embed {
                                        line-height: 0
                                    }

                                    .elementor-widget-google_maps iframe {
                                        height: 300px
                                    }
                                </style>
                                <div class="elementor-custom-embed">
                                    <iframe loading="lazy" src="https://maps.google.com/maps?q=Atech%2C%2034%20U%2C%20First%20Floor%20Liberty%20Plaza&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" title="Atech, 34 U, First Floor Liberty Plaza" aria-label="Atech, 34 U, First Floor Liberty Plaza"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div class=" col-12 text-end">
                <p class="text-light mt-5 mb-0 text-bg-dark">&copy;2023 designed by
                    <a href="https://web.facebook.com/maheeshanimsithudalagama.udalagama/" target="_blank" class="text-decoration-none">
                        <strong class="text-warning">Maheesha Udalagama</strong>
                    </a>
                </p>
            </div>
            <?php require "footer.php" ?>
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
</body>