<?php

session_start();
require "connection.php";

if (isset($_SESSION["as"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/style.css" />
        <title>Admin Panel | C_lento</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>



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

                        <div class="col-lg-9 col-12 mt-4">

                            <div class="col-12 row align-content-center ">

                                <label class="px-3 py-2 ms-3 fs-2 text-primary fw-bold" style="font-family: Georgia, 'Times New Roman', Times, serif;">Dashboard</label>


                                <div class="col-6 mt-2 px-3 col-lg-3 col-md-3">

                                    <div class="col-12 p-3 shadow" style="border-radius: 20px; background-color: white;">

                                        <div class="col-12">

                                            <?php





                                            // $today = date('Y-m-d');

                                            // // $today_day = date('d');
                                            // // $today_month = date('m');

                                            $d = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $d->setTimezone($tz);
                                            $date = $d->format("Y-m-d H:i:s");

                                            $date_Timearray = explode(" ", $date);

                                            $today = $date_Timearray[0];


                                            $date_Dayarray = explode("-", $date_Timearray[0]);

                                            $today_day =  $date_Dayarray[2];
                                            $today_month = $date_Dayarray[1];

                                            $place_rs = Database::search("SELECT * FROM `place`");

                                            $totalplaceEarnings = "0";
                                            $daily_earnings = "0";
                                            $monthly_earnings = "0";

                                            for ($x = 0; $x < $place_rs->num_rows; $x++) {



                                                $place_data = $place_rs->fetch_assoc();

                                                $totalplaceEarnings = $totalplaceEarnings +  $place_data["addingprice"];

                                                $addedToday = $place_data["added_time"];

                                                $addedTodayDate = explode(" ", $addedToday);

                                                $tddate = $addedTodayDate[0];



                                                if ($today == $tddate) {

                                                    $daily_earnings = $daily_earnings + $place_data["addingprice"];
                                                }


                                                $addedTodayMonth = explode("-", $addedToday);


                                                $tdMonth = $addedTodayMonth[1];
                                                // echo $tddate;
                                                // echo ("<br/>");
                                                // echo $tdMonth;

                                                if ($today_month == $tdMonth) {
                                                    $monthly_earnings = $monthly_earnings + $place_data["addingprice"];
                                                }
                                            }
                                            // echo $tddate;
                                            // echo("<br/>");
                                            // echo $tdMonth;
                                            $todayDate = explode("-", $tddate);

                                            // echo $todayDate[2];


                                            // $monthNum  = 3;
                                            $dateObj   = DateTime::createFromFormat('!m', $tdMonth);
                                            $fullmonthName = $dateObj->format('F');
                                            $monthName = $dateObj->format('M');

                                            // echo $monthName;

                                            // echo ("<br/>");

                                            // echo $daily_earnings;
                                            // echo ("<br/>");
                                            // echo $monthly_earnings;
                                            // echo $daily_earnings;
                                            $dailyearningPersentage =  $daily_earnings /  $totalplaceEarnings * 100;
                                            $monthlyearningPersentage = $monthly_earnings / $totalplaceEarnings * 100;
                                            // echo $dailyearningPersentage;
                                            // echo $dailyearningPersentage;
                                            // echo ("<br/>");
                                            // echo $monthlyearningPersentage;

                                            // $cart_rs = Database::search("SELECT * FROM `cart`");

                                            $place_num = $place_rs->num_rows;

                                            // $cart_num = $cart_rs->num_rows;

                                            // $pending_count = $cart_num / $product_num * 100;

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");

                                            $invoice_num = $invoice_rs->num_rows;

                                            $invoice_count = $invoice_num / $place_num * 100;

                                            // echo $pending_count;
                                            // echo "<br/>";
                                            // echo $invoice_count;

                                            ?>

                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Today Incomes</label>
                                            <label class="col-1 col-lg-3 col-md-3 text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                </svg></label>
                                        </div>
                                        <div class="col-12 d-lg-block d-md-block d-none">
                                            <label class="col-8 col-md-7 mt-3" style="font-size: 15px; opacity: 0.7;">
                                                Avg Session
                                            </label>
                                            <label class="col-3 col-md-4 text-end" style="font-size: 15px; opacity: 0.7;">
                                                <?php echo $monthName . " " . $today_day ?>
                                            </label>
                                        </div>
                                        <div class="col-12 d-lg-none d-md-none d-block">
                                            <label class="col-12 mt-3 text-start" style="font-size: 15px; opacity: 0.7;">
                                                <?php echo $monthName . " " . $today_day ?>
                                            </label>
                                        </div>
                                        <div class="col-12 py-2">
                                            <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: <?php echo $dailyearningPersentage ?>%"></div>
                                            </div>
                                        </div>

                                    </div>



                                </div>

                                <div class="col-6 mt-2 px-3 col-lg-3 col-md-3">

                                    <div class="col-12 p-3 shadow" style="border-radius: 20px; background-color: white;">

                                        <div class="col-12">

                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Monthly Earns</label>
                                            <label class="col-1 col-lg-3 col-md-3 text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                </svg></label>
                                        </div>
                                        <div class="col-12 d-lg-block d-md-block d-none">
                                            <label class="col-8 col-md-7 mt-3" style="font-size: 15px; opacity: 0.7;">
                                                Avg Session
                                            </label>
                                            <label class="col-3 col-md-4 text-end" style="font-size: 15px; opacity: 0.7;">
                                                <?php echo $fullmonthName ?>
                                            </label>
                                        </div>
                                        <div class="col-12 d-lg-none d-md-none d-block">
                                            <label class="col-12 mt-3 text-start" style="font-size: 15px; opacity: 0.7;">
                                                <?php echo $fullmonthName ?>

                                            </label>
                                        </div>
                                        <div class="col-12 py-2">
                                            <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-info" style="width: <?php echo $monthlyearningPersentage ?>%"></div>
                                            </div>
                                        </div>

                                    </div>



                                </div>



                                <div class="col-6 mt-4 mt-lg-2 mt-md-2 px-3 col-lg-3 col-md-3">

                                    <div class="col-12 p-3 shadow " style="border-radius: 20px; background-color: white;">

                                        <div class="col-12">

                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Sales</label>
                                            <label class="col-1 col-lg-3 col-md-3 text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                </svg></label>
                                        </div>
                                        <div class="col-12 d-lg-block d-md-block d-none">
                                            <label class="col-8 col-md-7 mt-3" style="font-size: 15px; opacity: 0.7;">
                                                Avg Session
                                            </label>
                                            <!-- <label class="col-3 col-md-4 text-end" style="font-size: 15px; opacity: 0.7;">
                                    may 17
                                </label> -->
                                        </div>
                                        <!-- <div class="col-12 d-lg-none d-md-none d-block">
                                <label class="col-12 mt-3 text-start" style="font-size: 15px; opacity: 0.7;">
                                    may 12
                                </label>
                            </div> -->
                                        <div class="col-12 py-2">
                                            <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-warning" style="width: <?php echo $invoice_count ?>%;"></div>
                                            </div>
                                        </div>

                                    </div>



                                </div>


                                <div class="col-6 mt-4 mt-lg-2 mt-md-2 px-3 col-lg-3 col-md-3">

                                    <div class="col-12 p-3 shadow " style="border-radius: 20px; background-color: white;">

                                        <div class="col-12">

                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">No respond</label>
                                            <label class="col-1 col-lg-3 col-md-3 text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                </svg></label>
                                        </div>
                                        <div class="col-12 d-lg-block d-md-block d-none">
                                            <label class="col-8 col-md-7 mt-3" style="font-size: 15px; opacity: 0.7;">
                                                Avg Session
                                            </label>
                                            <!-- <label class="col-3 col-md-4 text-end" style="font-size: 15px; opacity: 0.7;">
                                    may 17
                                </label> -->
                                        </div>
                                        <!-- <div class="col-12 d-lg-none d-md-none d-block">
                                <label class="col-12 mt-3 text-start" style="font-size: 15px; opacity: 0.7;">
                                    may 12
                                </label>
                            </div> -->
                                        <div class="col-12 py-2">
                                            <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-danger" style="width: <?php

                                                                                                    $place_hasnt_Invoice = Database::search("SELECT p.* FROM place p WHERE NOT EXISTS (SELECT 1 FROM invoice o WHERE o.place_place_id = p.place_id);
");

                                                                                                    echo $place_hasnt_Invoice->num_rows ?>%;"></div>
                                            </div>
                                        </div>

                                    </div>



                                </div>


                                <div class="col-lg-5 p-3 col-md-5  col-12 mt-4">

                                    <div class="bg-white col-12" style="border-radius: 10px;">

                                        <div class="col-12 p-3">
                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Today Revenue</label>

                                        </div>

                                        <div class="offset-8 text-start">
                                            <span style="font-size: 13px; color: blue; opacity: 0.7;">Daily Revenue</span>
                                        </div>
                                        <div class="offset-8 text-start">
                                            <span style="font-size: 13px; color: red; opacity: 0.7;">Daily added</span>
                                        </div>



                                        <canvas id="myChart" class="col-12 mt-3" style="height: 210px;"></canvas>
                                        <script>
                                            const xValues = [
                                                <?php

                                                // $product_details = Database::search("SELECT * FROM `product`")



                                                for ($x = 1; $x <= $today_day; $x++) {

                                                    echo $x;
                                                    echo ",";
                                                }


                                                ?>

                                            ];



                                            new Chart("myChart", {
                                                type: "line",
                                                data: {
                                                    labels: xValues,
                                                    datasets: [{
                                                        data: [<?php


                                                                for ($y = 1; $y <= $today_day; $y++) {



                                                                    $place_dateRs = Database::search("SELECT * FROM place WHERE DAY(place.added_time) = '" . $y . "';");



                                                                    //    $product_chartdetails = $productdate_rs->fetch_assoc();

                                                                    // $productaddDate = $product_chartdetails["added_time"];


                                                                    // echo $x;
                                                                    // echo "<br/>";
                                                                    // echo $productdate_rs->num_rows;

                                                                    if ($place_dateRs->num_rows == 0) {
                                                                        echo ("0");

                                                                        echo (",");
                                                                    } else {


                                                                        $total = 0;


                                                                        for ($z = 0; $z < $place_dateRs->num_rows; $z++) {


                                                                            $place_dateData = $place_dateRs->fetch_assoc();

                                                                            $placeaddDate = $place_dateData["added_time"];

                                                                            $placedateExplode = explode(" ", $placeaddDate);

                                                                            $place_addredDate = explode("-", $placedateExplode[0]);



                                                                            if ($place_addredDate[1] == $tdMonth) {

                                                                                $placedate_price = $place_dateData["addingprice"];

                                                                                $total = $total + $placedate_price;
                                                                            }
                                                                        }

                                                                        echo $total;

                                                                        echo (",");
                                                                    }
                                                                }

                                                                // // echo $q,$t;


                                                                // 
                                                                ?>],
                                                        borderColor: "red",
                                                        fill: false
                                                    }, {
                                                        data: [
                                                            <?php

                                                            // $product_details = Database::search("SELECT * FROM `product`");
                                                            // echo $todayDate[2];

                                                            for ($t = 1; $t <= $today_day; $t++) {



                                                                $invoicedata_rs = Database::search("SELECT * 
FROM invoice 
WHERE DAY(invoice.issuedate) = '" . $t . "';
");



                                                                //    $product_chartdetails = $productdate_rs->fetch_assoc();

                                                                // $productaddDate = $product_chartdetails["added_time"];


                                                                // echo $x;
                                                                // echo "<br/>";
                                                                // echo $productdate_rs->num_rows;

                                                                if ($invoicedata_rs->num_rows == 0) {
                                                                    echo ("0");

                                                                    echo (",");
                                                                } else {


                                                                    $totalin = 0;


                                                                    for ($q = 0; $q < $invoicedata_rs->num_rows; $q++) {


                                                                        $invoicedata_data = $invoicedata_rs->fetch_assoc();

                                                                        $invoicingdate = $invoicedata_data["issuedate"];

                                                                        $invoicedate = explode(" ", $invoicingdate);

                                                                        $invoice_date = explode("-", $invoicedate[0]);



                                                                        if ($invoice_date[1] == $tdMonth) {

                                                                            $invoice_price = $invoicedata_data["fulltotal"];

                                                                            $totalin = $totalin + $invoice_price;
                                                                        }
                                                                    }

                                                                    echo $totalin;

                                                                    echo (",");
                                                                }
                                                            }

                                                            // // echo $q,$t;


                                                            // 
                                                            ?>
                                                        ],
                                                        borderColor: "blue",
                                                        fill: false
                                                    }]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });
                                        </script>

                                    </div>


                                </div>

                                <div class="col-lg-7 p-3 col-md-7  col-12 mt-4">
                                    <div class="bg-white col-12 p-3" style="border-radius: 10px;">
                                        <div class="col-12 ">
                                            <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Product
                                                Summary</label>

                                        </div>


                                        <?php

                                        $year =  date('Y');
                                        // echo $tdMonth;
                                        $month_earncount = Database::search("SELECT * FROM place WHERE MONTH(place.added_time) = '" . $tdMonth . "' AND  YEAR(place.added_time) = '" . $year . "'");

                                        $month_earncouuntNum = $month_earncount->num_rows;

                                        $month_earncountpersentage = $month_earncouuntNum / $place_num * 100;

                                        // echo $today;


                                        $new_placeRs = Database::search("SELECT * FROM place WHERE DATE(place.added_time) = '" . $today . "'");


                                        $new_placenum = $new_placeRs->num_rows;

                                        $new_placeperentage = $new_placenum / $place_num * 100;


                                        ?>

                                        <div class="col-12 ms-1 mt-3 row align-content-center p-3">

                                            <div class="col-6 p-2">

                                                <div class="col-12 shadow py-4 px-3" style="border-radius: 10px;">

                                                    <div class="row align-content-center">
                                                        <div class="col-12 col-lg-6 col-md-6 text-center">
                                                            <label style="font-size: 13px;">New places</label>
                                                            <br />
                                                            <label style="font-size: 15px; font-weight: 500;"><?php echo $new_placenum
                                                                                                                ?></label>


                                                        </div>

                                                        <div class="col-6 text-center d-lg-block d-md-block d-none">
                                                            <label class="text-primary fw-bold fs-2" id="resultnewOrder"><?php echo (int)$new_placeperentage
                                                                                                                            ?>%</label>
                                                        </div>
                                                    </div>





                                                </div>
                                            </div>
                                            <div class="col-6 p-2">

                                                <div class="col-12 shadow py-4 px-3" style="border-radius: 10px;">

                                                    <div class="row align-content-center">
                                                        <div class="col-12 col-lg-6 col-md-6 text-center">
                                                            <label style="font-size: 13px;">Month added </label>
                                                            <br />
                                                            <label style="font-size: 15px; font-weight: 500;"><?php echo $month_earncouuntNum ?></label>
                                                        </div>

                                                        <div class="col-6 text-center d-lg-block d-md-block d-none">
                                                            <label class="text-primary fw-bold fs-2" id="resultmonthOrder"><?php echo (int)$month_earncountpersentage ?>%</label>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>

                                            <!-- <div class="col-6 p-2">

                                    <div class="col-12 shadow py-4 px-3" style="border-radius: 10px;">

                                        <div class="row align-content-center">
                                            <div class="col-12 col-lg-6 col-md-6 text-center">
                                                <label style="font-size: 13px;">Pending orders</label>
                                                <br />
                                                <label style="font-size: 15px; font-weight: 500;"><?php echo $cart_num ?></label>
                                            </div>

                                            <div class="col-6 text-center d-lg-block d-md-block d-none">
                                                <label class="text-primary fw-bold fs-2" id="resultmpendingOrder">0%</label>
                                            </div>
                                        </div>



                                    </div>
                                </div> -->
                                            <div class="col-6 p-2">

                                                <div class="col-12 shadow py-4 px-3" style="border-radius: 10px;">

                                                    <div class="row align-content-center">
                                                        <div class="col-12 col-lg-6 col-md-6 text-center">
                                                            <label style="font-size: 13px;">Total orders</label>
                                                            <br />
                                                            <label style="font-size: 15px; font-weight: 500;"><?php echo $invoice_num ?></label>
                                                        </div>

                                                        <div class="col-6 text-center d-lg-block d-md-block d-none">
                                                            <label class="text-primary fw-bold fs-2" id="resultminvoiceOrder"><?php echo (int)$invoice_count ?>%</label>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>

                                            <div class="col-6 p-2">

                                                <div class="col-12 shadow py-4 px-3" style="border-radius: 10px;">

                                                    <div class="row align-content-center">
                                                        <div class="col-12 col-lg-6 col-md-6 text-center">
                                                            <label style="font-size: 13px;">Daily Added</label>
                                                            <br />
                                                            <label style="font-size: 15px; font-weight: 500;"><?php echo $place_dateRs->num_rows ?></label>
                                                        </div>

                                                        <div class="col-6 text-center d-lg-block d-md-block d-none">
                                                            <label class="text-primary fw-bold fs-2" id="resultminvoiceOrder"><?php

                                                                                                                                $datePlace_persentage = $place_dateRs->num_rows / 100 * $place_rs->num_rows;

                                                                                                                                echo $datePlace_persentage;

                                                                                                                                ?>%</label>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>


                                            <script>
                                                // Your number
                                                var originalNumber = <?php echo $new_orderperentage ?>;
                                                var monthNumber = <?php echo $month_earncountpersentage ?>;
                                                var pendingNumber = <?php echo $pending_count ?>;
                                                var invoicingNumber = <?php echo $invoice_count ?>;


                                                // Truncate to two decimal places
                                                var truncatedNumber = originalNumber.toFixed(1);
                                                var truncateMonthnumber = monthNumber.toFixed(1);
                                                var trauncatependingNumber = pendingNumber.toFixed(1);
                                                var trauncateinvoiceNumber = invoicingNumber.toFixed(1);


                                                // var persentage = '%';

                                                // Display the truncated number in the HTML element
                                                document.getElementById("resultnewOrder").textContent = truncatedNumber + '%';
                                                document.getElementById("resultmonthOrder").textContent = truncateMonthnumber + '%';
                                                document.getElementById("resultmpendingOrder").textContent = trauncatependingNumber + '%';
                                                document.getElementById("resultminvoiceOrder").textContent = trauncateinvoiceNumber + '%';
                                            </script>










                                        </div>

                                    </div>

                                </div>





                                <!-- <div class="col-6 col-lg-3 col-md-3">
                aa
            </div>
            <div class="col-6 col-lg-3 col-md-3">
                aa
            </div>
            <div class="col-6 col-lg-3 col-md-3">
                aa
            </div> -->



                            </div>

                        </div>

                        <div class="col-lg-9 col-12 p-3 p-lg-5 d-none">

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
                            <div class="col-12" id="dashboard">

                                <div class="row align-content-center">
                                    <div class="col-6 px-2 col-lg-4">
                                        <div class="col-12">
                                            <div class="col-12 py-4 text-center bg-primary maindiv shadow">
                                                <div class="bg-primary">
                                                    <span class="fs-5 bg-primary text-white">Daily Earnings</span>
                                                    <br /> <span style="opacity: 0.9;" class="bg-primary text-white">RS . <?php echo $daily_earnings; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 px-2 col-lg-4">
                                        <div class="col-12">
                                            <div class="col-12 py-4 text-center bg-white maindiv shadow">
                                                <div class="bg-white">
                                                    <span class="fs-5 bg-white text-black">Monthly Earnings</span>
                                                    <br /> <span style="opacity: 0.9;" class="bg-white text-black">Rs . <?php echo $monthly_earnings; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 px-2 col-lg-4 mt-lg-0 mt-3">
                                        <div class="col-12">
                                            <div class="col-12 py-4 mt-3 mt-lg-0 text-center bg-black maindiv shadow">
                                                <div class="bg-black">
                                                    <span class="fs-5 bg-black text-white">Today Sellings</span>
                                                    <br /> <span style="opacity: 0.9;" class="bg-black text-white">1 item</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 px-2 col-lg-4 mt-3">
                                        <div class="col-12">
                                            <div class="col-12 py-4 mt-3 mt-lg-0 text-center bg-secondary maindiv">
                                                <div class="bg-secondary">
                                                    <span class="fs-5 bg-secondary text-white">Monthly sellings</span>
                                                    <br /> <span style="opacity: 0.9;" class="bg-secondary text-white">1 items</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 px-2 col-lg-4 mt-3">
                                        <div class="col-12">
                                            <div class="col-12 py-4 mt-3 mt-lg-0 text-center bg-success maindiv">
                                                <div class="bg-success" onclick="manageUsers();">

                                                    <?php

                                                    $customer_rs = Database::search("SELECT * FROM `customer`");

                                                    ?>
                                                    <span class="fs-5 bg-success text-white">All users</span>
                                                    <br /> <span style="opacity: 0.9;" class="bg-success text-white"><?php echo $customer_rs->num_rows ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 px-2 col-lg-4 mt-3">
                                        <div class="col-12">
                                            <div class="col-12 py-4 mt-3 mt-lg-0 text-center bg-danger maindiv">
                                                <div class="bg-danger" onclick="manageProducts();">
                                                    <span class="fs-5 bg-danger text-white">All Places</span>

                                                    <?php

                                                    $place_rs = Database::search("SELECT * FROM `place`")

                                                    ?>

                                                    <br /> <span style="opacity: 0.9;" class="bg-danger text-white"><?php echo $place_rs->num_rows ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="bg-black col-12 text-warning">

                                        <div class="col-12 text-center bg-black my-2">

                                            <?php

                                            $start_date = new DateTime("2023-10-01 00:00:00");

                                            $tdate = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $tdate->setTimezone($tz);

                                            $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                            $difference = $end_date->diff($start_date);



                                            ?>

                                            <label class="form-label bg-black my-2 fw-bold text-warning">

                                                Started Since :
                                                <?php

                                                echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                                    $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                                    $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                                ?>
                                            </label>

                                        </div>

                                    </div>

                                    <?php

                                    $maxSellinproductRs = Database::search("SELECT invoice.place_place_id,COUNT(`place_place_id`) AS `value_occurence` FROM `invoice`
 GROUP BY place_place_id ORDER BY `value_occurence` DESC  LIMIT 1");

                                    $maxSellinproductdata = $maxSellinproductRs->fetch_assoc();

                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");

                                    $maxPlace_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $maxSellinproductdata["place_place_id"] . "'");

                                    $maxPlace_data = $maxPlace_rs->fetch_assoc();

                                    $maxplace_catRs = Database::search("SELECT * FROM `place_category` WHERE `place_category_id`='" . $maxPlace_data["plc_cat_id"] . "'");

                                    $maxplace_catData = $maxplace_catRs->fetch_assoc();

                                    $maxplaceimg_rs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $maxSellinproductdata["place_place_id"] . "'");

                                    $maxplaceimg_data = $maxplaceimg_rs->fetch_assoc();

                                    $fulltotal = "0";

                                    for ($y = 0; $y < $maxSellinproductdata["value_occurence"]; $y++) {
                                        $invoice_data = $invoice_rs->fetch_assoc();

                                        if ($invoice_data["place_place_id"] == $maxSellinproductdata["place_place_id"]) {
                                            $fulltotal = $fulltotal + $invoice_data["fulltotal"];
                                        }
                                    }

                                    $maxSellinuser = Database::search("SELECT place.customer_customer_id,COUNT(`customer_customer_id`) AS `value_user` FROM `place`
 GROUP BY customer_customer_id ORDER BY `value_user` DESC  LIMIT 1");

                                    $maxSellinuserData = $maxSellinuser->fetch_assoc();

                                    $coustomerrs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $maxSellinuserData["customer_customer_id"] . "'");

                                    $customer_data = $coustomerrs->fetch_assoc();

                                    $customer_imgRs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $maxSellinuserData["customer_customer_id"] . "'");

                                    $customer_imgData = $customer_imgRs->fetch_assoc();




                                    ?>

                                    <div class="row align-content-center mt-3">
                                        <div class="col-lg-6 col-md-6 col-12 px-5">
                                            <div class="card text-center" style="width: 18rem;">
                                                <div class="col-12 p-2">
                                                    <h7 style="text-decoration: underline;">Mostly Selling Category</h7>
                                                </div>
                                                <img style="height: 200px;" src="<?php echo $maxplaceimg_data["path"] ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <span class="card-text fw-bold"><?php echo $maxplace_catData["plc_cat_name"] ?></span><br />
                                                    <span><?php echo $maxSellinproductdata["value_occurence"] ?> Sold</span><br />
                                                    <span>Rs . <?php echo $fulltotal ?> Earnings</span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 col-md-6 mt-md-0 px-5 mt-3 mt-lg-0">
                                            <div class="card text-center" style="width: 18rem;">
                                                <div class="col-12 p-2">
                                                    <h7 style="text-decoration: underline;">Mostly Famous customer</h7>
                                                </div>
                                                <img style="height: 200px;" src="<?php echo $customer_imgData["path"] ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <span class="card-text fw-bold"><?php echo $customer_data["fname"] . " " . $customer_data["lname"] ?></span><br />
                                                    <span><?php echo $maxSellinuserData["value_user"] ?> places Added</span><br />
                                                    <span><?php echo $customer_data["email"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>




                            <div class="col-12 d-none" id="manageproductItemsdiv">
                                <div class="row align-content-center mt-3" id="searchcu">

                                    <?php require "manageItems.php" ?>
                                </div>
                            </div>







                        </div>


                    </div>
                </div>


                <script src="script.js"></script>
                <script src="bootstrap.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("Invalid admin");
}
?>