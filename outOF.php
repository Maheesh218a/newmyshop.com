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

<body style="background-color:lavender">
    <hr class="mt-5"> <br class="mt-5">
    <div class="col-12 text-center text-bg-primary">

        <button class="btn btn-close"></button>
        This Item is out of stock
        <button class="btn btn-close"></button>

    </div>        <hr class="mt-5"> <br class="mt-5">

    <div class="col-12 text-center">
        <a href="home.php" class=" text-decoration-none">
            <button class="btn btn-outline-secondary">Back to Home Page</button>
        </a>
    </div>

</body>

</html>