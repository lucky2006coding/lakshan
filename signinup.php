<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Signup</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="d-flex justify-content-center align-items-center" style="background-image: url(Free\ Vector\ _\ Detailed\ hand\ painted\ pink\ watercolour\ background.jpeg);">

    <!--popup-->

    <div id="sec1" class="d-block container d-flex flex-wrap justify-content-center align-items-center py-3" style="width: 100%; background-image: url(Free\ Vector\ _\ Detailed\ hand\ painted\ pink\ watercolour\ background.jpeg);">
        <section class="container d-flex flex-wrap justify-content-center align-items-center py-3" style="background-image: url(Free\ Vector\ _\ Detailed\ hand\ painted\ pink\ watercolour\ background.jpeg);">

            <div class="col col-10 col-lg-6 shadow-lg border-1 p-3 mt-3 justify-content-center rounded-3 d-block" id="closepop">
                <div class="form-header d-flex align-items-center justify-content-center flex-row col-12 position-relative">
                    <img src="img/multiply.png" alt="" class="closeimg position-absolute start-0 bg-transparent" onclick="closesign();">
                    <div class="fw-bold" id="pstep1">Login or Signup</div>
                </div>




                <div class="divider position-relative">
                    <hr>
                </div>




                <div class="form-content position-relative col-12 d-block" id="headdiv">
                    <div class="d-block" id="welcome">
                        <header class="head_text start-50 d-flex fs-4 justify-content-center mb-4 opacity-75">Welcome to Pheonix_cart</header>
                    </div>
                    <div class="col-12 d-none loading" style="width: 100%;" id="loaddot">
                        <div style="position: absolute;" class="offset-lg-2 offset-md-3 mt-3">
                            <p class="ms-3"> Check Your Email</p>
                        </div>
                        <div style="position: absolute;" class="offset-6 mt-2">
                            <span class="loading__dot"></span>
                            <span class="loading__dot"></span>
                            <span class="loading__dot"></span>
                        </div>
                    </div>
                    <div style="visibility: visible;" id="head">
                        <div onclick="emailerror();">
                            <div style="text-align: right; display: none;" id="error"><span style="color: #DB1010; margin-right: 10px;" id="errorem"></span></div>

                            <?php

                            if (!empty($_COOKIE["email"])) {
                            ?>
                                <input type="email" placeholder="Email" class="form-control mb-2" id="email" value="<?php echo $_COOKIE["email"] ?>" />


                            <?php
                            } else {

                            ?>
                                <input type="email" placeholder="Email" class="form-control mb-2" id="email" />


                            <?php
                            }

                            ?>
                        </div>
                        <div onclick="passerror();">
                            <div style="text-align: right; display: none;" id="errorps"><span style="color: #DB1010; margin-right: 10px;" id="errorpss"></span></div>

                            <?php

                            if (!empty($_COOKIE["password"])) {
                            ?>
                                <input type="password" value="<?php echo $_COOKIE["password"] ?>" placeholder="Password" class="form-control mb-2" id="password">



                            <?php
                            } else {

                            ?>
                                <input type="password" placeholder="Password" class="form-control mb-2" id="password">



                            <?php
                            }

                            ?>

                        </div>
                    </div>

                    <div class="row align-content-center mx-1" style="font-size: 15px; opacity: 0.9;">
                        <div class="col-6 mt-1">

                            <?php

                            if (!empty($_COOKIE["checked"])) {
                            ?>
                                <input type="checkbox" id="checkbox" checked /><label class="ms-2">Remember me</label>


                            <?php
                            } else {

                            ?>
                                <input type="checkbox" id="checkbox"/><label class="ms-2">Remember me</label>




                            <?php
                            }

                            ?>


                        </div>
                        <div class="col-6 text-end mt-1 ">
                            <label class="forgotpass" onclick="forgotpassword();">Forgot password</label>
                        </div>
                    </div>

                    <p class="mt-3 ptext mb-4 opacity-50 text-center" id="para">We’ll call or text you to confirm your number. Standard message and data rates apply. 
                        Privacy Policy</p>
                    <button type="submit" class="continueBtn col-12 mb-2" onclick="sign();">
                        Continue
                    </button>

                </div>
                <div class="d-block" id="rotateupdiv">
                    <div>
                        <div class="divider position-relative py-4">
                            <hr>
                            <span class="label position-absolute top-50 start-50 translate-middle px-3">OR</span>
                        </div>
                        <button type="submit" class="btn-outline-dark btn col-12 mb-2 d-inline-flex justify-content-center position-relative">
                            <img src="img/Facebook.png" width="25" class=" me-2 bg-transparent start-0 position-absolute mx-3" alt="">
                            <div class="opacity-75 bg-transparentn btntext">Continue with Facebook</div>
                        </button>

                        <button type="submit" class="btn-outline-dark btn col-12 mb-2 d-inline-flex justify-content-center position-relative">
                            <img src="img/Google.png" width="25" class=" me-2 bg-transparent start-0 position-absolute mx-3" alt="">
                            <div class="opacity-75 bg-transparentn btntext">Continue with Google</div>
                        </button>

                        <button type="submit" class="btn-outline-dark btn col-12 mb-2 d-inline-flex justify-content-center position-relative align-items-center">
                            <img src="img/Apple Logo.png" width="25" class=" me-2 bg-transparent start-0 position-absolute mx-3" alt="">
                            <div class="opacity-75 bg-transparentn btntext">Continue with Apple</div>
                        </button>
                    </div>




                </div>



            </div>



        </section>
    </div>

    <div id="sec2" class="d-none container d-flex flex-wrap justify-content-center align-items-center py-3" style="width: 100%; background-image: url(Free\ Vector\ _\ Detailed\ hand\ painted\ pink\ watercolour\ background.jpeg);">
        <section class="container d-flex flex-wrap justify-content-center align-items-center py-3" style="background-image: url(Free\ Vector\ _\ Detailed\ hand\ painted\ pink\ watercolour\ background.jpeg);">

            <div class="col col-10 col-lg-6 shadow-lg border-1 p-3 mt-3 justify-content-center rounded-3 d-block">
                <div class="form-header d-flex align-items-center justify-content-center flex-row col-12 position-relative">
                    <img src="img/multiply.png" alt="" class="closeimg position-absolute start-0 bg-transparent" onclick="closesign();">
                    <div class="fw-bold" id="title">Step 01</div>
                </div>




                <div class="divider position-relative">
                    <hr>

                </div>






                <div class="form-content position-relative col-12 d-block">





                    <!--caro-->
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-block w-100">
                                    <div>
                                        <div class="col-12">

                                            <div class="row align-content-center">
                                                <div class="col-lg-6 col-12 p-3">
                                                    <input class="form-control" type="text" placeholder="First name" id="fname" />
                                                </div>
                                                <div class="col-lg-6 col-12 p-3">
                                                    <input class="form-control" type="text" placeholder="Last name" id="lname">
                                                </div>
                                                <div class="col-lg-6 col-12 p-3">
                                                    <select class="form-control" type="text" placeholder="gender" id="gender">
                                                        <option value="0">select gender</option>

                                                        <?php

                                                        $gender = Database::search("SELECT * FROM `gender`");

                                                        for ($x = 0; $x < $gender->num_rows; $x++) {

                                                            $gender_id =  $gender->fetch_assoc();

                                                        ?>
                                                            <option value="<?php echo $gender_id["gender_id"] ?>"><?php echo $gender_id["gender_name"]; ?></option>
                                                        <?php

                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-12 p-3">
                                                    <select class="form-control" type="text" placeholder="country" id="country">
                                                        <option value="0">Select country</option>
                                                        <?php

                                                        $country = Database::search("SELECT * FROM `country`");

                                                        for ($y = 0; $y < $country->num_rows; $y++) {
                                                            $country_id =  $country->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $country_id["country_id"] ?>"><?php echo $country_id["country_name"]; ?></option>
                                                        <?php

                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <input class="form-control" type="text" placeholder="Verification code" id="verification" />
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div>
                                    <div>
                                        <div class="col-12">

                                            <div class="row align-content-center">
                                                <div class="col-12">
                                                    <div class="offset-3 offset-md-4 offset-lg-4" style="width: fit-content; height: fit-content;">
                                                        <div style="border-radius: 100%; width: 150px; height : 150px; background-color: aliceblue;"><img src="man.svg" style="width: 150px; height : 150px; border-radius: 100%;" /></div>
                                                        <input type="file" id="inputimage" class="d-none" />
                                                        <div class="col-12" style="text-align: right;"><label class="imghov" for="inputimage"><img src="camera-fill.svg" class="me-2" style="margin-top: -60px; height: 30px; background-color: transparent;" /></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" style="align-items: center; text-align: center;"><label for="inputimage" class="fs-6 imghov" style="margin-top: -10px; opacity: 0.8; text-decoration: underline;">Update profile photo</p>
                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <div class="row align-content-center">
                        <div style="text-align: left;" class="col-6">

                            <p class="mb-2 ms-1 fs-6 d-none" style="opacity: 0.5;" id="backemail" onclick="backemail();">
                                Back
                            </p>

                            <p class="mb-2 ms-1 fs-6 d-none" style="opacity: 0.5;" data-bs-target="#carouselExample" data-bs-slide="prev" id="backpara" onclick="onback();">
                                Back
                            </p>

                        </div>
                        <div style="text-align: right;" class="col-6">
                            <p class="mb-2 ms-1 fs-6" style="opacity: 0.5;" id="rcode">
                                Resend code : 00 : 00
                            </p>

                            <p class="mb-2 ms-1 fs-6 d-none" id="next" data-bs-target="#carouselExample" data-bs-slide="next" onclick="next();">
                                Next - >
                            </p>
                            <a class="mb-2 ms-1 fs-6 d-none" id="skip" style="text-decoration: none; color: black;" href="index.php">
                                Skip
                            </a>

                        </div>
                    </div>
                    <div>
                        <button class="continueBtn col-12 mb-2" type="button" onclick="validation();" id="conimg">
                            Continue
                        </button>

                        <button class="continueBtn col-12 mb-2" style="display: none;" type="button" id="breakimg" onclick="uploadimage();">
                            Continue
                        </button>
                    </div>
                </div>

                <!--caro-->




            </div>



    </div>



    </section>
    </div>
    <!--popup-->
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>