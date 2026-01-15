<?php

session_start();
require "connection.php";

if(isset($_SESSION["as"])){

$plc_id = $_GET["plc_id"];

$plcRs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$plc_id."'");

if($plcRs->num_rows == 1){

    $plcData = $plcRs->fetch_assoc();

    $status = $plcData["status"];

    if($status == 1){
        Database::search("UPDATE `place` SET `status`='2' WHERE `place_id`='".$plc_id."'");

        // echo ("Successblocking");

        echo("Success");
    }else{
        Database::search("UPDATE `place` SET `status`='1' WHERE `place_id`='".$plc_id."'");
    
        // echo ("SuccessUnblocking");
        echo("Success");

    }

}else{
    echo("SOMETHING WENT WRONG");
}

}else{
    echo("Invalid admin");
}

?>