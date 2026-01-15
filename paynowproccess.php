<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $price = $_GET["price"];

    $uid = $_SESSION["u"]["customer_id"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $cusomer_rs = Database::search("SELECT * FROM `customer` WHERE `customer`.`customer_id`='" . $uid . "'");
    $cusomer_data = $cusomer_rs->fetch_assoc();

    if (empty($cusomer_data["address"] || empty($cusomer_data["country_id"]))) {

        echo ("address, country error");
    } else {
        $country_rs = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $cusomer_data["country_id"] . "'");

        $country_data = $country_rs->fetch_assoc();

        $address = $cusomer_data["address"];

        $amount = ((int)$price);


        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $uaddress = $address;
        $country = $country_data["country_name"];

        $merchant_id = "1222366";
        $merchant_secret = "MTA1ODQ2MDY5OTExMjU0NDYwNzkzOTY2MDI2ODQwNDI0MTQ3NjM0Mw==";
        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );

        // $array = [];
        // $array["sandbox"] = true;
        // $array["merchant_id"] = $merchant_id;
        // $array["return_url"] = "";
        // $array["cancel_url"] = "";
        // $array["notify_url"] = "";
        // $array ["id"] = $order_id;
        // $array ["amount"] = $amount;
        // $array ["fname"] = $fname;
        // $array ["lname"] = $lname;
        // $array ["mobile"] = $mobile;
        // $array ["address"] = $address;
        // $array ["umail"] = $umail;
        // $array ["country"] = $country;
        // $array ["hash"] = $hash;

        $array["id"] = $order_id;
        $array["item"] = "null";
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $uaddress;
        $array["umail"] = $umail;
        $array["city"] = $country;
        $array["hash"] = $hash;


        echo json_encode($array);
    }
}
