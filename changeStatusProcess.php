<?php

require "connection.php";

$place_id = $_GET["p"];

$place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$place_id."'");

if($place_rs->num_rows == 1){

    $place_data = $place_rs->fetch_assoc();
    $status = $place_data["status"];

    if($status == 1){
        Database::iud("UPDATE `place` SET `status`='2' WHERE `place_id`='".$place_id."'");
        echo ("deactivated");
    }else if($status == 2){
        Database::iud("UPDATE `place` SET `status`='1' WHERE `place_id`='".$place_id."'");
        echo ("activated");
    }

}else{
    echo ("Something went wrong. Try again later.");
}

?>