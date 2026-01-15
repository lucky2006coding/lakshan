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

        //     $array;



        $product_rs = Database::search("SELECT * FROM place WHERE place_id='" . $pid . "'"); //TODO

        if ($product_rs->num_rows == 1) {
                $product_data = $product_rs->fetch_assoc();

                //         $countryrs = Database::search("SELECT * FROM `country` WHERE `country_id`='".$_SESSION["u"]["country_id"]."'");

                // $countrydata = $countryrs->fetch_assoc();

                //         $city_id = $countrydata["country_name"];
                //         $address = $_SESSION["u"]["address"];

                // $district_rs = Database::search("SELECT * FROM city WHERE city_id='".$city_id."'");
                // $district_data = $district_rs->fetch_assoc();

                // $district_id = "1";
                // $delivery = 0;


                $adultprice = $product_data["adultprice"];
                $childprice = $product_data["childprice"];
                $infantprice = $product_data["infantprice"];
                $chekin_Date = $_GET["date1"];
                $chekout_Date = $_GET["date2"];

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d");

                // echo $date;
                // echo $chekin_Date;

                if ($date < $chekin_Date && $date < $chekout_Date) {


                        // $item = $product_data["title"];

                        $date1 = new DateTime($chekin_Date);
                        $date2 = new DateTime($chekout_Date);

                        $interval = $date1->diff($date2);
                        $staydate = $interval->days; //stay dates

                        $price = ((int)$adultprice * (int)$qty1) + ((int)$childprice * (int)$qty2) + ((int)$infantprice * (int)$qty3);

                        $amount = ((int)$staydate * $price);

                        $d = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $d->setTimezone($tz);
                        $date = $d->format("Y-m-d H:i:s");

                        $uniq = uniqid();


                        Database::iud("INSERT INTO `invoice`(`discount`,`adultqty`,`childqty`,`infantqty`,`oneAdprice`,
            `oneChprice`,`oneInfprice`,`chekinDate`,`cheloutDate`,`fulltotal`,`issuedate`,`place_place_id`,`customer_customer_id`,`invoiceIduniquly`)
              VALUES ('0','" . $qty1 . "','" . $qty2 . "','" . $qty3 . "','" . $adultprice . "','" . $childprice . "','" . $infantprice . "','" . $chekin_Date . "','" . $chekout_Date . "','" . $amount . "','" . $date . "','" . $pid . "','" . $uid . "','" . $uniq . "')");

                        echo ("Success");
                } else {
                        echo ("chekind date is a not a validate date");
                }
        }
} else {
        echo ("Invalid User");
}
