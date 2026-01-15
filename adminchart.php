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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


</head>

<body onload="loadChart();">

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

                        <div class="container">
                            <div class="row">
                                <div class="col-12 py-5">

                                    <div class="row align-content-center justify-content-center">

                                        <div class="col-lg-6 col-12 mt-2 ">

                                            <div class="px-3 shadow">

                                                <div class="col-12 text-primary p-3">
                                                    <h4>Highest booking place</h3>

                                                </div>

                                                <canvas id="chart1"></canvas>
                                            </div>



                                        </div>

                                        <div class="col-lg-6 col-12 mt-2 ">

                                            <div class="px-3 shadow">

                                                <div class="col-12 text-primary p-3">
                                                    <h4>Highest active users</h3>

                                                </div>

                                                <canvas id="chart2"></canvas>
                                            </div>



                                        </div>

                                        <!-- calender  -->

                                        <!-- <div class="col-lg-5 col-12 mt-2 ">

                        <div class="px-3">

                            <div class="col-12 text-primary p-3 py-4">
                           

                                 include "calender.php" 

                            </div>


                        </div>



                    </div> -->

                                        <!-- calender  -->

                                        <div class="col-lg-6 col-12 mt-2">

                                            <div class="px-3 shadow mt-lg-4 mt-0" style="height: 450px; justify-content: center; align-items: center;">

                                                <div class="col-12 text-primary p-3">
                                                    <h4>This month adding and selling prices growth</h3>

                                                </div>

                                                <canvas id="chart3" class="mt-lg-0 mt-md-0 mt-5"></canvas>
                                            </div>



                                        </div>

                                        <div class="col-lg-6 col-12 mt-2 ">

                                            <div class="px-3 py-4 shadow">

                                                <div class="col-12 text-primary p-3">
                                                    <h4>This month adding and selling prices growth</h3>

                                                </div>

                                                <canvas id="chart4"></canvas>
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
    </div>


    <div style="width: 100%;">
        <?php require "footer.php" ?>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>