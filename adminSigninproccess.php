<?php

require "connection.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

if (empty($email)) {
    echo ("Please Enter your email Address");
} else if (strlen($email) < 5 || strlen($email) > 100) {
    echo ("Your email address must have between 10 and 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email address");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Your email password must have between 5 and 20 characters");
} else {

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");


    if ($admin_rs->num_rows == 1) {

        $admin_data = $admin_rs->fetch_assoc();

        $_SESSION["as"] = $admin_data;

        $veri = uniqid();

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
        $mail->Subject = 'Pheonix_cart Forgot Password Verification Code';
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

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("UPDATE `admin` SET `lastlogindate`='" . $date . "',`uniqid`='" . $veri . "' WHERE `email`='" . $email . "'");

?>

            <div class="col-12" id="verifyadmin" style="background-color: transparent;">

                <div class="col-12 p-2" style="background-color: transparent;">
                    <span class="col-12" style="background-color: transparent;">Veification Code</span>
                    <div class="col-12 mt-2">
                        <input type="text" class="col-12 form-control" placeholder="ex : 65tvae91m/9" id="verificationadmin" />
                    </div>
                </div>
                <div class="col-12 mt-2 p-2 text-center" style="background-color: transparent;">
                    <span class="opacity-75" style="font-size: 15px; background-color: transparent;">We’ll call or text you to
                        confirm your number. Standard message and data rates apply. Privacy Policy</span>
                </div>
                <div class="col-12 p-3" style="background-color: transparent;">
                    <button class="btn btn-primary col-12" onclick="adminverify();">Verify you</button>
                </div>

            </div>

<?php

        }
    } else {
        echo ("Your email or password wrong");
    }
}

?>