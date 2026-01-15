<?php

require "connection.php";
session_start();

if(isset($_SESSION["u"])){

$user_email = $_SESSION["u"]["email"];


$fn = $_POST["f"];
$ln = $_POST["l"];
$email = $_POST["em"];
$password = $_POST["pw"];
$mobile = $_POST["m"];
$gender = $_POST["gen"];
$nic = $_POST["nic"];
$country = $_POST["cry"];
$address = $_POST["adr"];

//Note = else if lader


     $user = Database::search("SELECT * FROM `customer` WHERE `email`='".$user_email."'");

     
     
     if($user->num_rows == 1){

     
    Database::iud("UPDATE `customer` SET `fname`='".$fn."',`lname`='".$ln."',`email`='".$email."',`password`='".$password."',
    `mobile`='".$mobile."',`gender_gender_id`='".$gender."',`address`='".$address."',`country_id`='".$country."',`nic`='".$nic."' WHERE `email`='".$user_email."'");

    echo("Success");

     }else{
        echo("Please sign in first");
     }
//Note =  email upload error

     if(isset($_FILES["img"])){

        $image = $_FILES["img"];

        
       $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='".$user_email."'");


        $user_data = $user_rs->fetch_assoc();

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='".$user_data["customer_id"]."'");

        if($image_rs->num_rows == 0){

            $image = $_FILES["img"];

            $allowed_image_extentions = array("image/jpeg","image/jpg","image/png","image/svg+xml");

            $file_type = $image["type"];

         if(in_array($file_type,$allowed_image_extentions)){
            
            $type_exten;

            if($file_type == "image/jpeg"){
                $type_exten = ".jpeg";
            }else if($file_type == "image/jpg"){
                $type_exten = ".jpg";
            }else if($file_type == "image/png"){
                $type_exten = ".png";
            }else if($file_type = "image/svg+xml"){
                $type_exten = ".svg";
            }

            
            

            $file_name ="/userimg//".uniqid()."_".$user_data["fname"]."_".$type_exten;
            move_uploaded_file($image["tmp_name"],$file_name);

            Database::iud("INSERT INTO `profile_img`(`path`,`customer_customer_id`)
                   VALUES('".$file_name."','".$user_data["customer_id"]."')");

                   echo("Success");
        }

     }else{

        $image = $_FILES["img"];

            $allowed_image_extentions = array("image/jpeg","image/jpg","image/png","image/svg+xml");

            $file_type = $image["type"];

         if(in_array($file_type,$allowed_image_extentions)){
            
            $type_exten;

            if($file_type == "image/jpeg"){
                $type_exten = ".jpeg";
            }else if($file_type == "image/jpg"){
                $type_exten = ".jpg";
            }else if($file_type == "image/png"){
                $type_exten = ".png";
            }else if($file_type = "image/svg+xml"){
                $type_exten = ".svg";
            }

            
            

            $file_name ="/userimg//".uniqid()."_".$user_data["fname"]."_".$type_exten;
            move_uploaded_file($image["tmp_name"],$file_name);

            Database::iud("UPDATE `profile_img` SET `path`='".$file_name."' WHERE `customer_customer_id`='".$user_data["customer_id"]."'");

                   echo("Success");

     }
    
}

    
     
     }
}else{
    echo("Invalid user");
}
