<?php

session_start();
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body onload="loadchartPlace();">
    <div class="container" id="printArea">

        <div class="col-12 row align-content-center">

        <div class="col-6 mt-5 d-flex justify-content-start gap-3 px-4">
                <!-- <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>&nbsp; BACK</button> -->
                <label class="form-label backtag" onclick="history.back();">back</label>
            </div>
            <div class="col-6 mt-5 d-flex justify-content-end gap-3">
                <!-- <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>&nbsp; BACK</button> -->
                <button class="btn btn-danger" onclick="printReport();"><i class="bi bi-printer-fill"></i>&nbsp; PRINT</button>
            </div>

            <div class="col-lg-3 col-md-3 col-12 mt-5">
                <div class=" p-3 shadow" style="border-radius: 20px; background-color: white;">

                    <div class="col-12">

                        <?php



                        $d = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $d->setTimezone($tz);
                        $date = $d->format("Y-m-d H:i:s");

                        $date_Timearray = explode(" ", $date);

                        $today = $date_Timearray[0];


                        $date_Dayarray = explode("-", $date_Timearray[0]);

                        $today_day =  $date_Dayarray[2];
                        $today_month = $date_Dayarray[1];
                        $this_year = $date_Dayarray[0];


                        $place_rs_today = Database::search("SELECT * FROM place WHERE YEAR(place.added_time) = '" . $this_year . "' AND MONTH(place.added_time) = '" . $today_month . "' AND DAY(place.added_time) = '" . $today_day . "';");
                        $place_rs_Month = Database::search("SELECT * FROM place WHERE YEAR(place.added_time) = '" . $this_year . "' AND MONTH(place.added_time) = '" . $today_month . "';");

                        $place_total_Rs = Database::search("SELECT * FROM `place`");


                        $place_fullNum = $place_total_Rs->num_rows;
                        $place_num_today = $place_rs_today->num_rows;
                        $place_num_Month = $place_rs_Month->num_rows;


                        $todayAdded_plcPesentage = $place_num_today / $place_fullNum * 100;
                        $monthAdded_plcPesentage = $place_num_Month / $place_fullNum * 100;


                        $dateObj   = DateTime::createFromFormat('!m', $today_month);
                        $fullmonthName = $dateObj->format('F');
                        $monthName = $dateObj->format('M');


                        ?>

                        <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Today Places</label>
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
                            <div class="progress-bar bg-success" style="width: <?php echo (int)$todayAdded_plcPesentage ?>%"></div>
                        </div>
                    </div>

                </div>



                <div class=" p-3 shadow mt-3" style="border-radius: 20px; background-color: white;">

                    <div class="col-12">

                        <label class="col-lg-8 col-md-8 col-10" style="font-weight: 500;">Monthly Places</label>
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
                        <label class="col-3 col-md-4 text-end" style="font-size: 15px; opacity: 0.7; ">
                            <?php echo $monthName ?>
                        </label>
                    </div>
                    <div class="col-12 d-lg-none d-md-none d-block">
                        <label class="col-12 mt-3 text-start" style="font-size: 15px; opacity: 0.7;">
                            <?php echo $monthName ?>
                        </label>
                    </div>
                    <div class="col-12 py-2">
                        <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-warning" style="width: <?php echo (int)$monthAdded_plcPesentage ?>%"></div>
                        </div>
                    </div>

                </div>

                <div class=" py-3 shadow mt-3 d-lg-block d-md-block d-none" style="border-radius: 20px; background-color: white;">
                    <div class="py-4">

                        <!-- <div class="col-12 text-primary p-3">
                 <h4>Highest active users</h3>

               </div> -->

                        <canvas id="chartstatusplace"></canvas>
                    </div>

                </div>




            </div>



            <div class="col-lg-9 col-md-9 col-12 mt-5 ">

                <div class="px-3 shadow">

                    <div class="col-12 text-primary p-3">
                        <h4>Highest active place</h3>

                    </div>

                    <canvas id="chart_place"></canvas>
                </div>



            </div>


        </div>


        <div class="row align-content-center mt-3 justify-content-center">
            <?php
            $query = "SELECT * FROM place";
            $pagenopro;


            if (isset($_GET["page"])) {
                $pagenopro = $_GET["page"];
            } else {
                $pagenopro = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pagenopro - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                $placE_imgRs = Database::search("SELECT * FROM place_img WHERE place_place_id='" . $selected_data["place_id"] . "' LIMIT 1");


            ?>

                <div class="col-12 px-3 col-lg-6">
                    <div class="col-12">
                        <div class="col-12 text-center" style="opacity: 0.8;">
                            <hr />
                            <div class="row align-content-center mt-3">
                                <div class="col-3 py-3">
                                    <?php

                                    if ($placE_imgRs->num_rows == 0) {
                                    ?>
                                        <img src="profile-icon-images-7.jpg" style="height: 70px; width: 70px; border-radius: 100%;" class="col-12" />
                                    <?php
                                    } else {
                                        $placE_imgData = $placE_imgRs->fetch_assoc();

                                    ?>
                                        <img src="<?php echo $placE_imgData["path"] ?>" style="height: 70px; width: 70px; border-radius: 100%;" class="col-12" />

                                    <?php
                                    }

                                    ?>
                                </div>
                                <div class="col-6 py-2">

                                    <?php

                                    $customer_Rs = Database::search("SELECT * FROM customer WHERE customer_id='" . $selected_data["customer_customer_id"] . "'");

                                    if ($customer_Rs->num_rows == 1) {
                                        $customer_Data = $customer_Rs->fetch_assoc();

                                        $country_Rs = Database::search("SELECT * FROM country WHERE country_id='" . $selected_data["country_country_id"] . "'");

                                        $country_data = $country_Rs->fetch_assoc();

                                    ?>
                                        <span class="col-12"><?php echo $selected_data["title"] . " , " . $country_data["country_name"] ?></span><br />
                                        <span class="col-12 fw-bold">Hosted by : <?php echo $customer_Data["fname"] . " " . $customer_Data["lname"] ?></span><br />
                                        <span class="col-12 fw-bold"><?php echo $customer_Data["email"] ?></span>

                                    <?php

                                    } else {
                                    ?>
                                        <span class="col-12" style="color: red;">Invalid User</span>
                                    <?php
                                    }


                                    ?>
                                </div>
                                

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>

    <script src="script.js"></script>
</body>

</html>