<?php

require "connection.php";
session_start();

$user_id = $_SESSION["u"]["customer_id"];

$place_id = $_GET["p"];

$place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$place_id."' AND `customer_customer_id`='".$user_id."'");

if($place_rs->num_rows == 1){

    Database::iud("DELETE FROM `place` WHERE `place_id`='".$place_id."' AND `customer_customer_id`='".$user_id."'");

    echo ("Success");

}else{
    echo("Something went wrong");
}

?>