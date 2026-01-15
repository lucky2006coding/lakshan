<?php

session_start();
require "connection.php";

// if (isset($_SESSION["u"])) {

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Signup</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="container-fluid">

                <!--header-->
<div class="col-12">
    <?php require "header.php" ?>
</div>
            <!--header-->

        <div class=" col-12">



            

        <?php


        $place_id = $_SESSION["p"]["place_id"];

        $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $place_id . "'");

        $place_data = $place_rs->fetch_assoc();

        $plc_hscus = Database::search("SELECT * FROM `customer` INNER JOIN `place` ON `customer`.`customer_id`=`place`.`customer_customer_id` 
        WHERE `place`.`place_id` = '" . $place_id . "'");

        $plc_hscudData = $plc_hscus->fetch_assoc();

        $status_rs = Database::search("SELECT * FROM `status` WHERE `status_id`='" . $place_data["status"] . "'");

        $status_data = $status_rs->fetch_assoc();

        $country_id = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $place_data["country_country_id"] . "'");

        $country_data = $country_id->fetch_assoc();

        $placebasic_facility = Database::search("SELECT * FROM basic_facilities INNER JOIN place_has_basic_facilities 
ON basic_facilities.bs_fac_id=place_has_basic_facilities.basic_facilities_bs_fac_id WHERE place_has_basic_facilities.place_place_id='" . $place_id . "'");


        $placeimg_rs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $place_id . "'");


        for ($x = 0; $x < $placeimg_rs->num_rows; $x++) {

            $placeimg_data = $placeimg_rs->fetch_assoc();

            $img[$x] = $placeimg_data["path"];
            echo ("<br/>");
        }



        //note : if no plce image redirect update profile
        ?>

        <div class="row col-12 align-content-center" style="margin-top: -100px;">
            <div class="col-6" style="text-align: start;">
                <h3 class="fw-bold ms-4"><?php echo $place_data["title"]; ?></h3>
            </div>
            <div class="col-6" style="text-align: right;">

                <?php

                if ($place_data["status"] == 1) {
                ?>
                    <span class="text-primary"><?php echo $status_data["status_name"]; ?></span> &nbsp;&nbsp;

                <?php
                } else {
                ?>
                    <span class="text-danger"><?php echo $status_data["status_name"]; ?></span> &nbsp;&nbsp;

                <?php
                }

                $place_id = $place_data["place_id"];

                $onenightadultprice = $place_data["adultprice"];


                $customer_id = $_SESSION["u"]["customer_id"];

                $watchlistRs = Database::search("SELECT * FROM `watchlist` WHERE `customer_customer_id`='" . $customer_id . "' AND `place_place_id`='" . $place_id . "'");

                if ($watchlistRs->num_rows == 1) {
                ?>
                    <img src="Daco_4110701.png" style="width: 25px; height: 20px; margin-right: 10px;" data-value="<?php echo $place_id ?>" onclick="favo(this);" />

                <?php

                } else {
                ?>
                    <img src="Daco_4421474.png" style="width: 25px; height: 20px; margin-right: 10px;" data-value="<?php echo $place_id ?>" onclick="favo(this);" />
                <?php
                }

                ?>
            </div>
        </div>
        <div class="row col-12 align-content-center mt-3">

            <div class="col-12 col-lg-6">
                <div class="row ms-2">
                    <img class="col-12" src="<?php echo $img["0"]; ?>" style="border-radius: 20px; height: 400px;" />
                </div>
            </div>

            <div class="col-lg-3  d-lg-block d-none">
                <div class="col-12" style="height: 400px;">
                    <img class="col-12" src="<?php echo $img["1"]; ?>" style="border-radius: 20px; height: 195px;" />
                    <div class="col-12" style="height: 10px;"></div>
                    <img class="col-12" src="<?php echo $img["2"]; ?>" style="border-radius: 20px; height: 195px;" />
                </div>
            </div>
            <div class="col-lg-3 d-lg-block d-none">
                <div class="col-12" style="height: 400px;">
                    <img class="col-12" src="<?php echo $img["3"]; ?>" style="border-radius: 20px; height: 195px;" />
                    <div class="col-12" style="height: 10px;"></div>
                    <img class="col-12" src="<?php echo $img["0"]; ?>" style="border-radius: 20px; height: 195px;" />
                </div>
            </div>

        </div>

        <div class="row col-12 mt-3 align-content-center">
            <div style="text-align: start;" class="col-8">
                <h5 class="placename ms-4"><?php echo $place_data["city"] . " , " . $country_data["country_name"] ?></h5>
                <h6 class="placename ms-4">

                    <?php

                    for ($y = 0; $y < $placebasic_facility->num_rows; $y++) {
                        $placebasic_facilitydata = $placebasic_facility->fetch_assoc();
                    ?>
                        &star; <?php echo $placebasic_facilitydata["bs_fac_name"] . " : " . $placebasic_facilitydata["qty"] ?>


                    <?php
                    }

                    ?>

                </h6>

            </div>
            <div style="text-align: right;" class="col-4">
                <span>
                    <h6 class="showmorepic" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Show more...</h6>
                </span>
                
            </div>
        </div>

        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top offcanvas</button> -->

        <div class="offcanvas offcanvas-top" tabindex="-1" style="height: 100vh;" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasTopLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="row align-content-center col-12 ms-2">

                    <?php

                    $placeimg = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $place_id . "'");


                    for ($l = 0; $l < $placeimg->num_rows; $l++) {
                        $placeimages = $placeimg->fetch_assoc();
                    ?>


                        <div class="col-lg-4 col-12">

                            <div class="col-12" style="height: 10px;"></div>

                            <img class="col-12 d-none d-lg-block d-md-block" src="<?php echo $placeimages["path"]; ?>" style="border-radius: 20px; height: 225px;" />
                            <img class="col-12 d-block d-lg-none d-md-noe" src="<?php echo $placeimages["path"]; ?>" style="border-radius: 20px;" />

                            <div class="col-12" style="height: 10px;"></div>
                        </div>


                    <?php
                    }

                    ?>




                </div>
            </div>
        </div>

     <div class="col-12 px-4 py-2">
        
     <?php

$comment_rssingle_Place = Database::search("SELECT * FROM `comment` WHERE `comment`.place_place_id='" . $_SESSION["p"]["place_id"]. "';");

     ?>

       
     <label class="form-lable seecomentText" onclick="seecoments();">Comment <b>(<?php
     
      if(!empty($comment_rssingle_Place->num_rows)){
        echo $comment_rssingle_Place->num_rows ;
      }else{
        echo "No comment yet";
      }

     ?>)</b></label>
      
     </div>

        <div class="col-12 d-none" id="comentBox">
        <?php  require "comment.php" ?>
        </div>


        <div class="row col-12 mt-3 align-content-center">

            <div class="col-12 col-lg-7">
                <div class="ms-4 d-none d-lg-block">
                    <label>
                        <h6 class="hostname">Hosted By : <?php echo $plc_hscudData["fname"] . " " . $plc_hscudData["lname"] ?></h6>
                    </label><br />
                </div>
                <div class="row col-12 align-content-center">
                    <div class="col-4 ms-4">

                        <?php

                        $plc_hscusImage = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $plc_hscudData["customer_id"] . "'");

                        if ($plc_hscusImage->num_rows == 1) {

                            $plc_hscusImagedata = $plc_hscusImage->fetch_assoc();
                        ?>
                            <img src="<?php echo $plc_hscusImagedata["path"]; ?>" style="height: 80px; width: 80px; border-radius: 100%;" />

                        <?php
                        } else {
                        ?>
                            <img src="img/home/male.png" style="height: 80px; width: 80px; border-radius: 100%;" />

                        <?php
                        }

                        ?>

                    </div>


                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="col-12 text-center">

                            <label class="mt-2">
                                <h6 class="hostname mt-2"><?php echo $plc_hscudData["email"]; ?></h6>
                            </label>
                            <p class="hostname"><?php echo $plc_hscudData["mobile"] ?></p>

                        </div>
                    </div>
                    <div class="col-7 d-lg-none text-center">
                        <label class="mt-0">
                            <h6 class="hostname mt-0" style="margin-top: -2px;">Hosted By : <?php echo $plc_hscudData["fname"] . " " . $plc_hscudData["lname"] ?></h6>
                        </label><br />
                        <span class="hostname"><?php echo $plc_hscudData["email"]; ?><span>
                                <span class="hostname"><?php echo $plc_hscudData["mobile"] ?></span>
                    </div>
                </div>
            </div>

            <!-- Large box reserve  -->

            <div class="col-12 col-lg-4 mt-3 shadow-lg reservebox d-none d-lg-block">

                <div class="col-12 mt-3">
                    <div class="row col-12 align-content-center">
                        <div class="col-6">
                            <h5 class=" ms-3 mt-2">LKR <?php echo $place_data["adultprice"] ?></h5>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <h6 class=" ms-3 mt-2">&star; 4.6 reviews</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="row align-content-center" style="border-radius: 20px;">
                        <div class="offset-1 col-5 resoprice bg-success" style="border-radius: 10px 0px 0px 0px;">
                            <input type="date" class="datead bg-success text-white col-12" id="lagdate1" />
                        </div>
                        <div class="col-5 resoprice bg-danger" style="  border-radius: 0px 10px 0px 0px;">
                            <input type="date" class="datead bg-danger text-white col-12" id="lagdate2" />
                        </div>
                        <div class="offset-1 col-10 resoprice" style="border-radius: 0px 0px 10px 10px;" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                            Guests</div>
                        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title mt-5" id="staticBackdropLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mt-5">
                                <div>
                                    <!--prices-->

                                    <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                    <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                        <div class="col-9 d-flex justify-content-center flex-column">
                                            <h4 class=" p-3">Adult</h4>
                                        </div>
                                        <div class="col-3 d-flex justify-content-center align-items-center ">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper(this,'0')"> - </button>
                                            <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt0">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper(this,'0')"> + </button>
                                        </div>
                                    </label>

                                    <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                    <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                        <div class="col-9 d-flex justify-content-center flex-column">
                                            <h4 class=" p-3">Child</h4>
                                        </div>
                                        <div class="col-3 d-flex justify-content-center align-items-center ">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper(this,'1')"> - </button>
                                            <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt1">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper(this,'1')"> + </button>
                                        </div>
                                    </label>

                                    <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                    <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                        <div class="col-9 d-flex justify-content-center flex-column">
                                            <h4 class=" p-3">Infant</h4>
                                        </div>
                                        <div class="col-3 d-flex justify-content-center align-items-center ">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper(this,'2')"> - </button>
                                            <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt2">
                                            <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper(this,'2')"> + </button>
                                        </div>
                                    </label>

                                    <!--prices-->
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="continueBtn ms-4" style="width: 88.5%;" onclick="paynow(<?php echo $place_id; ?>);">Reserve</button>

                        </div>

                        <div class="mt-3 text-center col-12">
                            <?php

                            $charged_rs = Database::search("SELECT * FROM `invoice` WHERE `place_place_id`='" . $place_id . "' 
                             AND `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "'");

                            if ($charged_rs->num_rows == 0) {
                            ?>
                                <span style="opacity: 0.9">You don't charged yet</span>
                            <?php
                            } else {

                                // get date in datetime 
                                $charged_rs1 = Database::search("SELECT DATE(issuedate) AS extracted_date FROM invoice WHERE `place_place_id`='" . $place_id . "' 
                AND `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "' ORDER BY `issuedate` DESC LIMIT 1");

                                $charged_data = $charged_rs1->fetch_assoc();

                                $getdate = $charged_data["extracted_date"];

                                $d = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $d->setTimezone($tz);
                                $nowdate = $d->format("Y-m-d");

                                $gettingdate = new DateTime($nowdate);
                                $presentdate = new DateTime($getdate);

                                $interval = $gettingdate->diff($presentdate);
                                $staydateago = $interval->days; //stay dates

                            ?>


                                <span style="opacity: 0.9">You last charged this <?php echo $staydateago ?> days ago</span>
                            <?php
                            }

                            ?>
                        </div>
                        <div class="row ms-0" id="oneNghtprice" style="align-content: center;">

                            <div class="mt-3 col-6 text-start">
                                <span class="ms-3">LKR <?php echo $onenightadultprice ?> * 1 night</span>
                            </div>
                            <div class="mt-3 col-6" style="text-align: right;">
                                <span class="ms-4" style="margin-right: 9%;">LKR <?php echo $onenightadultprice ?></span>
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>
                            <div class=" col-6 text-start">
                                <span class="ms-3">Total Price</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <span class="ms-4" style="margin-right: 9%;">LKR <?php echo $onenightadultprice ?></span>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                        </div>

                    </div>
                </div>

            </div>


        <!-- Large box reserve  -->

            <div class="col-12 col-lg-7 mt-3">
                <div class="ms-4">
                    <textarea class="col-12 disript" readonly rows="10">
                        <?php echo $place_data["description"]; ?>
                    </textarea>
                </div>
                <div class="ms-4">
                </div>
            </div>

        <!-- small medium box reserve  -->


            <div class="col-12  mt-3 ms-3  shadow-lg reservebox2 d-lg-none">

                <div class="col-12 mt-3">
                    <div class="row col-12 align-content-center">
                        <div class="col-6">
                            <h5 class=" ms-3 mt-2">LKR <?php echo $place_data["adultprice"] ?></h5>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <h6 class=" ms-3 mt-2">&star; 4.6 reviews</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="row align-content-center" style="border-radius: 20px;">
                        <div class="offset-1 col-5 resoprice bg-success" style="border-radius: 10px 0px 0px 0px;">
                            <input type="date" class="datead bg-success text-white col-12" id="smalDate1" value="0" />
                        </div>
                        <div class="col-5 resoprice bg-danger" style="  border-radius: 0px 10px 0px 0px;">
                            <input type="date" class="datead bg-danger text-white col-12" id="smalDate2" value="0" />
                        </div>
                        <div class="offset-1 col-10 resoprice" style="border-radius: 0px 0px 10px 10px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Guests
                        </div>


                        <div class="offcanvas offcanvas-bottom" style="height: 70%;" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                <!--prices-->

                                <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                    <div class="col-9 d-flex justify-content-center flex-column">
                                        <h4 class=" p-3">Adult</h4>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center align-items-center ">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper1(this,'0')"> - </button>
                                        <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt10">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper1(this,'0')"> + </button>
                                    </div>
                                </label>

                                <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                    <div class="col-9 d-flex justify-content-center flex-column">
                                        <h4 class=" p-3">Child</h4>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center align-items-center ">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper1(this,'1')"> - </button>
                                        <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt11">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper1(this,'1')"> + </button>
                                    </div>
                                </label>

                                <input type="checkbox" class="d-none" value="ok" id="chechbfac" />
                                <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                    <div class="col-9 d-flex justify-content-center flex-column">
                                        <h4 class=" p-3">Infant</h4>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center align-items-center ">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper1(this,'2')"> - </button>
                                        <input type="number" class="col-6 border-0 ms-3" min="0" max="20" step="1" value="0" id="numberInpunt12">
                                        <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper1(this,'2')"> + </button>
                                    </div>
                                </label>



                                <!--prices-->
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="reserveBtn ms-4 col-11" onclick="paynow2(<?php echo $place_id ?>)">Reserve</button>
                        </div>

                        <div class="mt-3 text-center col-12">

                            <?php

                            $charged_rs = Database::search("SELECT * FROM `invoice` WHERE `place_place_id`='" . $place_id . "' 
                                AND `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "'");

                            if ($charged_rs->num_rows == 0) {
                            ?>
                                <span style="opacity: 0.9">You don't charged yet</span>
                            <?php
                            } else {

                                // get date in datetime 
                                $charged_rs1 = Database::search("SELECT DATE(issuedate) AS extracted_date FROM invoice WHERE `place_place_id`='" . $place_id . "' 
                                    AND `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "' ORDER BY `issuedate` DESC LIMIT 1");

                                $charged_data = $charged_rs1->fetch_assoc();

                                $getdate = $charged_data["extracted_date"];

                                $d = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $d->setTimezone($tz);
                                $nowdate = $d->format("Y-m-d");

                                $gettingdate = new DateTime($nowdate);
                                $presentdate = new DateTime($getdate);

                                $interval = $gettingdate->diff($presentdate);
                                $staydateago = $interval->days; //stay dates

                            ?>


                                <span style="opacity: 0.9">You last charged this <?php echo $staydateago ?> days ago</span>
                            <?php
                            }

                            ?>
                        </div>

                        <div class="row ms-0" id="oneNghtprice1" style="align-content: center;">
                            <div class="mt-3 col-6 text-start">
                                <span class="ms-3">LKR <?php echo $onenightadultprice ?> * 1 night</span>
                            </div>
                            <div class="mt-3 col-6" style="text-align: right;">
                                <span style="margin-right: 9%;">LKR <?php echo $onenightadultprice ?></span>
                            </div>


                            <div class="col-12">
                                <hr />
                            </div>
                            <div class=" col-6 text-start">
                                <span class="ms-3">Total Price</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <span style="margin-right: 9%;">LKR <?php echo $onenightadultprice ?></span>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                        </div>

                    </div>
                </div>

            </div>

        <!-- small medium box reserve  -->


            <div class="col-12 mt-4 ms-4">

                <div class="col-12 mt-3" style="height: 200px;">

                    <h4>What is the place offers ? </h4>

                    <div class="row mt-4 align-content-center justify-content-center text-align-center">

                        <?php


                        $cus_hasamenRs = Database::search("SELECT * FROM `place` 
INNER JOIN `place_has_facilities` ON `place`.`place_id`=`place_has_facilities`.`place_place_id`
INNER JOIN `amenties` ON `place_has_facilities`.`amenties_amenties_id` = `amenties`.`amenties_id`
WHERE `place`.`place_id`='" . $place_id . "'");

                        for ($z = 0; $z < $cus_hasamenRs->num_rows; $z++) {

                            $cus_hasamendata = $cus_hasamenRs->fetch_assoc();
                        ?>

                            <div class="col-6 col-lg-4 text-center ">
                                <hr />
                                <img src="img/Apple Logo.png" height="50px" />&nbsp;&nbsp;
                                <label class="ms-3"><?php echo $cus_hasamendata["amenties_name"]; ?></label>
                                <hr />
                            </div>

                        <?php
                        }
                        ?>







                    </div>
                </div>

            </div>



            <button class="btn btn-primary d-none" value="<?php echo $place_id; ?>" onclick="addinvo();" id="btnaddInvoice">ADD INVOICE</button>

        </div>



    </div>

    </div>
    </div>

    <script src="script.js"></script>
    <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
// }else{
// echo("Invalid user : Please sign in");
// }
?>