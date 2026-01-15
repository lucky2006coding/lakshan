<?php

require "connection.php";
session_start();


$item = $_POST["item"];
$nameitem = $_POST["nameitem"];
$priceitem = $_POST["priceitem"];

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

if (isset($_SESSION["as"])) {


    $email = $_SESSION["as"]["email"];

    if ($item == 0) {
        echo ("Please select item category");
    } else if (empty($nameitem)) {
        echo ("Please insert item name for save");
    } else if (empty($priceitem)) {
        echo ("Plese insert item price for selling");
    } else if (!preg_match("/[0-9]/", $priceitem)) {
        echo ("You can only enter number of price");
    } else {


        if (!isset($_POST["varify"])) {

        

            $veri = uniqid();

            setcookie("verify", $veri, time() + 3600 * 24);


            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pkumarasiri30342@gmail.com';
            $mail->Password = 'ysijxbvdjdpxicxw';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('pkumarasiri30342@gmail.com', 'Reset Password');
            $mail->addReplyTo('pkumarasiri30342@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Forgot Password Verification Code';
            $bodyContent = '<div style="width: fit-content;
             height: max-content;  
             border-radius: 20px;
             margin-left: 300px;
             margin-top: 100px;
             border-color: blue;
             border-style: solid;
             border-width: 3px; 
             text-align: center;
             display: table-cell;
             vertical-align: middle;
             font-size: 30px;
             font-family: Times New Roman;">' . $veri . '</div>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo ("Verification Code Sending Failed.");
            } else {
?>

                <div class="col-12 mt-2">
                    <input type="text" class="col-12 form-control mt-2" placeholder="Verification code" id="verifyadmincat" />
                    <button class="btn btn-primary col-12 mt-2" onclick="verifyCategory();">Verify You</button>
                </div>

<?php
            }
        }

        if (isset($_POST["varify"])) {

            if (isset($_COOKIE["verify"])) {

                $verify = $_COOKIE["verify"];

                $emailverificod = $_POST["varify"];

                if ($verify == $emailverificod) {

                    if ($item == 1) {
                        Database::iud("INSERT INTO `place_category`(`plc_cat_name`,`autpricecat`) VALUES('" . $nameitem . "','" . $priceitem . "')");

                        echo "adding successfull";
                    }

                    if ($item == 2) {
                        Database::iud("INSERT INTO `amenties`(`amenties_name`,`autpriceamen`) VALUES('" . $nameitem . "','" . $priceitem . "')");

                        echo "adding successfull";
                    }

                    if ($item == 3) {
                        Database::iud("INSERT INTO `standout_amenities`(`standout_amenities_name`,`autstaprice`) VALUES('" . $nameitem . "','" . $priceitem . "')");

                        echo "adding successfull";
                    }

                    if ($item == 4) {
                        Database::iud("INSERT INTO `safety_items`(`safety items_name`,`safety_itemprice`) VALUES('" . $nameitem . "','" . $priceitem . "')");

                        echo "adding successfull";
                    }
                } else {
                    echo ("Invalid verification code");
                }
            } else {
                echo ("You were not accept our cookies");
            }
        }
    }
}else{
    echo("Invalid admin");
}

?>