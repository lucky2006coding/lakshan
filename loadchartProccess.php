<?php


include "connection.php";

$place_rs = Database::search("SELECT * FROM `place`");
$customer_rs = Database::search("SELECT * FROM `customer`");
$invoice_rsNum = Database::search("SELECT * FROM `invoice`");


if (isset($_GET["chart1"])) {


    $data = [];
    $labels = [];

    for ($x = 0; $x < $place_rs->num_rows; $x++) {

        $place_data = $place_rs->fetch_assoc();

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `place_place_id`='" . $place_data["place_id"] . "'");

        $place_hasInvoice_count = $invoice_rs->num_rows;

        $labels[] = $place_data["title"];
        $data[] = $place_hasInvoice_count;
    }



    $json = [];
    $json["data"] = $data;
    $json["labels"] = $labels;

    echo json_encode($json);
}

if (isset($_GET["chart2"])) {


    $data2 = [];
    $labels2 = [];

    for ($x = 0; $x < $customer_rs->num_rows; $x++) {

        $customer_data = $customer_rs->fetch_assoc();

        $invoice_rs2 = Database::search("SELECT * FROM `invoice` WHERE `customer_customer_id`='" . $customer_data["customer_id"] . "'");

        $customer_hasInvoiceCount = $invoice_rs2->num_rows;

        $labels2[] = $customer_data["email"];
        $data2[] = $customer_hasInvoiceCount;
    }



    $json = [];
    $json["data"] = $data2;
    $json["labels"] = $labels2;

    echo json_encode($json);
}


if (isset($_GET["chart3"])) {


    $data3 = [];
    $labels3 = [];



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $date_Timearray = explode(" ", $date);

    $dateArray = explode("-", $date_Timearray[0]);

    $dateMonth_Array = $dateArray[1];
    $dateDay_Array = $dateArray[2];


    for ($t = 0; $t < $dateDay_Array; $t++) {
        $productdate_rs = Database::search("SELECT * FROM place WHERE MONTH(place.added_time) = '" . $dateMonth_Array . "' AND DAY(place.added_time) = '" . $t . "';");

        $labels3[] =  $t;

        $addingprice = 0;


        for ($y = 0; $y < $productdate_rs->num_rows; $y++) {

            $productdate_data = $productdate_rs->fetch_assoc();

            $addingprice = $productdate_data["addingprice"] + $addingprice;
        }

        $data3[] = $addingprice;
    }

    for ($t1 = 0; $t1 < $dateDay_Array; $t1++) {
        $selling_rs = Database::search("SELECT * FROM invoice WHERE MONTH(invoice.issuedate) = '" . $dateMonth_Array . "' AND DAY(invoice.issuedate) = '" . $t1 . "';");

        // $labels3[] = $t1;

        $sellingprice = 0;


        for ($y1 = 0; $y1 < $selling_rs->num_rows; $y1++) {

            $selling_dateData = $selling_rs->fetch_assoc();

            $sellingprice = $selling_dateData["fulltotal"] + $sellingprice;
        }

        $data3_2[] = $sellingprice;
    }





    $json = [];
    $json["data"] = $data3;
    $json["data2"] = $data3_2;
    $json["labels"] = $labels3;

    echo json_encode($json);
}


if (isset($_GET["chart4"])) {


$data4 = [];
$labels4 = [];

$invoice_numRows = $invoice_rsNum->num_rows;

$place_Catrs = Database::search("SELECT * FROM `place_category`");

for ($cat = 0; $cat < $place_Catrs->num_rows; $cat++) {

    $place_CatData = $place_Catrs->fetch_assoc();

    $invoice_catRs = Database::search("SELECT * FROM `invoice` INNER JOIN `place` ON `invoice`.`place_place_id`=`place`.`place_id` WHERE `place`.`plc_cat_id`='" . $place_CatData["place_category_id"] . "';");

    $soldInvoiceCatNumbers = $invoice_catRs->num_rows;

    $persentage_Invincat = ((int)$soldInvoiceCatNumbers / (int)$invoice_numRows) * 100;
 
    //  $lastCat_persentage = $persentage_Invincat."%";

    $labels4[] = $place_CatData["plc_cat_name"];
    $data4[] = $persentage_Invincat;
}



$json = [];
$json["data"] = $data4;
$json["labels"] = $labels4;

echo json_encode($json);

}