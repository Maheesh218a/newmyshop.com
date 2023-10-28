<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page | iMobile Shop |</title>
    <link rel="icon" href="resources/login.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body class="main_body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 "></div>
                    <div class="col-12">
                        <p class="text-center title01">| Welcome to iMobile |</p>
                    </div>
                </div>
            </div>
            <!-- header -->
            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block"></div>

                    <!-- signin box -->

                    <div class="col-12 col-lg-6" id="signinbox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title02 open">Sign In to your account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv2">
                                <div class="alert alert-danger" role="alert" id="msg2"></div>
                            </div>

                            <div class="col-12 d-none" id="msgdiv3">
                                <div class="alert alert-danger" role="alert" id="msg3"></div>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label text">Email</label>
                                <input type="email" class="form-control" id="email2" value="<?php $email; ?>" placeholder="ex: kasunherath@gmail.com" />
                            </div>

                            <div class="col-12">
                                <label class="form-label text">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password2" value="<?php $password; ?>" placeholder="ex: ********" aria-describedby="basic-addon2">
                                    <button class="btn btn-outline-light" type="button" id="password3" onclick="showPassword4();">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberme">
                                    <label class="form-check-label text" for="rememberme">
                                        Remember Me.
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-warning" onclick="forgotPassword();">Forgotten Password?</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signin();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="changeView();">Sign up</button>
                            </div>
                            <div class="col-12 col-lg-12 d-grid text-center">
                                <button class="btn btn-light" onclick="wsignin();">With Out Sign In</button>
                            </div>
                        </div>
                    </div>
                    <!-- signin box -->

                    <!-- signup box -->
                    <div class="col-12  d-none" id="signupbox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="open">| New User | Create New Account |</p>
                            </div>
                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="msg"></div>
                            </div>

                            <div class="col-6">
                                <label class="form-label text">First Name</label>
                                <input class="form-control" type="text" placeholder="ex: Kasun" id="fname" />
                            </div>



                            <div class="col-6">
                                <label class="form-label text">Last Name</label>
                                <input class="form-control" type="text" placeholder="ex: Herath" id="lname" />
                            </div>

                            <div class="col-6">
                                <label class="form-label text">Email</label>
                                <input class="form-control" type="email" placeholder="ex: kasunhearth@gmail.com" id="email" />
                            </div>

                            <div class="col-6">
                                <label class="form-label text">Password</label>
                                <input class="form-control" type="password" placeholder="ex: kasunhearth@gmail.com" id="password" />
                            </div>

                            <div class="col-6">
                                <label class="form-label text">Mobile Number</label>
                                <input class="form-control" type="text" placeholder="ex: 077 111 5552" id="mobile" />
                            </div>

                            <div class="col-6">
                                <label class="form-label text">Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="0">Select your Gender</option>
                                    <?php
                                    require "connection.php";

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>

                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signup();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-secondary" onclick="changeView();">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <!-- signup box -->
                </div>
            </div>
            <!-- content -->

            <!-- Modal -->
            <div class="modal" id="forgotPasswordModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="np" />
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword();">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Retype New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" />
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verrification Code</label>
                                    <input type="text" class="form-control" id="vc">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <!-- footer -->

            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center color text">&copy; 2023 iMobile.lk || All Rights Reserved</p>
            </div>



            <div class=" col-12 d-none d-lg-block fixed-bottom col-lg-8">
                <p class="text-light mt-5 mb-0">&copy;2023 designed by
                    <a href="https://web.facebook.com/maheeshanimsithudalagama.udalagama/" target="_blank" class="text-decoration-none">
                        <strong class="text-warning">Maheesha Udalagama</strong>
                    </a>
                </p>
            </div>

            <!-- footer -->

        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.css"></script>
</body>

</html>