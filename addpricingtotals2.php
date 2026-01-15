<?php

session_start();
require "connection.php";

if($_SESSION["p"]){

$place_id =  $_SESSION["p"]["place_id"];

$adult_qty = $_GET["adqty"];
$child_qty = $_GET["chqty"];
$infant_qty = $_GET["inqty"];
$chekin_Date = $_GET["date1"];
$chekout_Date = $_GET["date2"];

if(empty($chekin_Date)){
    echo("Please select start date you w'll stay this");
}else if(empty($chekout_Date)){
    echo("Please select end date you w'll stay this");
}else{

$date1 = new DateTime($chekin_Date);
$date2 = new DateTime($chekout_Date);

$interval = $date1->diff($date2);
$staydate = $interval->days; //stay dates

// setcookie("staydate",$staydate,time() + 3600*24);

$place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$place_id."'");

$place_data = $place_rs->fetch_assoc();

$adultprice = $place_data["adultprice"];
$childprice = $place_data["childprice"];
$infantprice = $place_data["infantprice"];

$price = ((int)$adultprice * (int)$adult_qty) + ((int)$childprice * (int)$child_qty) + ((int)$infantprice * (int)$infant_qty);

$amount = ((int)$staydate * $price);
?>

<div class="row ms-0" id="oneNghtprice1" style="align-content: center;">
                            <div class="mt-3 col-6 text-start">
                                <span class="ms-3">LKR <?php echo $price ?> * <?php echo $staydate ?> night</span>
                            </div>
                            <div class="mt-3 col-6" style="text-align: right;">
                                <span style="margin-right: 9%;">LKR <?php echo $amount ?></span>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>
                            <div class=" col-6 text-start">
                                <span class="ms-3">Total Price</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <span style="margin-right: 9%;">LKR <?php echo $amount ?></span>
                            </div>

                        </div>

<?php

}

}else{
    echo("Something went wrong");
}



?>