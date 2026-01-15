<?php

session_start();
require "connection.php";

if(isset($_POST["verify"])){

  if(empty($_POST["verify"])){

    echo("Enter verification code");
}else{

    $verification_code = $_POST["verify"];
    
    $uniqadmin = Database::search("SELECT * FROM `admin` WHERE `uniqid`='". $verification_code ."'");

    if($uniqadmin->num_rows == 1){

        $uniqadmindata = $uniqadmin->fetch_assoc();

        $_SESSION["as"] = $uniqadmindata;

        echo("success");

    }else{
        echo("Your verication code is wrong");
    }

  }

}else{
    echo("Enter verification code");
}


?>