<?php 

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

 $place_id = $_GET["place"];

 $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='".$place_id."'");

 $place_num = $place_rs->num_rows;

 if($place_num == 1){
    $place_data = $place_rs->fetch_assoc();
    $_SESSION["p"] = $place_data;
   //  echo $_SESSION["p"]["place_id"];
    echo ("success");

   }else{
      echo ("Something went wrong. Please try again later.");
  }
}else{
   echo("Invalid user");
}
  
?>