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
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>


<body>
    <div class="d-block">
        <!--header-->

        <div class="col-12">
            <div class="row col-12 align-content-center">


                <div class="col-lg-1 col-md-1 col-3">
                    <img src="5-2-phoenix-picture (1).png" class="mt-2" style="width: 100px; height: 100px;" />
                </div>
                <div class="col-lg-2 text-start mt-3 d-none d-lg-block">
                    <p class="fs-4 mt-4" style="font-style: italic; font-weight: bold; margin-left: -10px; font-family: 'Times New Roman'; color: rgb(255, 109, 73);">PHEONIX_cart</p>
                </div>

                <div class="col-6 mt-4 ">

                    <input class="col-12 rounded-5 p-3 border-0 shadow-lg" type="search" placeholder="Search" aria-label="Search" id="search">
                    <button class="btn btn-danger search_btn rounded-circle mt-2" type="submit" style="position: absolute; margin-left: -50px;" onclick="basicSearch(0);"><i class='bx bg-transparent bx-search fw-bold'></i></button>

                </div>

                <div class="col-3 offset-lg-2 offset-md-2 col-lg-1 col-md-1 mt-4">
                    <div class="row shadow-lg" style="width: 100px; border-radius: 100%;">

                        <div class="col-6 px-2" style="border-radius: 15px;">

                            <!--Offcanvas-->

                            <i class='bx bx-menu fs-1 nav-link mt-lg-2 mt-3 mb-lg-2' data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title mt-5 ms-2" id="offcanvasRightLabel">PHEONIX_cart.....!!!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p onclick="profile();" class="listing-items">My Profile</p>
                                        </li>
                                        <li>
                                            <p onclick="myproduct();" class="listing-items">My Sellings</p>
                                        </li>
                                        <li>
                                            <p onclick="addproduct();" class="listing-items">My Products</p>
                                        </li>
                                        <li>
                                            <p onclick="watchlist();" class="listing-items">Watchlist</p>
                                        </li>
                                        <li>
                                            <p onclick="invoices();" class="listing-items">Product History</p>
                                        </li>
                                        <li style="color: black;">
                                            <p onclick="profile();" class="listing-items">Contact Admin</p>
                                        </li>
                                        <li>
                                            <p onclick="adminlogin();" class="listing-items">Admin login</p>
                                        </li>
                                        <li><span class="listing-items" onclick="signout();">Log out</span></li>
                                    </ul>

                                </div>
                            </div>
                            <!--offcanvas-->

                        </div>
                        <div class="col-6 p-2" style="border-radius: 15px;" onclick="profile();">

                            <?php
                            if (isset($_SESSION["u"])) {

                                $email = $_SESSION["u"]["email"];

                                $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='" . $email . "'");


                                $user_data = $user_rs->fetch_assoc();

                                $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $user_data["customer_id"] . "'");

                                $image_data = $image_rs->fetch_assoc();

                                if ($image_data == 0) {
                            ?>
                                    <img src="img/home/male.png" alt="" class="profile_img">
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo $image_data["path"] ?>" alt="" class="profile_img">
                                <?php
                                }
                            } else {
                                ?>
                                <img src="img/home/male.png" alt="" class="profile_img">
                            <?php
                            }



                            ?>
                        </div>
                    </div>

                </div>






            </div>
            <hr />
        </div>
    </div>
    <!--header-->
    <div class=" col-12">



        <!--advanced serch-->


        <div class=" col-12 text-center mt-1 ms-2 ms-lg-0">

            <div class="col-12 px-5">
                <button class="continueBtn mt-3 col-12" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Advanced search</button>

            </div>



            <!-- offcanvas advancedSearch  -->



            <div class="offcanvas offcanvas-top " tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" style="height: 70%;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="row col-12 text-center">

                        <div class="col-12 bg-primary ms-2" style="border-radius: 10px;">
                            <div class="col-12 text-center ms-1 bg-primary ">
                                <span class="text-white fw-bold fs-1 bg-primary" style="font-family: serif;"> Advanced Search </span>
                            </div>
                        </div>

                        <div class="col-12 mt-3 text-center">

                            <div class="col-6 offset-3 col-lg-6 text-center">
                                <input type="text" id="advancedSearch" placeholder="search" class="form-control col-12" />
                            </div>

                            <div class="row col-12 align-content-center ms-3">
                                <div class="col-6 col-lg-4 text-center mt-3">
                                    <select class="form-control col-12" id="searchplaceCat">
                                        <option value="0">Select place Categories</option>

                                        <?php

                                        $place_catRs = Database::search("SELECT * FROM `place_category`");

                                        for ($x = 0; $x < $place_catRs->num_rows; $x++) {
                                            $place_rsData = $place_catRs->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $place_rsData["place_category_id"] ?>"><?php echo $place_rsData["plc_cat_name"]; ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-6 col-lg-4 text-center mt-3">
                                    <select class="form-control col-12" id="searchplcType">
                                        <option value="0">Select place type</option>

                                        <?php

                                        $place_typrRs = Database::search("SELECT * FROM `place_type`");

                                        for ($typ = 0; $typ < $place_typrRs->num_rows; $typ++) {
                                            $place_typrData = $place_typrRs->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $place_typrData["place_type_id"] ?>"><?php echo $place_typrData["plc_type_name"]; ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-4 text-center mt-3">
                                    <select class="form-control col-12" id="searchSort">
                                        <option value="0">Sort by</option>
                                        <option value="1">New to Oldest</option>
                                        <option value="2">Oldest To Newest</option>
                                    </select>
                                </div>

                                <div class="col-6 col-lg-4 text-center mt-3">
                                    <select class="form-control col-12" id="searchCoun">
                                        <option value="0">Country</option>
                                        <?php

                                        $plcCountry_rs = Database::search("SELECT * FROM `country`");

                                        for ($coun = 0; $coun < $plcCountry_rs->num_rows; $coun++) {
                                            $plcCountry_data = $plcCountry_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $plcCountry_data["country_id"] ?>"><?php echo $plcCountry_data["country_name"]; ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-6 col-lg-4 text-center mt-3">
                                    <input type="text" class="col-12 form-control" id="searchcity" placeholder="city" />
                                </div>

                                <div class="col-6 col-lg-2 text-center mt-3">
                                    <input id="lesPrice" type="text" class="col-12 form-control" placeholder="price less than" />
                                </div>

                                <div class="col-6 col-lg-2 text-center mt-3">
                                    <input id="highPrice" type="text" class="col-12 form-control" placeholder="price higher than" />
                                </div>

                                <div class="col-12 col-lg-6 text-center mt-3">
                                    <select class="form-control col-12" id="searchPriceHigh">
                                        <option value="0">Price Filter</option>
                                        <option value="1">High to Lower</option>
                                        <option value="2">Lower to High</option>
                                    </select>
                                </div>

                                <div class="col-12 offset-lg-2 col-lg-4 text-center mt-3">
                                    <button class="btn btn-success col-12" onclick="advancedSearch(0);">Search</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- offcanvas advancedSearch  -->


        </div>
        <!--advanced serch-->

        <div class="container-fluid">
            <footer class="pb-5 pt-4">
                <div class="col-12 text-md-start">
                    <div class="container-fluid " id="card">
                        <div class="row ms-1 text-sm-center text-md-start justify-content-center">



                            <?php

                            $place_rs = Database::search("SELECT * FROM `place`");

                            //  $country_rs = Database::search("SELECT * FROM `country`");

                            for ($x = 0; $x < $place_rs->num_rows; $x++) {

                                $place_data = $place_rs->fetch_assoc();

                                $place_id = $place_data["place_id"];

                                $country_rs = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $place_data["country_country_id"] . "'");

                                $country_data = $country_rs->fetch_assoc();


                                $place_imgrs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $place_data["place_id"] . "' LIMIT 1");

                                $place_imgdata = $place_imgrs->fetch_assoc();

                                $place_hsuser = Database::search("SELECT * FROM `customer` INNER JOIN `place` ON `customer`.`customer_id`=`place`.`customer_customer_id` WHERE `customer_id`='" . $place_data["customer_customer_id"] . "'");

                                $place_hsuserdata = $place_hsuser->fetch_assoc();



                            ?>

                                <!--card-->
                                <div class="offset-2 col-8 col-md-4 col-lg-3 mx-auto mt-3">


                                    <!-- var place_id = id.getAttribute("data-value"); -->

                                    <div class="card col-12">

                                        <?php
                                        if (isset($_SESSION["u"])) {


                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "' AND `place_place_id`='" . $place_id . "'");


                                            if ($watchlist_rs->num_rows == 1) {
                                        ?>
                                                <img src="Daco_4110701.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">

                                            <?php

                                            } else {
                                            ?>

                                                <img src="Daco_4421474.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">

                                            <?php
                                            }
                                        } else {
                                            ?>

                                            <img src="Daco_4421474.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">

                                        <?php
                                        }

                                        ?>



                                        <!--carousal-->


                                        <!--carousal-->
                                        <!-- <img src="Component 1.png" class="card-img-top" alt="..."> -->
                                        <img data-value="<?php echo $place_data["place_id"] ?>" onclick="getplace(this);" src="<?php echo $place_imgdata["path"] ?>" class="card-img-top" alt="..." style="height: 200px;" />
                                        <div class="card-body col-12" data-value="<?php echo $place_data["place_id"] ?>" onclick="getplace(this);">
                                            <div class="d-flex justify-content-between card_head card-text">
                                                One Night<span><i class='bx bx-star'></i>0.5</span>
                                            </div>
                                            <h5 class="card-title" style="text-align: center;"><?php echo $place_data["city"] ?> , <?php echo $country_data["country_name"] ?></h5>
                                            <p class="card-text text-center card_text1 m-0"><?php echo $place_hsuserdata["fname"] . " " . $place_hsuserdata["lname"] ?></p>
                                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                                            <div class=" card-text text-center card_text3">LKR <?php echo $place_data["adultprice"]; ?></div>
                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                        </div>
                                    </div>



                                </div>
                                <!--card-->

                            <?php
                            }

                            ?>




                        </div>
                    </div>
                </div>
            </footer>
        </div>


        <!-- *** -->

        <div style="width: 100%;">
            <?php require "footer.php" ?>
        </div>

        <!-- *** -->


        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>