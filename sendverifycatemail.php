<?php

require "connection.php";


session_start();

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

 $email = $_POST["e"];
 $password = $_POST["p"];

if(empty($email)){
    echo("Please Enter your email Address");
}else if(strlen($email) < 5 || strlen($email) > 100){
    echo("Your email address must have between 10 and 100 characters");
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo("Invalid email address");
}else if(empty($password)){
    echo("Please enter your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Your email password must have between 5 and 20 characters");
}else{

  $d = new DateTime();
  $tz = new DateTimeZone("Asia/Colombo");
  $d->setTimezone($tz);
  $date = $d->format("Y-m-d H:i:s");

    $user_rs = Database::search("SELECT * FROM `customer` WHERE  `email`='".$email."'");

    if($user_rs->num_rows == 1){

        $user_details = $user_rs->fetch_assoc();

        if($user_details["password"] == $password){

            $_SESSION["u"] = $user_details;

        echo("signIn");

        }else{
            echo("Your password is wrong");
        }
      
        

    }else if($user_rs->num_rows == 0){

        $veri = uniqid();

          Database::iud("INSERT INTO `customer`(`email`,`password`,`registered_date`,`verification_code`,`gender_gender_id`,`status_status_id`) VALUES('".$email."','".$password."','".$date."','".$veri."','1','2')");
        
       $user_id = Database::$connection->insert_id;

       $user_data = Database::search("SELECT * FROM `customer` WHERE `customer_id`='".$user_id."'");

       $user_all = $user_data->fetch_assoc();
       
       $_SESSION["u"] = "";
       

        if(empty($_SESSION["u"])){
            

            

            $_SESSION["u"] = $user_all;

    
            
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
         font-family: Times New Roman;">'.$veri.'</div>';
         $mail->Body    = $bodyContent;

         if(!$mail->send()){
            echo ("Verification Code Sending Failed.");
        }else{
            echo ("signUp");
            
        }

        

        }else{
            echo("Something went wrong");
        }

    }else{
        echo("Duplicate email");
    }

}