<?php

require "connection.php";
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add Product</title>
    <link rel="stylesheet" href="addProduct.css">
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico"/>

</head>

<body>
    <header class="">
        <nav class="navbar fixed-top pt-0">
            <div class="container bg-white p-3">
                <img src="5-2-phoenix-picture (1).png" class="mt-2" alt="" width="74.494px">
                <button class="btn btn-light shadow ms-auto" onclick="exitaddpr();">Exit</button>
            </div>
        </nav>
    </header>

    <section class="addProduct-body">
        <div class="container">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">

                    <div class="carousel-item mt-5 active">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-5 col-12 d-flex justify-content-center align-items-start flex-column step1Body">
                                <h5 class="">Step 1</h5>
                                <h1 class="mb-5">Tell us about your place</h1>
                                <p>In this step, we'll ask you which type of property you have and if guests will book
                                    the
                                    entire place or just a room. Then let us know the location and how many guests can
                                    stay.
                                </p>
                            </div>
                            <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                                <div class="image-container">
                                    <img src="addProduct/img01.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-8">
                                <div class="col-12 d-flex justify-content-center align-items-start window2Body">
                                    <h2 class="mb-5">Which of these best describes your place?</h2>
                                </div>
                                <div class="col-12 justify-content-center align-items-center window5Text1">
                                    <div class="row col-12 align-items-center">


                                        <select id="dropdown" class="d-none">

                                        </select>

                                        <?php

                                        $place_cat = Database::search("SELECT * FROM `place_category`");

                                        for ($x = 0; $x < $place_cat->num_rows; $x++) {

                                            $placeCat_data = $place_cat->fetch_assoc();

                                        ?>
                                            <div class="option-box col-6 col-lg-4 p-2" data-value="<?php echo $placeCat_data["place_category_id"]; ?>">
                                                <div class="box01">
                                                    <div style="margin-left: 45%;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                        </svg>
                                                    </div>
                                                    <h6 style="text-align: center;" class="mt-2"><?php echo $placeCat_data["plc_cat_name"]; ?></h6>
                                                    <div style="height: 5px;"></div>
                                                </div>&nbsp;&nbsp;
                                            </div>



                                        <?php

                                        }

                                        ?>




                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start window2Body">
                                    <h2 class="">What type of place will guests have?</h2>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center align-items-center flex-column col-12 p-5">

                                        <select id="dropdown2" class="d-none">

                                        </select>
                                        <?php

                                        $place_type = Database::search("SELECT * FROM `place_type`");

                                        for ($y = 0; $y < $place_type->num_rows; $y++) {

                                            $placeType_data = $place_type->fetch_assoc();
                                        ?>

                                            <div class="option-box2 col-12 row shadow-lg rounded-4 p-2 mb-4" data-value="<?php echo $placeType_data["place_type_id"]; ?>">
                                                <div class="col-10 d-flex justify-content-center flex-column">
                                                    <h4 class="ms-3"><?php echo $placeType_data["plc_type_name"]; ?></h4>
                                                    <div class="window3Text">Guests have the whole place to themselves.
                                                    </div>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center align-items-center ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="85" viewBox="0 0 90 85" fill="none">
                                                        <rect x="0.0532227" y="0.199997" width="89.7303" height="84.55" />
                                                        <rect x="17.3875" y="15.4" width="54.22" height="53.2626" rx="15" />
                                                        <path d="M48.6433 24.7652C46.4581 23.3476 43.6436 23.3476 41.4585 24.7652L25.5744 35.0694C24.466 35.7885 24.9752 37.509 26.2964 37.509C27.0291 37.509 27.623 38.103 27.623 38.8357V51.7988C27.623 55.0072 30.2239 57.6081 33.4323 57.6081H34.2168C36.9919 57.6081 39.2416 55.3585 39.2416 52.5834C39.2416 49.8082 41.4913 47.5586 44.2664 47.5586H45.8354C48.6105 47.5586 50.8602 49.8082 50.8602 52.5834C50.8602 55.3585 53.1098 57.6081 55.8849 57.6081H56.6695C59.8778 57.6081 62.4787 55.0072 62.4787 51.7988V38.6623C62.4787 37.9476 63.0679 37.3736 63.7823 37.3921C65.0644 37.4254 65.5827 35.754 64.5067 35.056L48.6433 24.7652Z" fill="black" class="bg-transparent" />
                                                    </svg>
                                                </div>
                                            </div>




                                        <?php
                                        }

                                        ?>






                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">Where's your place located?</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-5 p-2">
                                    Your address is only shared with guests after thhey've made a reservation.
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="window4ImgContainer col-12">
                                        <img src="/img/addProduct/map.jpg" alt="">
                                    </div>
                                    <div class="col-12 h-100 position-absolute d-flex justify-content-center align-items-center">
                                        <div class="d-flex align-items-center col-11 col-lg-5 shadow-lg bg-white rounded-4 p-2">
                                            <div class="window4IconContainer ms-3 col-2">
                                                <img src="/img/addProduct/Place Marker.png" alt="">
                                            </div>
                                            <input type="text" placeholder="Enter Your address" class="input border-0 p-4 ms-5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start window2Body">
                                    <h3 class="">Confirm your address</h3>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window5Text1 p-2">
                                    Your address is only shared with guests after they've made a reservation.
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center align-items-center flex-column col-12 p-5">

                                        <div class="col-12 row shadow-lg rounded-4 p-2 mb-4">
                                            <div class="col-7 d-flex justify-content-center flex-column">
                                                <input type="text" readonly placeholder="Select your Country / Region" class="border-0 p-3">
                                            </div>
                                            <div class="col-5  ">
                                                <div class="dropdown dropdown-center">

                                                    <select class="select justify-content-center align-items-center mt-3 mb-3" style=" width: 100%; text-align: center;" id="country2">

                                                        <option class="dropdown-item fs-2" value="0" selected></option>

                                                        <?php

                                                        $country = Database::search("SELECT * FROM `country`");

                                                        for ($x = 0; $x < $country->num_rows; $x++) {
                                                            $country_data = $country->fetch_assoc();
                                                        ?>
                                                            <option class="dropdown-item fs-2" value="<?php echo $country_data["country_id"] ?>"><?php echo $country_data["country_name"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>



                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 row shadow-lg rounded-4 p-2 mb-4">
                                            <div class="col-12 d-flex justify-content-center flex-column">
                                                <input type="text" placeholder="ex : No. 35/3" class="border-0 p-3" id="address1">
                                            </div>
                                        </div>

                                        <div class="col-12 row shadow-lg rounded-4 p-2 mb-4">
                                            <div class="col-12 d-flex justify-content-center flex-column">
                                                <input type="text" placeholder="ex : Theldeniya rd , Madawala" class="border-0 p-3" id="address2">
                                            </div>
                                        </div>

                                        <div class="col-12 row shadow-lg rounded-4 p-2 mb-4">
                                            <div class="col-12 d-flex justify-content-center flex-column">
                                                <input type="text" placeholder="City / Village" class="border-0 p-3" id="city">
                                            </div>
                                        </div>

                                        <div class="col-12 row shadow-lg rounded-4 p-2 mb-4">
                                            <div class="col-12 d-flex justify-content-center flex-column">
                                                <input type="text" placeholder="State / Province / Territory" class="border-0 p-3" id="state">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start window2Body">
                                    <h2 class="">Share some basics about your place</h2>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center align-items-center flex-column col-12 p-5">

                                        <?php

                                        $basic_fas = Database::search("SELECT * FROM `basic_facilities`");

                                        $basic_num = $basic_fas->num_rows;

                                        for ($z = 0; $z < $basic_num; $z++) {

                                            $basicFas_data = $basic_fas->fetch_assoc();
                                            $catFac_id =  $basicFas_data["bs_fac_id"];
                                        ?>
                                            <input type="checkbox" class="d-none" value="<?php echo $basicFas_data["bs_fac_id"] ?>" id="chechbfac" />
                                            <label class="col-12 row shadow-lg rounded-4 p-3 mb-4" for="chechbfac">
                                                <div class="col-9 d-flex justify-content-center flex-column">
                                                    <h4 class=" p-3"><?php echo $basicFas_data["bs_fac_name"]; ?></h4>
                                                </div>
                                                <div class="col-3 d-flex justify-content-center align-items-center ">
                                                    <button class="col-3 border-0 bg-transparent fw-bold" id="decrement" onclick="stepper(this,<?php echo $catFac_id ?>)"> - </button>
                                                    <input type="number" class="col-6 border-0" min="1" max="100" step="1" value="1" id="numberInpunt<?php echo $catFac_id ?>">
                                                    <button class="col-3 border-0 bg-transparent fw-bold" id="increment" onclick="stepper(this,<?php echo $catFac_id ?>)"> + </button>
                                                </div>
                                            </label>


                                        <?php
                                        }

                                        ?>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-5">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-5 col-12 d-flex justify-content-center align-items-start flex-column step1Body">
                                <h5 class="">Step 2</h5>
                                <h1 class="mb-5">Make your place stand out</h1>
                                <p>In this step, you'll add some of the amenities your place offers, plus 5 or more
                                    photos. Then, you'll create a title and description.</p>
                            </div>
                            <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                                <div class="image-container">
                                    <img src="addProduct/img01.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-8">
                                <div class="col-12 d-flex justify-content-center align-items-start window2Body">
                                    <h2 class="mb-5">Tell guests what your place has to offer</h2>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center flex-column p-5">
                                    <div class="col-12 shadow-lg rounded-4 mb-5">
                                        <span class="d-flex justify-content-center align-items-center fs-4 mt-5 p-3">You can
                                            add more amenities after you publish your listing.</span>
                                        <div class="row col-12 align-items-center ms-1">

                                            <?php

                                            $amenties_rs = Database::search("SELECT * FROM `amenties`");

                                            for ($t = 0; $t < $amenties_rs->num_rows; $t++) {
                                                $amenties_data = $amenties_rs->fetch_assoc();

                                            ?>

                                                <div class="option-box3 col-6 col-lg-4 p-2" data-value="<?php echo $amenties_data["amenties_id"] ?>" onclick="upautoAment(this);">
                                                    <div class="box01">
                                                        <div style="margin-left: 45%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                            </svg>
                                                        </div>
                                                        <h6 style="text-align: center;" class="mt-3"><?php echo $amenties_data["amenties_name"]; ?></h5>
                                                    </div>&nbsp;&nbsp;
                                                </div>

                                            <?php
                                            }

                                            ?>
                                        </div>

                                    </div>



                                    <div class="col-12 shadow-lg rounded-4 mb-5">
                                        <span class="d-flex justify-content-center align-items-center fs-4 mt-5 p-3">Do you
                                            have any standout amenities?</span>
                                        <div class="row col-12 align-items-center ms-1">

                                            <?php

                                            $standoutAmenities_rs = Database::search("SELECT * FROM `standout_amenities`");

                                            for ($x = 0; $x < $standoutAmenities_rs->num_rows; $x++) {

                                                $standoutAmenities_data = $standoutAmenities_rs->fetch_assoc();
                                            ?>

                                                <div class="col-6 col-lg-4 p-2" data-value="<?php echo $standoutAmenities_data["standout_amenities_id"] ?>" onclick="upsatnamen(this)">
                                                    <div class="box01">
                                                        <div style="margin-left: 45%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                            </svg>
                                                        </div>
                                                        <h6 style="text-align: center;" class="mt-3"><?php echo $standoutAmenities_data["standout_amenities_name"]; ?></h56>
                                                    </div>&nbsp;&nbsp;
                                                </div>
                                            <?php
                                            }

                                            ?>




                                        </div>
                                    </div>

                                    <div class="col-12 shadow-lg rounded-4 mb-5">
                                        <span class="d-flex justify-content-center align-items-center fs-4 mt-5 p-3">Do you
                                            have any of these safety items?</span>
                                        <div class="row col-12 align-items-center ms-1">
                                            <?php

                                            $safetyItems_rs = Database::search("SELECT * FROM `safety_items`");

                                            for ($y = 0; $y < $safetyItems_rs->num_rows; $y++) {

                                                $safetyItems_data = $safetyItems_rs->fetch_assoc();
                                            ?>

                                                <div class="col-6 col-lg-4 p-2" data-value="<?php echo $safetyItems_data["safety items_id"] ?>" onclick="upsafeitem(this);">
                                                    <div class="box01">
                                                        <div style="margin-left: 45%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                            </svg>
                                                        </div>
                                                        <h6 style="text-align: center;" class="mt-3"><?php echo $safetyItems_data["safety items_name"]; ?></h6>
                                                    </div>&nbsp;&nbsp;
                                                </div>
                                            <?php
                                            }

                                            ?>







                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">Add some photos of your apartment</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-2 p-2">
                                    You'll need 5 photos to get started. You can add more or make changes later.
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                    <div class=" col-12 border-2 border shadow-sm border-black">
                                        <div class="col-12">
                                            <div class="row ms-1 col-12 align-items-center" style="background-color: whitesmoke; height: 100%;">
                                                <div class="col-6 align-items-center mt-3 mb-3" style="height: 50%;">
                                                    <img src="addProduct/imageIcon.svg" class="col-12" id="img0">
                                                </div>
                                                <div class="col-6 align-items-center mt-3 mb-3" style="height: 50%;">
                                                    <img src="addProduct/imageIcon.svg" class="col-12" id="img1">
                                                </div><div class="col-6 align-items-center mt-3 mb-3" style="height: 50%;">
                                                    <img src="addProduct/imageIcon.svg" class="col-12" id="img2">
                                                </div>
                                                <div class="col-6 align-items-center mt-3 mb-3" style="height: 50%;">
                                                    <img src="addProduct/imageIcon.svg" class="col-12" id="img3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row col-12 align-items-center">
                                <label class="mt-4 fs-4 imgsel" style="text-align: center;" for="inputimgetag" onclick="changeProductImage();">Choose at least 4 photos</label>
                                <input type="file" class="d-none"  id="inputimgetag" multiple/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">Now, let's give your apartment a title</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-2 p-2">
                                    Short titles work best. Have fun with it—you can always change it later.
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                    <div class="window9ImgContainer d-flex justify-content-center align-items-center flex-column col-12 border-2 border shadow-sm border-black">
                                        <textarea placeholder="ex : Place Name - Kandy Village" class="border-0 w-100 h-100 p-2" id="title"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="col-12 d-flex align-items-center">
                                    <div class="fs-5 p-2">25/50</div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">Create your description</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-2 p-2">
                                    Share what makes your place special.
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                    <div class="window9ImgContainer d-flex justify-content-center align-items-center flex-column col-12 border-2 border shadow-sm border-black">
                                        <textarea placeholder="Place Description" class="border-0 w-100 h-100 p-2" id="disc"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="col-12 d-flex align-items-center">
                                    <div class="fs-5 p-2">25/500</div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-5">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-5 col-12 d-flex justify-content-center align-items-start flex-column step1Body">
                                <h5 class="">Step 3</h5>
                                <h1 class="mb-5">Finish up and publish</h1>
                                <p>Finally, you'll choose if you'd like to start with an experienced guest, then
                                    you'll
                                    set your nightly price. Answer a few quick questions and publish when you're
                                    ready.
                                </p>
                            </div>
                            <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                                <div class="image-container">
                                    <img src="addProduct/img01.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">Create your prices</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-2 p-2">
                                 1night price (In dolars)
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                     <div class="row col-12 align-content-center">

                                      <div class="col-lg-6 col-12">
                                        <label class="form-lable">Adult (18+)</label>
                                         <input type="text" class="form-control mt-1 fs-3" style="height: 60px;" placeholder="xxxxxxxxxxxx" id="adultprice"/>
                                      </div>
                                      <div class="col-lg-6 col-12">
                                        <label class="form-lable">Child (Age 5 - 18)</label>
                                        <input type="text" class="form-control mt-1 fs-3" style="height: 60px;" placeholder="xxxxxxxxxxxx" id="childprice"/>

                                      </div>
                                      <div class="col-12 mt-2">
                                        <label class="form-lable">Infants (under 5)</label>
                                        <input type="text" class="form-control mt-1 fs-3" style="height: 60px;" placeholder="xxxxxxxxxxxx" id="infantprice"/>
                                        
                                      </div>
                                    
                                      
                                     </div>
                                </div>
                                <!-- <div class="col-12 d-flex align-items-center">
                                    <div class="fs-5 p-2">25/500</div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item mt-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-12 col-lg-7">
                                <div class="col-12 d-flex justify-content-center align-items-start">
                                    <h1 class="">We are redy to selling Your place...</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center window4Text1 my-2 p-2">
                                  Please buy this price first...
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                     <div class="row col-12 align-content-center">

                                      <div class="col-12">
                                        <label class="form-lable" style="text-align: center;"></label>
                                        <button type="button" class="mt-1 fs-3 btnprice" id="btnautopice" onclick="autopay(this.value);" value="10000">Pay Now : LKR10000</button>
                                      </div>
                                      
                                    
                                      
                                     </div>
                                </div>
                                <!-- <div class="col-12 d-flex align-items-center">
                                    <div class="fs-5 p-2">25/500</div>
                                </div> -->
                            </div>
                        </div>
                    </div>


                    

                </div>
            </div>
        </div>
    </section>

    <footer class="fixed-bottom footer navbar bg-white">
        <div class="container ">
            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" onclick="back();" id="nextback">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none;" id="valback" onclick="valback();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none;" id="valback2" onclick="valback2();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: darkmagenta;" id="valback3" onclick="valback3();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: aqua;" id="valback4" onclick="valback4();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: brown;" id="valback5" onclick="valback5();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: chartreuse;" id="valback6" onclick="valback6();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: darkgray;" id="valback7" onclick="valback7();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: cornflowerblue;" id="valback8" onclick="valback8();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: blueviolet;" id="valback9" onclick="valback9();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: orange;" id="valback10" onclick="valback10();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: lime;" id="valback11" onclick="valback11();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: orangered;" id="valback12" onclick="valback12();">Back</button>

            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="display: none; color: goldenrod;" id="valback13" onclick="valback13();">Back</button>



            <!--Note - Map code(Darkmagenta)-->
            <button class="btn btn-light shadow" type="button" data-bs-target="#carouselExample" data-bs-slide="next" id="carnext" onclick="nextcar();">Next</button>

            <!--   <button class="btn btn-light shadow" style="display: none;" type="button" data-bs-target="#carouselExample" data-bs-slide="next" onclick="nextsel();" id="valnext">Next</button>
                                        -->
            <button class="btn btn-light shadow" style="display: none; color: blue;" type="button" onclick="nextsel();" id="valnext">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: red;" type="button" onclick="nextsel2();" id="valnext2">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: darkmagenta;" type="button" data-bs-target="#carouselExample" data-bs-slide="next" onclick="nextsel3();" id="valnext3">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: aqua;" type="button" onclick="nextsel4();" id="valnext4">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: brown;" type="button" onclick="nextsel5(<?php echo $basic_num ?>);" id="valnext5">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: chartreuse;" type="button" data-bs-target="#carouselExample" data-bs-slide="next" onclick="nextsel6();" id="valnext6">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: darkgrey;" type="button" data-bs-target="#carouselExample" data-bs-slide="next" onclick="nextsel7();" id="valnext7">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: cornflowerblue;" type="button" onclick="nextsel8();" id="valnext8">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: blueviolet;" type="button" onclick="nextsel9();" id="valnext9">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: orange;" type="button" onclick="nextsel10();" id="valnext10">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: lime;" type="button" onclick="nextsel11();" id="valnext11">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: orangered;" type="button" onclick="nextsel12();" id="valnext12">Next</button>

            <button class="btn btn-light shadow" style="display: none; color: goldenrod;" type="button" onclick="nextsel13();" id="valnext13">Next</button>





        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="addProduct.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</body>

</html>