<?php

include "connection.php";
session_start();

$reset_Password = $_POST["rp"];
$confirm_password = $_POST["cp"];
$verification_code = $_POST["rv"];

if (empty($reset_Password)) {
    echo ("please enter your new password");
} else if (empty($confirm_password)) {
    echo ("Please enter confirm password");
} else if ($reset_Password != $confirm_password) {
    echo ("Reset password and confirm password dosen't matching!");
} else if (empty($verification_code)) {
    echo ("please resend a forgot password email");
} else {
    $customer_rs = Database::search("SELECT * FROM `customer` WHERE `verification_code`='" . $verification_code . "'");


    if ($customer_rs->num_rows > 0) {
        $customer_data = $customer_rs->fetch_assoc();

        // Database::iud("UPDATE `customer` SET `password`='" . $reset_Password . "' AND `vcode`=NULL WHERE `customer_id` = '" . $customer_data["email"] . "'");

        Database::iud("UPDATE `customer` SET `password`='$reset_Password' , `verification_code`=NULL WHERE `customer_id` = '".$customer_data["customer_id"]."'");

        echo ("success");
    } else {
        echo ("user not found!");
    }
}
