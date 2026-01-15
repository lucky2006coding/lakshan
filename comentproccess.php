<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

     if(isset($_POST["c"]) && isset($_POST["pid"])){

        $customer_id = $_SESSION["u"]["customer_id"];

        $content = $_POST["c"];
        $place_id = $_POST["pid"];

        if(empty($content)){
            echo("Please type your text first");
        }else if(empty($place_id)){
            echo("Something went wrong");
        }else{

            

            $customer_rs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='".$customer_id."'");

            $customer_Data = $customer_rs->fetch_assoc();

            $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$place_id."'");

            $place_Data = $place_rs->fetch_assoc();

            if($customer_Data["status_status_id"] == 1){

                if($place_Data["status"] == 1){

                    $d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
                    
                    Database::iud("INSERT INTO `comment`(`content`,`datetime`,`place_place_id`,`customer_customer_id`) VALUES('".$content."','".$date."','".$place_id."','".$customer_id."')");

                    echo("Success");

                }else{
                echo("This place baned by admin..You can't send comment");
                }

            }else{
                echo("You were baned by admin..You can't send comment");
            }

        }

     }else{
        echo("Something wenot wrong");
     }

}else{
    echo("Invalid user");
}

?>