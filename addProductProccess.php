<?php

require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];





    $customer_rs = Database::search("SELECT * FROM `customer` WHERE `email`='" . $email . "'");



    if ($customer_rs->num_rows == 1) {
        $customer_data = $customer_rs->fetch_assoc();

        $customer_id = $customer_data["customer_id"];

        if (isset($_GET["place_cat"])) {

            $place_cat = $_GET["place_cat"];



            if ($place_cat == "undefined") {
                echo ("Please Select Category");
            } else {

                setcookie("place_cat",$place_cat,time() + 3600*24*30*3);

                // Database::iud("INSERT INTO `place`(`plc_cat_id`,`customer_customer_id`) VALUES ('" . $place_cat . "','" . $customer_id . "')");


                echo ("Success");
            }
        }





        if (isset($_GET["place_typ"])) {

            $place_type = $_GET["place_typ"];



            if ($place_type == "undefined") {
                echo ("Please select category type");
            } else {


                $last_rs =  Database::search("SELECT MAX(`place_id`) AS max_value FROM `place` WHERE customer_customer_id='" . $customer_id . "'");

                if ($last_rs->num_rows == 1) {

                    $row = $last_rs->fetch_assoc();

                    $maxValue = $row['max_value'];

                    setcookie("place_type",$place_type,time() + 3600*24*30*3);

                    // Database::iud("UPDATE `place` SET `place_type_place_type_id`='" . $place_type . "' WHERE `place_id`='" . $maxValue . "'");

                    echo ("Success");
                } else {
                    echo ("Something went wrong");
                }
            }
        }

        if (isset($_POST["coun"])) {


            $coun = $_POST["coun"];
            $address1 = $_POST["address1"];
            $address2 = $_POST["address2"];
            $city = $_POST["city"];
            $state = $_POST["state"];

            if (empty($coun)) {
                echo ("Please enter your country");
            } else if (empty($address1)) {
                echo ("Please enter address1");
            } else if (empty($address2)) {
                echo ("Please enter address1");
            } else if (empty($city)) {
                echo ("Please enter city");
            } else if (empty($state)) {
                echo ("Please enter location state");
            } else {



                $last_data =  Database::search("SELECT MAX(`place_id`) AS max_value FROM `place` WHERE customer_customer_id='" . $customer_id . "'");

                if ($last_data->num_rows == 1) {

                    $last_id = $last_data->fetch_assoc();

                    $maximValue = $last_id['max_value'];

                    setcookie("country",$coun,time() + 3600*24*30*3);
                    setcookie("address1",$address1,time() + 3600*24*30*3);
                    setcookie("address2",$address2,time() + 3600*24*30*3);
                    setcookie("city",$city,time() + 3600*24*30*3);
                    setcookie("state",$state,time() + 3600*24*30*3);

                    // Database::iud("UPDATE `place` SET `country_country_id`='" . $coun . "', `address1`='" . $address1 . "', `address2`='" . $address2 . "', `city`='" . $city . "', `state`='" . $state . "' WHERE `place_id`='" . $maximValue . "'");

                    echo ("Success");
                } else {
                    echo ("Something went wrong");
                }
            }
        }

        if (isset($_POST["fac_length"])) {

            $fac_length = $_POST["fac_length"];

            $last_data =  Database::search("SELECT MAX(`place_id`) AS max_value FROM `place` WHERE customer_customer_id='" . $customer_id . "'");

            if ($last_data->num_rows == 1) {

                $last_id = $last_data->fetch_assoc();

                $maximValue = $last_id['max_value'];




                for ($z = 1; $z < $fac_length + 1; $z++) {

                    // NOTE $z = facility id
                    // NOTE $fac_name

                    $fac_name = $_POST["fac_name" . $z];

                    setcookie("hee".$z, $fac_name,time() + 3600*24*30*3);

                    // Database::iud("INSERT INTO `place_has_basic_facilities`(`place_place_id`,`basic_facilities_bs_fac_id`,`qty`)
                        //    VALUES ('" . $maximValue . "','" . $z . "','" . $fac_name . "')");
                }

                echo ("Success");
            }
        }

        $last_detail =  Database::search("SELECT MAX(`place_id`) AS max_value FROM `place` WHERE customer_customer_id='" . $customer_id . "'");

        if ($last_detail->num_rows == 1) {

            $last_id = $last_detail->fetch_assoc();

            $maximsValue = $last_id['max_value'];

            if (isset($_GET["ament_id"])) {

                $ament_id = $_GET["ament_id"];

                // echo $ament_id;

                setcookie("ament_id".$ament_id,$ament_id,time() + 3600*24*30*3);

                // Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`amenties_amenties_id`) VALUES('" . $maximsValue . "','" . $ament_id . "')");

                echo ("Success");
            }
            if (isset($_GET["satndament_id"])) {


                $standament_id = $_GET["satndament_id"];

                setcookie("stand_id".$standament_id,$standament_id,time() + 3600*24*30*3);

                // Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`standout_amenities_standout_amenities_id`) VALUES('" . $maximsValue . "','" . $standament_id . "')");

                echo ("Success");
            }
            if (isset($_GET["safety_id"])) {
                $safety_id = $_GET["safety_id"];

                setcookie("safety_id".$safety_id,$safety_id,time() + 3600*24*30*3);


                // Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`safety_items_safety items_id`) VALUES('" . $maximsValue . "','" . $safety_id . "')");

                echo ("Success");
            }

            // echo("jmm");

            $length = sizeof($_FILES);

            if ($length <= 4 && $length > 0) {

                $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

                for ($x = 0; $x < $length; $x++) {
                    if (isset($_FILES["img" . $x])) {

                        $image_file = $_FILES["img" . $x];
                        $file_extention = $image_file["type"];

                        if (in_array($file_extention, $allowed_image_extentions)) {

                            $new_img_extention;

                            if ($file_extention == "image/jpg") {
                                $new_img_extention = ".jpg";
                            } else if ($file_extention == "image/jpeg") {
                                $new_img_extention = ".jpeg";
                            } else if ($file_extention == "image/png") {
                                $new_img_extention = ".png";
                            } else if ($file_extention == "image/svg+xml") {
                                $new_img_extention = ".svg";
                            }

                            $file_name = "/upproduct//" . "_" . $x . "_" . uniqid() . $new_img_extention;
                            move_uploaded_file($image_file["tmp_name"], $file_name);

                            setcookie("imgplace".$x,$file_name,time() + 3600*34*30*3);

                            // Database::iud("INSERT INTO `place_img`(`path`,`place_place_id`) VALUES ('" . $file_name . "','" . $maximsValue . "')");
                        } else {
                            echo ("Not an allowed image type");
                        }
                    }
                }

                echo ("Product images saved successfully");
            }

            if(isset($_GET["title"])){

                if(empty($_GET["title"])){
                    echo("Please enter title");
                }else if(strlen($_GET["title"]) > 100){
                     echo("title must have least 100 characters");
                }else{

                $title = $_GET["title"];

                setcookie("title",$title,time() + 3600*24*30*3);

                // Database::iud("UPDATE `place` SET `title`='".$title."' WHERE `place_id`='".$maximsValue."'");

                echo("Success");
                }
            }

            if(isset($_GET["disc"])){

                $discription = $_GET["disc"];

                if(strlen($discription) > 500){

                    echo("You can use least 500 characters");

                }else{

                if(empty($discription)){

                // Database::iud("UPDATE `place` SET `description`='Do you like enjoy better experience..! Please come with me' WHERE `place_id`='".$maximsValue."'");

                echo("Success");
                

                }else{

                    setcookie("discription",$discription,time() + 3600*24*30*3);

                // Database::iud("UPDATE `place` SET `description`='".$discription."' WHERE `place_id`='".$maximsValue."'");

                echo("Success");
                }
            }
                
            }

            if(isset($_POST["adpr"])){

              $adpr = $_POST["adpr"];
              $chpr = $_POST["chpr"];
              $inf = $_POST["inf"];

              if(empty($adpr)){
                echo("Please enter adult 1night price");
              }else if(!preg_match("/[0-9]/" ,$adpr)){
                echo("you can have add numbers");
              }else if(empty($chpr)){
                echo("Please enter children 1night price");
              }else if(!preg_match("/[0-9]/" ,$chpr)){
                echo("you can have add numbers");
              }else if(empty($inf)){
                echo("Please enter infant 1night price");
              }else if(!preg_match("/[0-9]/" ,$inf)){           //note
              echo("you can have add numbers");
            }else{

                setcookie("adultprice",$adpr,time() + 3600*24*30*3);
                setcookie("childprice",$chpr,time() + 3600*24*30*3);
                setcookie("infantprice",$inf,time() + 3600*24*30*3);


           
                // Database::iud("UPDATE `place` SET `adultprice`='".$adpr."',`childprice`='".$chpr."',`infantprice`='".$inf."'  WHERE `place_id`='".$maximsValue."'");
         
             echo("Success");
        }

            }


        }

    } else {
        echo ("Invalid enter");
    }
} else {
    echo ("Invalid user");
}
