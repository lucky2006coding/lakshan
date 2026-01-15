<?php


session_start();
require "connection.php";


if (isset($_SESSION["as"])) {

    $cus_id = $_GET["cus_id"];

    $cusRs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $cus_id . "'");

    if ($cusRs->num_rows == 1) {

        $cusData = $cusRs->fetch_assoc();

        $status = $cusData["status_status_id"];

        if ($status == 1) {
            Database::search("UPDATE `customer` SET `status_status_id`='2' WHERE `customer_id`='" . $cus_id . "'");

            // echo ("Successblocking");

            echo ("Success");
        } else {
            Database::search("UPDATE `customer` SET `status_status_id`='1' WHERE `customer_id`='" . $cus_id . "'");

            // echo ("SuccessUnblocking");
            echo ("Success");
        }
    } else {
        echo ("SOMETHING WENT WRONG");
    }
} else {
    echo ("Invalid admin");
}
