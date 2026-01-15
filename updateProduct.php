<?php

require "connection.php";
session_start();

if (isset($_SESSION["u"]) && !empty($_SESSION["u"])) {

    if (!empty($_GET["place_id"])) {

        $place_id = $_GET["place_id"];

        $place_rs = Database::search("SELECT * FROM place INNER JOIN place_type ON place.place_type_place_type_id=place_type.place_type_id
INNER JOIN place_category ON place.plc_cat_id=place_category.place_category_id WHERE place.place_id='" . $place_id . "';
");

        if ($place_rs->num_rows == 1) {

            $place_data = $place_rs->fetch_assoc();



?>

            <!DOCTYPE html>
            <html>

            <head>
                <link rel="stylesheet" href="css/style.css" />
                <link rel="stylesheet" href="css/bootstrap.css" />

            </head>

            <body>

                <div class="container-fluid">
                    <div class="row align-content-center">

                        <div class="col-12 col-md-5 col-lg-6 p-5">
                            <div class="row align-content-center" style="border-radius: 20px;">
                                <div class="col-12">
                                    <img src="Component 1.png" style="border-radius: 20px;" class="col-12" id="img0" />
                                </div>
                                <div class="col-6 mt-3">
                                    <img src="Component 1.png" style="border-radius: 20px;" class="col-12" id="img1" />
                                </div>
                                <div class="col-6 mt-3">
                                    <img src="Component 1.png" style="border-radius: 20px;" class="col-12" id="img2" />
                                </div>
                                <div class="col-6 mt-3">
                                    <img src="Component 1.png" style="border-radius: 20px;" class="col-12" id="img3" />
                                </div>
                                <div class="col-6 mt-3">
                                    <img src="Component 1.png" style="border-radius: 20px;" class="col-12" id="img4" />
                                </div>
                                <div class="col-12 text-center mt-2">
                                <div class="col-12 text-center mt-2">
                            <input class="d-none" type="file" value="0" id="productimages" onclick="changeAutoimg();" multiple />
                            <label for="productimages" style="text-decoration: underline;">Choose your dress photo</label>
                        </div>
                                </div>
                            </div>



                        </div>

                        <div class="col-lg-6 col-md-4 col-12 px-5 py-lg-5 py-md-5 px-md-2 px-lg-2" style="margin-left: -5px;">
                            <div class="row align-content-center">
                                <div class="col-12 text-start">
                                    <label class="col-12">Enter title</label>
                                    <input type="text" placeholder="ex : Slim denim shirt" value="<?php echo $place_data["title"] ?>" class="form-control col-12 mt-2" id="updatetitle" />
                                </div>
                                <div class="col-12 text-start mt-3">
                                    <label class="col-12">Address 01</label>
                                    <input type="text" placeholder="ex : Slim denim shirt" value="<?php echo $place_data["address1"] ?>" class="form-control col-12 mt-2" readonly />
                                </div>
                                <div class="col-12 text-start mt-3">
                                    <label class="col-12">Address 02</label>
                                    <input type="text" placeholder="ex : Slim denim shirt" value="<?php echo $place_data["address2"] ?>" class="form-control col-12 mt-2" readonly />
                                </div>




                                <div class="col-3 mt-3 text-start">
                                    <label class="col-12">Adult Price</label>
                                    <input type="text" class="form-control mt-2 text-center" value="<?php echo $place_data["adultprice"] ?>" placeholder="ex : 10 000" id="adprice" />
                                </div>
                                <div class="col-3 mt-3 text-start">
                                    <label class="col-12">Child Price</label>
                                    <input type="text" class="form-control mt-2 text-center" value="<?php echo $place_data["childprice"] ?>" placeholder="ex : 10 000" id="chprice" />
                                </div>
                                <div class="col-3 mt-3 text-start">
                                    <label class="col-12">Infant price</label>
                                    <input type="text" class="form-control mt-2 text-center" value="<?php echo $place_data["infantprice"] ?>" placeholder="ex : 10 000" id="inprice" />
                                </div>
                                <div class="col-3 mt-3 text-start">
                                    <label class="col-12">Discount<b>(%)</b></label>
                                    <input type="text" style="color: rgb(175, 13, 13);" value="<?php echo $place_data["discount"] ?>" id="discountUpdate" class="form-control text-center mt-2" placeholder="ex : 50" />
                                </div>


                                <div class="col-6 text-start mt-3">
                                    <label class="col-12">Place category</label>
                                    <input type="text" class="form-control mt-2 text-center" value="<?php echo $place_data["plc_cat_name"] ?>" style="color: blue;" placeholder="ex : 10 000" readonly />

                                </div>
                                <div class="col-6 mt-3 text-start">
                                    <label class="col-12">Place type</label>
                                    <select class="mt-2 text-center form-control col-12" id="typeupdate" style="color: rgb(27, 42, 180);">
                                        <option value="<?php

                                                        $place_type_rs = Database::search("SELECT * FROM `place_type` WHERE `place_type_id`='" . $place_data["place_type_place_type_id"] . "'");

                                                        $place_type_data = $place_type_rs->fetch_assoc();

                                                        echo $place_type_data["place_type_id"];

                                                        ?>"><?php echo $place_type_data["plc_type_name"] ?></option>
                                        <?php

                                        $place_type_rs2 = Database::search("SELECT * FROM `place_type`");

                                        for ($z = 0; $z < $place_type_rs2->num_rows; $z++) {
                                            $place_type_rs2Data = $place_type_rs2->fetch_assoc();

                                            if ($place_type_rs2Data["place_type_id"] != $place_type_data["place_type_id"]) {
                                        ?>

                                                <option value="<?php echo $place_type_rs2Data["place_type_id"] ?>"><?php echo $place_type_rs2Data["plc_type_name"] ?></option>
                                            <?php
                                            }


                                            ?>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 mt-3 text-start">
                                    <label class="col-12">Amenties</label>
                                    <select class="mt-2 text-center form-control col-12" id="amentid" style="color: rgb(27, 42, 180);">
                                        <option value="0">Select Amenty</option>
                                        <?php

                                        $amenty_rs = Database::search("SELECT * FROM `amenties`");

                                        for ($z = 0; $z < $amenty_rs->num_rows; $z++) {
                                            $amenty_data = $amenty_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $amenty_data["amenties_id"] ?>"><?php echo $amenty_data["amenties_name"] ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-6 mt-3 text-start">
                                    <label class="col-12">Basic facility</label>
                                    <select class="mt-2 text-center form-control col-12" id="facupId" style="color: rgb(27, 42, 180);">
                                        <option value="0">Select facility</option>
                                        <?php

                                        $basic_facilitiesRs = Database::search("SELECT * FROM `basic_facilities`");

                                        for ($z = 0; $z < $basic_facilitiesRs->num_rows; $z++) {
                                            $basic_facilitiesData = $basic_facilitiesRs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $basic_facilitiesData["bs_fac_id"] ?>"><?php echo $basic_facilitiesData["bs_fac_name"] ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-6 mt-3 text-start">
                                    <label class="col-12">Safety items</label>
                                    <select class="mt-2 text-center form-control col-12" style="color: purple;" id="sfitupdate">
                                        <option value="0">Select safety items</option>
                                        <!-- <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Child</option>
                                <option value="2">Kids & Baby</option> -->

                                        <?php

                                        $safety_itemsRs = Database::search("SELECT * FROM `safety_items`");

                                        for ($q = 0; $q < $safety_itemsRs->num_rows; $q++) {
                                            $safety_itemsData = $safety_itemsRs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $safety_itemsData["safety items_id"] ?>"><?php echo $safety_itemsData["safety items_name"] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-6 mt-3 text-start">
                                    <label class="col-12">Standout amenities</label>
                                    <select class="mt-2 text-center form-control col-12" style="color: purple;" id="stamupdate">
                                        <option value="0">Select Standout amenties</option>

                                        <?php

                                        $standout_amenitiesRs = Database::search("SELECT * FROM `standout_amenities`");

                                        for ($q = 0; $q < $standout_amenitiesRs->num_rows; $q++) {
                                            $standout_amenitiesData = $standout_amenitiesRs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $standout_amenitiesData["standout_amenities_id"] ?>"><?php echo $standout_amenitiesData["standout_amenities_name"] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-3 text-start">
                                    <label class="col-12">Discription</label>
                                </div>
                                <div class="col-12 mt-2 text-center">
                                    <textarea rows="9" class="col-12 form-control" id="disupdate"><?php echo $place_data["description"] ?></textarea>
                                </div>




                                <div class="col-12 mt-3">
                                    <button class="btn btn-success col-12" onclick="UpdateProduct(<?php echo $place_id ?>);">Add Now</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 mt-5">
                    <?php require "footer.php" ?>
                </div>


                <script src="bootstrap.js"></script>
                <script src="script.js"></script>
            </body>

            </html>


<?php

        } else {
            echo ("Something went wrong");
        }
    } else {
        echo ("Invalid enter");
    }
} else {
    echo ("Invalid user");
}
?>