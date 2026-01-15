<?php

session_start();
require "connection.php";

if (isset($_POST["place_id"]) && isset($_SESSION["u"])) {

    $place_id = $_POST["place_id"];
    $title = $_POST["t"];
    $adult_price = $_POST["ap"];
    $child_price = $_POST["cp"];
    $infant_price = $_POST["ip"];
    $discount = $_POST["d"];
    $ament_id = $_POST["aid"];
    $basicFac_id = $_POST["bfid"];
    $safety_items_id = $_POST["sf"];
    $standout_amentId = $_POST["st"];
    $discription = $_POST["disc"];
    $place_type = $_POST["type"];

    if (empty($title)) {
        echo ("Please enter title");
    } else if (strlen($title) < 0 && strlen($title) > 100) {
        echo ("your email must haven't 0-100 characters");
    } else if (empty($adult_price)) {
        echo ("Please enter adult price");
    } else if (empty($child_price)) {
        echo ("Please enter child price");
    } else if (empty($infant_price)) {
        echo ("Please enter infant price");
    } else if (empty($discription)) {
        echo ("Please enter discription");
    } else {

        $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $place_id . "'");

        if ($place_rs->num_rows == 1) {

            if (empty($discount)) {
                $discount = 0;
            }

            Database::iud("UPDATE `place` SET `title`='" . $title . "',
            `description`='" . $discription . "',
            `place_type_place_type_id`='" . $place_type . "',
            `adultprice`='" . $adult_price . "',
            `childprice`='" . $child_price . "',
            `infantprice`='" . $infant_price . "',
            `discount`='" . $discount . "' WHERE `place_id`='" . $place_id . "'");

            if (!empty($basicFac_id)) {

                $basic_facRs = Database::search("SELECT * FROM `place_has_basic_facilities` WHERE `place_place_id`='" . $place_id . "' AND `basic_facilities_bs_fac_id`='" . $basicFac_id . "'");

                if ($basic_facRs->num_rows == 0) {
                    Database::iud("INSERT INTO `place_has_basic_facilities`(`place_place_id`,`basic_facilities_bs_fac_id`,`qty`)
                   VALUES('" . $place_id . "','" . $basicFac_id . "','1')");
                }

                $place_has_facilitiesRs = Database::search("SELECT * FROM `place_has_facilities` WHERE `place_place_id`='" . $place_id . "' AND `safety_items_safety items_id`='" . $safety_items_id . "'");

                if (!empty($place_has_facilitiesRs->num_rows == 0)) {
                    Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`safety_items_safety`)
                   VALUES('" . $place_id . "','" . $safety_items_id . "')");
                }

                $place_has_facilitiesRs2 = Database::search("SELECT * FROM `place_has_facilities` WHERE `place_place_id`='" . $place_id . "' AND `amenties_amenties_id`='" . $ament_id . "'");


                if (!empty($place_has_facilitiesRs2->num_rows == 0)) {
                    Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`amenties_amenties_id`)
                   VALUES('" . $place_id . "','" . $ament_id . "')");
                }

                $place_has_facilitiesRs3 = Database::search("SELECT * FROM `place_has_facilities` WHERE `place_place_id`='" . $place_id . "' AND `standout_amenities_standout_amenities_id`='" . $standout_amentId . "'");


                if (!empty($place_has_facilitiesRs3->num_rows == 0)) {
                    Database::iud("INSERT INTO `place_has_facilities`(`place_place_id`,`standout_amenities_standout_amenities_id`)
                   VALUES('" . $place_id . "','" . $standout_amentId . "')");
                }
            }



            $length = sizeof($_FILES);

            // echo $length;

            if ($length >= 5 && $length > 0) {

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

                            Database::iud("INSERT INTO `place_img`(`path`,`place_place_id`) VALUES ('" . $file_name . "','" . $place_id . "')");
                        } else {
                            echo ("Not an allowed image type");
                        }
                    }
                }

                // echo ("Successs");
            }

            echo "Success";
        } else {
            echo ("Invalid place");
        }
    }
} else {
    echo ("Something went wrong");
}
