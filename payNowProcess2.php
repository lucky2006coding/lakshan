<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $pid = $_GET["id"];
    $qty1 = $_GET["qty1"];
    $qty2 = $_GET["qty2"];
    $qty3 = $_GET["qty3"];

    $umail = $_SESSION["u"]["email"];
    $uid = $_SESSION["u"]["customer_id"];

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM place WHERE place_id='" . $pid . "'"); //TODO

    $user_rs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $uid . "'");

    $user_data = $user_rs->fetch_assoc();

    if ($product_rs->num_rows == 1) {
        $product_data = $product_rs->fetch_assoc();

        if ($product_data["status"]) {

            $countryrs = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $user_data["country_id"] . "'");

            $countrydata = $countryrs->fetch_assoc();

            $city_id = $countrydata["country_name"];
            $address = $user_data["address"];

            // $district_rs = Database::search("SELECT * FROM city WHERE city_id='".$city_id."'");
            // $district_data = $district_rs->fetch_assoc();

            // $district_id = "1";
            // $delivery = 0;


            $adultprice = $product_data["adultprice"];
            $childprice = $product_data["childprice"];
            $infantprice = $product_data["infantprice"];
            $chekin_Date = $_GET["date1"];
            $chekout_Date = $_GET["date2"];

            $item = $product_data["title"];

            $date1 = new DateTime($chekin_Date);
            $date2 = new DateTime($chekout_Date);

            $interval = $date1->diff($date2);
            $staydate = $interval->days; //stay dates

            $price = ((int)$adultprice * (int)$qty1) + ((int)$childprice * (int)$qty2) + ((int)$infantprice * (int)$qty3);

            $amount = ((int)$staydate * $price);


            $fname = $user_data["fname"];
            $lname = $user_data["lname"];
            $mobile = $user_data["mobile"];
            $uaddress = $address;
            $city = $city_id;

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

            $array["id"] = $order_id;
            $array["item"] = $item;
            $array["amount"] = $amount;
            $array["fname"] = $fname;
            $array["lname"] = $lname;
            $array["mobile"] = $mobile;
            $array["address"] = $uaddress;
            $array["umail"] = $umail;
            $array["city"] = $city;
            $array["hash"] = $hash;


            echo json_encode($array);
        } else {
            echo ("Deactivate place");
        }
    } else {
        echo ("address error");
    }
}
