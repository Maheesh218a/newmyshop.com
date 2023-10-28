<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPmailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        $code = uniqid();

        Database::iud("UPDATE `users` SET `verfication_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'maheeshaudalagama@gmail.com';
        $mail->Password = 'wknamnxrbxlkcmas';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('maheeshaudalagama@gmail.com', 'Reset Password');
        $mail->addReplyTo('maheeshaudalagama@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'iMobile Forgot Password Verification Code';
        $bodyContent = '<h1 style="color:green;">Your verification code is ' . $code . ' Do not Share this code anyone</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Verfication Code Sending Failed");
        } else {
            echo ("Success");
        }
    } else {
        echo ("Invalid Email Address");
    }
} else {
    echo ("Please enter your Email Address First");
}

?>
