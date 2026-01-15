<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="css/style.css" />
    <title>Admin Panel | C_lento</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row p-5 p-lg-0 align-content-center">
                    <!-- small hidden offcanvas right -->


                    <div class="col-12 d-block d-lg-none p-3">
                        <div class="col-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </div>
                    </div>

                    <div class="col-3 d-none d-lg-block p-3 text-center">
                        <div class="col-12 shadow mt-4">

                            <section class=" d-flex flex-wrap justify-content-center align-items-center">

                                <div class="col-12  border-1 justify-content-center  d-block">
                                    <div class="form-header mt-4 d-flex align-items-center justify-content-center flex-row col-12 position-relative">
                                        <div>


                                            <?php



                                            $email = $_SESSION["as"]["email"];

                                            $user_rs =  Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");


                                            $user_data = $user_rs->fetch_assoc();


                                            $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $user_data["adminId"] . "'");

                                            $image_data = $image_rs->fetch_assoc();

                                            if ($image_data == 0) {
                                            ?>
                                                <img src="8665306_circle_user_icon.png" class="rounded-3" style="width: 100px; height: 100px; border-radius: 100%;" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?php echo $image_data["path"] ?>" class="rounded-100  border-2" style="width: 100px;  height: 100px; border-radius: 100%;">
                                            <?php
                                            }
                                            ?>
                                            <!-- <input type="file" class="d-none" id="updateimage" />
                                                <div class="col-12" style="text-align: right;"><label class="imghov" for="updateimage"><img src="camera-fill.svg" class="opacity-75" style="margin-top: -60px; height: 30px; background-color: transparent;" /></label>
                                                </div> -->

                                        </div>
                                    </div>
                                    <div class="form-content position-relative col-12 d-block mt-2">
                                        <div class="d-block">
                                            <header class="head_text start-50 d-flex fs-4 justify-content-center mb-4"><?php echo $user_data["fname"] . " " .  $user_data["lname"] ?></header>
                                            <p class="head_text start-50 d-flex fs-6 justify-content-center mb-4 opacity-75" style="margin-top: -20px;">Admin</p>
                                        </div>

                                    </div>


                            </section>



                        </div>
                        <div class="col-12 mt-3 py-3" style="background-color: whitesmoke;">
                            <div class="col-12 text-start py-3">
                                <a href="adminpanel.php" class="adminsidebar_span"><span class="px-2">Dashboard</span></a>
                                <a href="adminpanel.php" class="adminsidebar_span"> <span class="dashbo" style="align-content: flex-end;">&#8250; &nbsp;&nbsp;</span></a>
                            </div>


                            <div class="col-12 text-start py-3">
                                <a href="manageUsers.php" class="adminsidebar_span"><span class="px-2">Manage users</span></a>
                                <a href="manageUsers.php" class="adminsidebar_span"> <span class="mguser">&#8250; &nbsp;&nbsp;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="manageProducts.php" class="adminsidebar_span"><span class="px-2">Manage Places</span></a>
                                <a href="manageProducts.php" class="adminsidebar_span"> <span class="mgproduct">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="manageItems.php" class="adminsidebar_span"><span class="px-2">Manage Place Items</span></a>
                                <a href="manageItems.php" class="adminsidebar_span"> <span class="mgplaceitems">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Analys pheonix cart</span></a>
                                <a href="adminchart.php" class="adminsidebar_span"> <span class="mganalysitems">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">User report</span></a>
                                <a href="user_report.php" class="adminsidebar_span"> <span class="ureport">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Place report</span></a>
                                <a href="place_report.php" class="adminsidebar_span"> <span class="plcreport">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Price report</span></a>
                                <a href="price_report.php" class="adminsidebar_span"> <span class="pricreport">&#8250;</span></a>
                            </div>
                            <div class="col-12 text-start py-3">
                                <a href="" onclick="adminlogout();" class="adminsidebar_span"><span class="px-2">Log out</span></a>

                            </div>
                        </div>
                    </div>

                    <!-- small menu  -->

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="col-12 d-block p-3 text-center">
                                <div class="col-12 shadow">

                                    <div class="col-12 shadow mt-4">

                                        <section class=" d-flex flex-wrap justify-content-center align-items-center">

                                            <div class="col-12  border-1 justify-content-center  d-block">
                                                <div class="form-header mt-4 d-flex align-items-center justify-content-center flex-row col-12 position-relative">
                                                    <div>


                                                        <?php



                                                        $email = $_SESSION["as"]["email"];

                                                        $user_rs =  Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");


                                                        $user_data = $user_rs->fetch_assoc();


                                                        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $user_data["adminId"] . "'");

                                                        $image_data = $image_rs->fetch_assoc();

                                                        if ($image_data == 0) {
                                                        ?>
                                                            <img src="8665306_circle_user_icon.png" class="rounded-3" style="width: 100px; height: 100px; border-radius: 100%;" />
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="<?php echo $image_data["path"] ?>" class="rounded-100  border-2" style="width: 100px;  height: 100px; border-radius: 100%;">
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- <input type="file" class="d-none" id="updateimage" />
                                                <div class="col-12" style="text-align: right;"><label class="imghov" for="updateimage"><img src="camera-fill.svg" class="opacity-75" style="margin-top: -60px; height: 30px; background-color: transparent;" /></label>
                                                </div> -->

                                                    </div>
                                                </div>
                                                <div class="form-content position-relative col-12 d-block mt-2">
                                                    <div class="d-block">
                                                        <header class="head_text start-50 d-flex fs-4 justify-content-center mb-4"><?php echo $user_data["fname"] . " " .  $user_data["lname"] ?></header>
                                                        <p class="head_text start-50 d-flex fs-6 justify-content-center mb-4 opacity-75" style="margin-top: -20px;">Admin</p>
                                                    </div>

                                                </div>


                                        </section>



                                    </div>

                                </div>
                                <div class="col-12 mt-3 py-3" style="background-color: whitesmoke;">
                                    <div class="col-12 text-start py-3">
                                        <a href="adminpanel.php" class="adminsidebar_span"><span class="px-2">Dashboard</span></a>
                                        <a href="adminpanel.php" class="adminsidebar_span"> <span class="dashbo" style="align-content: flex-end;">&#8250; &nbsp;&nbsp;</span></a>
                                    </div>


                                    <div class="col-12 text-start py-3">
                                        <a href="manageUsers.php" class="adminsidebar_span"><span class="px-2">Manage users</span></a>
                                        <a href="manageUsers.php" class="adminsidebar_span"> <span class="mguser">&#8250; &nbsp;&nbsp;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="manageProducts.php" class="adminsidebar_span"><span class="px-2">Manage Places</span></a>
                                        <a href="manageProducts.php" class="adminsidebar_span"> <span class="mgproduct">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="manageItems.php" class="adminsidebar_span"><span class="px-2">Manage Place Items</span></a>
                                        <a href="manageItems.php" class="adminsidebar_span"> <span class="mgplaceitems">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Analys pheonix cart</span></a>
                                        <a href="adminchart.php" class="adminsidebar_span"> <span class="mganalysitems">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">User report</span></a>
                                        <a href="user_report.php" class="adminsidebar_span"> <span class="ureport">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Place report</span></a>
                                        <a href="place_report.php" class="adminsidebar_span"> <span class="plcreport">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                        <a href="adminchart.php" class="adminsidebar_span"><span class="px-2">Price report</span></a>
                                        <a href="price_report.php" class="adminsidebar_span"> <span class="pricreport">&#8250;</span></a>
                                    </div>
                                    <div class="col-12 text-start py-3">
                                    <a href="" onclick="adminlogout();" class="adminsidebar_span"><span class="px-2">Log out</span></a>
                                   
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-12 p-3 p-lg-5">

                        <?php

                        $today = date('Y-m-d');

                        $today_day = date('d');
                        $today_month = date('m');

                        $place_rs = Database::search("SELECT * FROM `place`");

                        $daily_earnings = "0";
                        $monthly_earnings = "0";

                        for ($x = 0; $x < $place_rs->num_rows; $x++) {

                            $place_data = $place_rs->fetch_assoc();

                            $addedToday = $place_data["added_time"];

                            $addedTodayDate = explode(" ", $addedToday);

                            $tddate = $addedTodayDate[0];

                            if ($today == $tddate) {

                                $daily_earnings = $daily_earnings + $place_data["addingprice"];
                            }


                            $addedTodayMonth = explode("-", $addedToday);

                            $tdMonth = $addedTodayMonth[1];

                            if ($today_month == $tdMonth) {
                                $monthly_earnings = $monthly_earnings + $place_data["addingprice"];
                            }
                        }

                        ?>
                        <!-- note fix d-none -->




                        <div class="col-12" id="manageproductItemsdiv">
                            <div class="row align-content-center mt-3" id="searchcu">

                                <div class="col-12">
                                    <div class="col-12 px-3 mt-3">
                                        <div class="row align-content-center">
                                            <div class="col-6">
                                                <label class="fs-5 text-primary">Place Catrgories</label>
                                            </div>
                                            <div class="col-6 text-end px-2">
                                                <div class="px-2">
                                                    <span class="greenBumba" id="addnewitemtext">Add new items</span> &nbsp;
                                                    <svg onclick="addNewitems();" xmlns="http://www.w3.org/2000/svg" id="addplusicon" style="height: 30px;" fill="green" class="bi bi-plus-square addsqure" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>

                                                    <svg onclick="closeNewitems();" xmlns="http://www.w3.org/2000/svg" id="addcloseicon" style="height: 30px;" fill="red" class="bi bi-x-square addsqureclose d-none" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                </div>
                                            </div>

                                            <!-- dnone  -->
                                            <div class="col-12 p-2 mt-3 d-none" style="z-index: 1;" id="addnewItembox">
                                                <div class="col-12 offset-lg-3 col-lg-6 shadow px-3" style="border-radius: 20px;">
                                                    <div class="col-12 text-center p-2">
                                                        <span class="fs-6"> Add new Product</span>
                                                        <hr />
                                                    </div>
                                                    <div class="col-12 text-start px-3">
                                                        <select class="col-12 form-control" id="selCat">SELECT item category
                                                            <option value="0">SELECT item category</option>
                                                            <option value="1">Place Category</option>
                                                            <option value="2">Place Amenties</option>
                                                            <option value="3">Place Standout amenities</option>
                                                            <option value="4">Place Safety items</option>
                                                        </select>
                                                    </div>
                                                    <div class="row align-content-center mt-3 px-3" style="background-color: transparent; border-radius: 20px;">

                                                        <div class="col-12 col-lg-6">
                                                            <span>Type Category name</span>
                                                            <input type="text" class="col-12 form-control mt-2" placeholder="ex : home" id="nameitem" />
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span>Type Category Price</span>
                                                            <input type="text" class="col-12 form-control mt-2" placeholder="ex : 10000 (LKR)" id="priceitem" />
                                                        </div>

                                                        <div class="col-12 mt-2" id="verifyBoxadmincat">
                                                            <button class="btn btn-primary col-12" onclick="Insertitem();">Insert Now</button>
                                                        </div>


                                                        <div class="col-12" style="height: 20px;"></div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>



                                    <div class="container-fluid">
                                        <div class="row align-content-center mt-3">

                                            <?php
                                            $categori_rs = Database::search("SELECT * FROM place_category");

                                            for ($x = 0; $x < $categori_rs->num_rows; $x++) {
                                                $categori_data = $categori_rs->fetch_assoc();

                                                $categori_id = $categori_data["place_category_id"];
                                            ?>

                                                <div class="col-6 col-lg-3 px-3 mt-2">
                                                    <div class="col-12 categoryBox text-center">
                                                        <div class="row align-content-center" style="background-color: transparent;">
                                                            <div class="col-9 border-end border-success" style="height: 100px; background-color: transparent;">
                                                                <div class="col-12" style="background-color: transparent;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" style="background-color: transparent;" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="col-12 mt-2 text-white" style="background-color: transparent;">
                                                                    <span class="fs-6 fw-bold" style="background-color: transparent;"><?php echo $categori_data["plc_cat_name"] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 text-center py-4 deleteBox" style="background-color: transparent; height: 100px;" onclick="deleteCategory(<?php echo $categori_id; ?>);">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" style="background-color: transparent; margin-left: -15px;" class="bi bi-trash3-fill mt-3 deleteIcon" viewBox="0 0 16 16">
                                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </div>


                                </div>

                                <div class="col-12">
                                    <div class="col-12 px-3 mt-3">
                                        <label class="fs-5 text-primary">Place Amenties</label>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row align-content-center mt-3">

                                            <?php
                                            $amenties_rs = Database::search("SELECT * FROM amenties");

                                            for ($x = 0; $x < $amenties_rs->num_rows; $x++) {
                                                $amenties_data = $amenties_rs->fetch_assoc();
                                            ?>

                                                <div class="col-6 col-lg-3 px-3 mt-2">
                                                    <div class="col-12 amentiesBox text-center">
                                                        <div class="row align-content-center" style="background-color: transparent;">
                                                            <div class="col-9 border-end border-danger" style="height: 100px; background-color: transparent;">
                                                                <div class="col-12" style="background-color: transparent;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" style="background-color: transparent;" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="col-12 mt-2 text-white" style="background-color: transparent;">
                                                                    <span class="fs-6 fw-bold" style="background-color: transparent;"><?php echo $amenties_data["amenties_name"] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 text-center py-4 deleteBox" style="background-color: transparent; height: 100px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" style="background-color: transparent; margin-left: -15px;" class="bi bi-trash3-fill mt-3 deleteIcon" viewBox="0 0 16 16">
                                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </div>


                                </div>

                                <div class="col-12">
                                    <div class="col-12 px-3 mt-3">
                                        <label class="fs-5 text-primary">Place Standout amenties</label>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row align-content-center mt-3">

                                            <?php
                                            $stndoutAmentiesRs = Database::search("SELECT * FROM standout_amenities");

                                            for ($x = 0; $x < $stndoutAmentiesRs->num_rows; $x++) {
                                                $stndoutAmenties_Data = $stndoutAmentiesRs->fetch_assoc();
                                            ?>

                                                <div class="col-6 col-lg-3 px-3 mt-2">
                                                    <div class="col-12 standOutamentiesBox text-center">
                                                        <div class="row align-content-center" style="background-color: transparent;">
                                                            <div class="col-9 border-end border-black" style="height: 100px; background-color: transparent;">
                                                                <div class="col-12" style="background-color: transparent;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" style="background-color: transparent;" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="col-12 mt-2 text-white" style="background-color: transparent;">
                                                                    <span class="fs-6 fw-bold" style="background-color: transparent;"><?php echo $stndoutAmenties_Data["standout_amenities_name"] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 text-center py-4 deleteBox" style="background-color: transparent; height: 100px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" style="background-color: transparent; margin-left: -15px;" class="bi bi-trash3-fill mt-3 deleteIcon" viewBox="0 0 16 16">
                                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </div>


                                </div>

                                <div class="col-12">
                                    <div class="col-12 px-3 mt-3">
                                        <label class="fs-5 text-primary">Safety Items</label>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row align-content-center mt-3">

                                            <?php
                                            $safety_itemsRs = Database::search("SELECT * FROM safety_items");

                                            for ($x = 0; $x < $safety_itemsRs->num_rows; $x++) {
                                                $safety_itemsData = $safety_itemsRs->fetch_assoc();
                                            ?>

                                                <div class="col-6 col-lg-3 px-3 mt-2">
                                                    <div class="col-12 saftYItemsBox text-center">
                                                        <div class="row align-content-center" style="background-color: transparent;">
                                                            <div class="col-9 border-end border-primary" style="height: 100px; background-color: transparent;">
                                                                <div class="col-12" style="background-color: transparent;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" style="background-color: transparent;" class="bi bi-house-fill mt-3" viewBox="0 0 16 16">
                                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="col-12 mt-2 text-white" style="background-color: transparent;">
                                                                    <span class="fs-6 fw-bold" style="background-color: transparent;"><?php echo $safety_itemsData["safety items_name"] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 text-center py-4 deleteBox" style="background-color: transparent; height: 100px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" style="background-color: transparent; margin-left: -15px;" class="bi bi-trash3-fill mt-3 deleteIcon" viewBox="0 0 16 16">
                                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                </svg>
                                                            </div>
                                                        </div>

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







                    </div>


                </div>
            </div>
        </div>
    </div>







    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>