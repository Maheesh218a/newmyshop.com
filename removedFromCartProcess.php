<?php

require "connection.php";

if (isset($_GET["id"])) {
    
    $cid = $_GET["id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `id`='".$cid."'");

    if ($cart_rs->num_rows == 1) {
        Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");
        echo ("Removed");
        
    }else {
        echo ("Something Went Wrong. Please Try Again Later");
    }

}

?>