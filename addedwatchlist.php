<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $cus_id = $_SESSION["u"]["customer_id"];
        $pid = $_GET["id"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `place_place_id`='".$pid."' AND 
        `customer_customer_id`='".$cus_id."'");

        $watchlist_num = $watchlist_rs->num_rows;

        if($watchlist_num == 1){
            $watchlist_data = $watchlist_rs->fetch_assoc();
            $list_id = $watchlist_data["watchlist_id"];

            Database::iud("DELETE FROM `watchlist` WHERE `watchlist_id`='".$list_id."'");
            echo ("Removed");

        }else{
            Database::iud("INSERT INTO `watchlist`(`place_place_id`,`customer_customer_id`) VALUES ('".$pid."','".$cus_id."')");
            echo ("Added");

        }

    }else{
        echo ("Somethng went wrong. Please try again later.");
    }

}else{
    echo ("please Login First");
}



?>