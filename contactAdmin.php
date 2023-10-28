<?php

session_start();

require "connection.php";

?>
<!DOCTYPE html>

<html>

<head>

    <title>Contact Admin | iMobile Shop |</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="resources/ishop.png">

</head>

<body class="adminBody">
    <?php require "header.php"; ?>
    <hr class="mt-5">

    <div class="col-12">
        <div class="page-header text-center" style="background-image: url('resources/page-header-bg.jpg')">
            <div class="container">
                <hr class="mt-5">
                <h1 class="page-title">Contact Admin<span>Page</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Admin</li>
                </ol>
            </div>
        </nav>
        <div class="page-content">
            	<div id="map" class="mb-5"></div><!-- End #map -->
                <div class="container">
                	<div class="row">
                		<div class="col-md-4" style="background-color:bisque">
                			<div class="contact-box text-center">
        						<h3>Office</h3>

        						<address>Liberty Plaza, 1st Flor, Bambalapitiya,  <br>Colombo, Sri Lanka</address>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4"style="background-color:bisque">
                			<div class="contact-box text-center">
        						<h3>Start a Conversation</h3>

        						<div><a href="mailto:#">umaheesha@gmail.com</a></div>
        						<div><a href="tel:#"  class="text-decoration-none"><p><i class="bi bi-telephone-fill"></i> +94 767 900 101</p></a>
                                            <a href="tel:#"  class="text-decoration-none"><p><i class="bi bi-telephone-fill"></i> +94 112 220 485</p></a>
                                            <a href="https://wa.me/+94767900101"  class="text-decoration-none" target="_blank"><p><i class="bi bi-whatsapp"></i> +94 767 900 101</p></a></div>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4"style="background-color:bisque">
                			<div class="contact-box text-center">
        						<h3>Social</h3>

        						<div class="social-icons social-icons-color justify-content-center">
                                <li class="list-inline-item">
                                <a href="https://web.facebook.com/?_rdc=1&_rdr" target="_blank" class="form-floating ">
                                    <i class="bi bi-facebook" style="font-size: 22px;"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D" target="_blank" class="form-floating">
                                    <i class="bi bi-twitter" style="font-size: 22px;"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="form-floating text-danger">
                                    <i class="bi bi-google" style="font-size: 22px;"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/feed/" target="_blank" class="form-floating text-success">
                                    <i class="bi bi-linkedin" style="font-size: 22px;"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="https://www.youtube.com/" target="_blank" class="form-floating text-danger">
                                    <i class="bi bi-youtube" style="font-size: 22px;"></i>
                                </a>
                            </li>
			    				</div><!-- End .soial-icons -->
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->
                	</div><!-- End .row -->

                	<hr class="mt-3 mb-5 mt-md-1" >
                	<div class="touch-container row justify-content-center"style="background-color:thistle">
                		<div class="col-md-9 col-lg-7">
                			<div class="text-center"><br>
                			<h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                			<p class="lead text-primary">
                				We collaborate with ambitious brands and people; we’d love to build something great together.
                			</p><!-- End .lead text-primary -->
                			<p class="mb-3">Type your message in this message box. <br> Our admin panel contact you as soon as posible <br> Please fill coorect answers</p>
                			</div><!-- End .text-center -->

                			<form action="#" class="contact-form mb-2">
                				<div class="row">
                					<div class="col-sm-4">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cemail" class="sr-only">Name</label>
                						<input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" id="cphone" placeholder="Phone">
                					</div><!-- End .col-sm-4 -->
                				</div><!-- End .row -->
                                <br>

                                <label for="csubject" class="sr-only">Subject</label>
        						<input type="text" class="form-control" id="csubject" placeholder="Subject">
<br>
                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>
								
								<div class="text-center"><br>
	                				<button type="submit" class="btn btn-outline-primary btn-minwidth-sm">
	                					<span>SUBMIT</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
                				</div><!-- End .text-center -->
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-md-9 col-lg-7 -->
                	</div>
                    
                    <hr><!-- End .row -->
                </div><!-- End .container -->
</div>
    </div>
<?php require "footer.php"; ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>