<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top headerbg bg">
        <div class="container col-12">
            <a class="navbar-brand fs-4" href="home.php">iMobile Shop</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-body off headerbg">

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-5">

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="addProduct.php">Sell</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="contactUs.php">Help and Contact</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="contactAdmin.php">Contact Admin</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="index.php">About us</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>

                        <li class="nav-item mx-2">
                            <a class="nav-link" href="watchlist.php">Watchlist</a>
                        </li>

                        <li class="nav-item mx-2">
                            <p class="text-light mt-1 fs-4">
                                <?php
                                if (isset($_SESSION["u"])) {
                                    $session_data = $_SESSION["u"];
                                ?>
                                    <span class="text-lg-start"><b>Welcome |</b>
                                        <a href="userProfile.php" class="text-decoration-none" style="color: whitesmoke;"><?php echo $session_data["fname"] . " " . $session_data["lname"]; ?></a>

                                    </span> |
                                    <a href="#" class="text-decoration-none" style="color: whitesmoke;"><span class="text-lg-start fw-bold" onclick="signout();">Sign Out</span> </a>|
                                <?php
                                } else {
                                ?>
                                    <a href="login.php" class="text-decoration-none text-warning fw-bold">
                                        | Sign In or Register |
                                    </a>
                                <?php
                                }
                                ?>
                            </p>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="resources/download.png" width="35" height="35" class="rounded-circle">
                            </a>
                            <ul class="drpbody dropdown-menu dropdown-menu-md-start bg-info-subtle dd" style="color: wheat;">
                                <li><a class="dropdown-item" href="userProfile.php">My Settings</a></li>
                                <li><a class="dropdown-item" href="myProducts.php">My Products</a></li>
                                <li><a class="dropdown-item" href="invoice.php">Purchased History</a></li>
                                <li>
                                    <hr class="dropdown-divider bg-light">
                                </li>

                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </nav>
    </body>

</html>