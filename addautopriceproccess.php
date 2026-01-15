<?php

session_start();
require "connection.php";

//placecat details
$place_catid =  $_COOKIE["place_cat"];
$place_catrs = Database::search("SELECT * FROM `place_category` WHERE `place_category_id`='" . $place_catid . "'");
$place_catdata = $place_catrs->fetch_assoc();
$placecatprice =  $place_catdata["autpricecat"];
//placecat details

// echo('<br/>');

//placetyp details
$place_typid =  $_COOKIE["place_type"];
$place_typrs = Database::search("SELECT * FROM `place_type` WHERE `place_type_id`='" . $place_typid . "'");
$place_typdata = $place_typrs->fetch_assoc();
$placetypeprice = $place_typdata["plc_typprice"];
//placetyp details

// echo('<br/>');


// echo $_COOKIE["country"];
// echo('<br/>');

// echo $_COOKIE["address1"];
// echo('<br/>');

// echo $_COOKIE["address2"];
// echo('<br/>');

// echo $_COOKIE["city"];
// echo('<br/>');

// echo $_COOKIE["state"];
// echo('<br/>');



//basic facility details
$bcfac_rs =  Database::search("SELECT * FROM `basic_facilities`");

$totalbf = 0;
for ($x = 1; $x < $bcfac_rs->num_rows + 1; $x++) {
    $bcdata = $bcfac_rs->fetch_assoc();

    $b_fac_id = $x;
    $fn = $_COOKIE["hee" . $x];

    // echo $b_fac_id; //bfac id
    // echo(" qty : ");
    // echo $fn; //qty

    // echo (" price -> ");
    // echo  $fn * $bcdata["autpricefac"];
    $equal_bcprice = $fn * $bcdata["autpricefac"];
    $totalbf += $equal_bcprice;

    // echo ("<br/>");

}

$basicfacilityprice  = $totalbf; //basic price
//basic facility details

// echo ("<br/>");


//amenties details
$ament_rs = Database::search("SELECT * FROM `amenties`");

$amentprice = 0;
for ($y = 1; $y < $ament_rs->num_rows + 1; $y++) {
    $ament_data = $ament_rs->fetch_assoc();

    if (!empty($_COOKIE["ament_id" . $y])) {
        $t = $_COOKIE["ament_id" . $y];
        // echo $t;//amentid
        $amentprice += $ament_data["autpriceamen"];
    }
}
// echo("<br/>");

$amentiesprice =  $amentprice;
//amenties details

// echo("<br/>");

//standoutaenties details
$standoutamen_rs = Database::search("SELECT * FROM `standout_amenities`");

$standoutamenprice = 0;
for ($z = 1; $z < $standoutamen_rs->num_rows  + 1; $z++) {
    $standoutamen_data = $standoutamen_rs->fetch_assoc();

    if (!empty($_COOKIE["stand_id" . $z])) {
        $t = $_COOKIE["stand_id" . $z];
        // echo $t;
        $standoutamenprice += $standoutamen_data["autstaprice"];
    }
}
//standoutamenties details

// echo("<br/>");

//safetyitem details
$safetyitem_rs = Database::search("SELECT * FROM `safety_items`");

$saftyprice = 0;
for ($q = 1; $q < $safetyitem_rs->num_rows + 1; $q++) {
    $safetyitem_data = $safetyitem_rs->fetch_assoc();

    if (!empty($_COOKIE["safety_id" . $q])) {
        $t = $_COOKIE["safety_id" . $q];
        // echo $t;
        $saftyprice += $safetyitem_data["safety_itemprice"];
    }
}

$saftythingprice =  $saftyprice; //safettyprice
//saftyitem details
// echo("<br/>");

for ($i = 0; $i < 4; $i++) {

    $img_path = $_COOKIE["imgplace" . $i];

    // echo $img_path; //img path
    // echo ("<br/>");

}

// echo $_COOKIE["title"];
// echo("<br/>");

$discription;
if (empty($_COOKIE["discription"])) {
    $discription = "Do you like enjoy better experience..!  come this";
} else {
    $discription = $_COOKIE["discription"];
}

// echo $discription;

// echo $_COOKIE["adultprice"];
// echo ("<br/>");
// echo $_COOKIE["childprice"];
// echo ("<br/>");
// echo $_COOKIE["infantprice"];
// echo ("<br/>");

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
// echo $date;

$fulpricetotal = array($placecatprice, $placetypeprice, $basicfacilityprice, $amentiesprice, $standoutamenprice, $saftythingprice);
// echo("<br/>");
// echo("<b>");
// echo("full price : ");
echo array_sum($fulpricetotal);

if (isset($_GET["update"])) {

    $fulprice = array_sum($fulpricetotal);


    Database::iud("INSERT INTO `place`(`title`,`description`,`added_time`,`state`,`city`,`address1`,`address2`,`plc_cat_id`,`customer_customer_id`,`place_type_place_type_id`,
                    `country_country_id`,`adultprice`,`childprice`,`infantprice`,`status`,`addingprice`) VALUES('" . $_COOKIE["title"] . "','" . $discription . "','" . $date . "'
                     ,'" . $_COOKIE["state"] . "','" . $_COOKIE["city"] . "','" . $_COOKIE["address1"] . "','" . $_COOKIE["address2"] . "','" . $place_catid . "','" . $_SESSION["u"]["customer_id"] . "'
                     ,'" . $place_typid . "','" . $_COOKIE["country"] . "','" . $_COOKIE["adultprice"] . "','" . $_COOKIE["childprice"] . "','" . $_COOKIE["infantprice"] . "','1','" . $fulprice . "')");


    $maximValue = Database::$connection->insert_id;

    for ($x = 1; $x < $bcfac_rs->num_rows + 1; $x++) {
        $bcdata = $bcfac_rs->fetch_assoc();

        $b_fac_id = $x;
        $fn = $_COOKIE["hee" . $x];

        // echo $b_fac_id; //bfac id
        // echo(" qty : ");
        // echo $fn; //qty


        Database::iud("INSERT INTO `place_has_basic_facilities`(`place_place_id`,`basic_facilities_bs_fac_id`,`qty`)
                       VALUES ('" . $maximValue . "','" . $b_fac_id . "','" . $fn . "')");

        // echo ("<br/>");

    }

    $ament_rs = Database::search("SELECT * FROM `amenties`");

    // $amentprice =0;
    for ($y = 1; $y < $ament_rs->num_rows + 1; $y++) {
        $ament_data = $ament_rs->fetch_assoc();

        if (!empty($_COOKIE["ament_id" . $y])) {
            $t = $_COOKIE["ament_id" . $y];

            Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`amenties_amenties_id`) VALUES('" . $maximValue . "','" . $t . "')");

            // echo $t;//amentid
            // $amentprice += $ament_data["autpriceamen"];

        }
    }
    // echo("<br/>");

    // $amentiesprice =  $amentprice;
    //amenties details

    // echo("<br/>");

    //standoutaenties details
    $standoutamen_rs = Database::search("SELECT * FROM `standout_amenities`");

    // $standoutamenprice = 0;
    for ($z = 1; $z < $standoutamen_rs->num_rows  + 1; $z++) {
        $standoutamen_data = $standoutamen_rs->fetch_assoc();

        if (!empty($_COOKIE["stand_id" . $z])) {
            $t = $_COOKIE["stand_id" . $z];

            Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`standout_amenities_standout_amenities_id`) VALUES('" . $maximValue . "','" . $t . "')");

            // echo $t;
            // $standoutamenprice += $standoutamen_data["autstaprice"];
        }
    }
    //standoutamenties details

    // echo("<br/>");

    //safetyitem details
    $safetyitem_rs = Database::search("SELECT * FROM `safety_items`");

    // $saftyprice = 0;
    for ($q = 1; $q < $safetyitem_rs->num_rows + 1; $q++) {
        $safetyitem_data = $safetyitem_rs->fetch_assoc();

        if (!empty($_COOKIE["safety_id" . $q])) {
            $t = $_COOKIE["safety_id" . $q];

            Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`safety_items_safety items_id`) VALUES('" . $maximValue . "','" . $t . "')");

            // echo $t;
            // $saftyprice += $safetyitem_data["safety_itemprice"];
        }
    }


    for ($i = 0; $i < 4; $i++) {

        $img_path = $_COOKIE["imgplace" . $i];

        // echo $img_path; //img path
        // echo ("<br/>");
        Database::iud("INSERT INTO `place_img`(`path`,`place_place_id`) VALUES ('" . $img_path . "','" . $maximValue . "')");
    }

    // $saftythingprice =  $saftyprice;//safettyprice
    //saftyitem details


}
