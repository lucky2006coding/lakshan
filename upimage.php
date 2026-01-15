<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_FILES["img"])){

        $email = $_SESSION["u"]["email"];
       

       $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='".$email."'");

       if($user_rs->num_rows == 1){

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


         }else{
            echo($image["type"] + "image type is not allowed");
         }

        }else{
            echo("You are sign in previous");
        }

       }else{
        echo("Invalid user");
       }
       
    }else{
        echo("Upload image error");
    }

}else{
    echo("Invalid user");
}

?>