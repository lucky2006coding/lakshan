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

<body>

    <div class="container" id="printArea">
        <div class="col-12">
            <div class="row align-content-center">
                <div class="col-6 mt-5 d-flex justify-content-start gap-3 px-4">
                    <!-- <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>&nbsp; BACK</button> -->
                    <label class="form-label backtag" onclick="history.back();">back</label>
                </div>
                <div class="col-6 mt-5 d-flex justify-content-end gap-3">
                    <!-- <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>&nbsp; BACK</button> -->
                    <button class="btn btn-danger" onclick="printReport();"><i class="bi bi-printer-fill"></i>&nbsp; PRINT</button>
                </div>
            </div>

            <?php

            $place_rs = Database::search("SELECT * FROM place INNER JOIN place_category ON place.plc_cat_id=place_category.place_category_id
INNER JOIN place_type ON place.place_type_place_type_id=place_type.place_type_id;");




            ?>

            <div class="col-12 row align-content-center ms-2">
                <div class="col-lg-6 col-md-6 col-12 mt-5">

                    <div class="col-12 text-center">
                        <label class="text-primary fs-3" style="font-weight: 500;"> INCOMES </label>

                    </div>

                    <div class="col-12 mt-3 text-start">

                        <section>
                            <label class="text-success fs-4" style="font-weight: 500;"> &bullet;&nbsp;Place added</label>

                            <div class="col-12 mt-3 row align-content-center">

                                <div class="col-6 text-center py-1">
                                    <label class="form-label" style="font-weight: 500;">Place Name</label>
                                </div>

                                <div class="col-6 text-center py-1">
                                    <label class="form-label" style="font-weight: 500;">Added price <b>(RS)</b></label>
                                </div>

                                <?php


                                for ($x = 0; $x < $place_rs->num_rows; $x++) {
                                    $place_data = $place_rs->fetch_assoc();


                                    $adding_price = $place_data["addingprice"];

                                ?>

                                    <div class="col-6 text-start">
                                        <label class="form-label"><?php echo $place_data["title"] ?></label>
                                    </div>

                                    <div class="col-6 text-end">
                                        <label class="form-label"><?php echo $adding_price ?></label>
                                    </div>



                                <?php
                                }
                                ?>




                            </div>

                        </section>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-12 mt-5">

                    <div class="col-12 text-center">
                        <label class="text-danger fs-3" style="font-weight: 500;"> PLACE RESERVE </label>

                    </div>

                    <div class="col-12 mt-3 text-start">

                        <section>
                            <label class="text-success fs-4" style="font-weight: 500;"> &bullet;&nbsp;Place sold</label>

                            <div class="col-12 mt-3 row align-content-center">

                                <div class="col-6 text-center py-1">
                                    <label class="form-label" style="font-weight: 500;">Place Name</label>
                                </div>

                                <div class="col-6 text-center py-1">
                                    <label class="form-label" style="font-weight: 500;">Added price <b>(RS)</b></label>
                                </div>


                                <?php
                                $place = Database::search("SELECT * FROM `place`");

                                for ($y = 0; $y < $place->num_rows; $y++) {
                                    $place_data2 = $place->fetch_assoc();

                                    $iv_Rs = Database::search("SELECT * FROM place INNER JOIN invoice ON place.place_id=invoice.place_place_id WHERE place.place_id='" . $place_data2["place_id"] . "';");

                                    if ($iv_Rs->num_rows > 0) {
                                        $invoice_rs = Database::search("SELECT SUM(invoice.fulltotal) AS total_amount FROM invoice INNER JOIN place ON place.place_id=invoice.place_place_id WHERE place.place_id='" . $place_data2["place_id"] . "';");

                                        $invoice_data = $invoice_rs->fetch_assoc();
                                ?>

                                        <div class="col-6 text-start">
                                            <label class="form-label"><?php echo $place_data2["title"] ?></label>
                                        </div>

                                        <div class="col-6 text-end">
                                            <label class="form-label"><?php echo $invoice_data["total_amount"] ?></label>
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="col-6 text-start">
                                            <label class="form-label"><?php echo $place_data2["title"] ?></label>
                                        </div>

                                        <div class="col-6 text-end">
                                            <label class="form-label">0</label>
                                        </div>

                                    <?php
                                    }

                                    // echo $place_data["place_id"];

                                    ?>





                                <?php
                                }
                                ?>



                            </div>

                        </section>

                    </div>

                </div>
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