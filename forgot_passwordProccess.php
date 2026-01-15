<?php

session_start();
include "connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";


$email = $_GET["email"];

if (empty($email)) {
    echo ("Please enter your email first");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("please enter valid email address");
} else {

    $customer_rs = Database::search("SELECT * FROM `customer` WHERE `email`='" . $email . "'");

    if ($customer_rs->num_rows > 0) {

        $customer_data = $customer_rs->fetch_assoc();
        $vcode = uniqid();

        Database::iud("UPDATE `customer` SET `verification_code`='" . $vcode . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pkumarasiri30342@gmail.com';
            $mail->Password = 'ysijxbvdjdpxicxw';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('pkumarasiri30342@gmail.com', 'Eranga');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset your account password';
            $mail->Body = '<table style="width: 100%; font-family: sana-serif">
    <tbody>
        <tr>
            <td align="center">

                <table style="max-width:600px;">
                    <tr>
                        <td align="center">
                            <a href="#" style="font-size: 35px; color:black; font-weight: bold; text-decoration: none;">Phenoix cart</a>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <h1 style="font-size: 25px; font-weight:bold; line-height:45px;">Reset Your Password</h1>
                            <p style="margin-bottom: 24px;">You can reset your password by clicking the button below</p>
                         
                            <div>
                                <a href="http://localhost/project_002/reset_password.php?code=' . $vcode . '" style="display:inline-block; background-color:blue; color:white; 
                                border-radius: 8px;padding:15px; text-decoration:none">
                                    <span>Reset Password</span>
                                </a>
                            </div>
                            <p style="margin-top: 24px;">If you didn\'t requested to reset password,
                                please ignore this email</p>
                                <hr>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <p>&copy; 2024 Pheonix_cart.lk</p>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </tbody>

</table>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo ("Please register first");
    }
}
