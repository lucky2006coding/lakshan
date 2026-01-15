<?php

session_start();
require "connection.php";

if (isset($_SESSION["inid"]["invoice_id"])) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/style.css" />
        <title>Product Invoice | C_lento</title>
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

            <div class="row offset-9 col-3 offset-lg-10 px-lg-4 col-lg-2">
                <div class=" mt-4 mb-3 ms-lg-3">
                    <button class="btn btn-success" id="download"> download pdf</button>
                </div>
            </div>
            <div class="col-12 shadow" id="invoice">
                <div class="col-12 mt-2 bg-primary text-center">
                    <h1 class="bg-primary text-white p-2">INVOICE</h1>
                </div>

                <?php

                $uid = $_SESSION["u"]["customer_id"];
                $invoice_id = $_SESSION["inid"]["invoice_id"];

                $user_rs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='".$uid."'");

			$user_data = $user_rs->fetch_assoc();

                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id`='" . $invoice_id . "' AND `customer_customer_id`='" . $uid . "'");

                $invoice_data = $invoice_rs->fetch_assoc();

                $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $invoice_data["place_place_id"] . "'");

                $place_data = $place_rs->fetch_assoc();

                $country_rs = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $user_data["country_id"] . "'");

                $country_data = $country_rs->fetch_assoc();


                $charged_rs1 = Database::search("SELECT DATE(issuedate) AS extracted_date FROM invoice WHERE `invoice_id`='" . $invoice_data["invoice_id"] . "'");

                $charged_data = $charged_rs1->fetch_assoc();

                $getdate = $charged_data["extracted_date"];

                ?>

                <div class="col-12 mt-5">
                    <div class="col-12 d-none d-lg-block">

                        <div class="col-7 px-2 px-lg-5 border-end border-success">


                            <div class="row align-content-center">
                                <div class="col-4 text-center">
                                    Discreption
                                </div>

                                <div class="offset-7 col-4 text-end" style="position: absolute;">
                                    <div class="col-12">
                                        <h6>Amount Due (LKR)</h6>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <h3>LKR <?php echo $invoice_data["fulltotal"] ?></h3>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <span>Billed To :</span>
                                    </div>
                                    <div class="col-12" style="opacity: 0.8;">
                                        <span><?php echo $user_data["fname"] . " " . $user_data["lname"] ?></span>
                                        <br />
                                        <span><?php echo $user_data["address"] ?></span>
                                        <br />
                                        <span>City : </span><span><?php echo $place_data["city"] ?></span>
                                        <br />
                                        <span>Country : </span><span><?php echo $country_data["country_name"] ?></span>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <span style="color: red;">Invoice ID</span>
                                        <br />
                                        <span style="opacity: 1;"><?php echo $invoice_data["invoiceIduniquly"] ?></span>

                                    </div>



                                    <div class="col-12 mt-2">
                                        <span>Date Of Issue</span>
                                        <br />
                                        <span style="opacity: 0.8;"><?php echo $getdate ?></span>
                                    </div>

                                    <div class="col-12 text-start">
                                        <span class="fw-bold">Note : </span>
                                        <br />
                                        <span>Bank Transfer Payment</span>
                                    </div>

                                </div>

                                <div class="col-2 text-center">
                                    Place Price
                                </div>
                                <div class="col-2 text-center">
                                    Discount
                                </div>
                                <div class="col-4 text-center">
                                    Line Total
                                </div>
                            </div>
                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="row align-content-center">

                                <div class="col-4 text-center">
                                    <?php echo $place_data["title"] ?>
                                </div>

                                <div class="col-2 text-center">
                                    LKR <?php echo $invoice_data["fulltotal"] ?>

                                </div>
                                <div class="col-2 text-center">
                                    <?php echo $invoice_data["discount"] ?>%
                                </div>
                                <div class="col-4 text-center">
                                    LKR <?php echo $invoice_data["fulltotal"] ?>
                                </div>


                            </div>



                            <div class="col-12">
                                <hr />
                            </div>
                            <div class="row align-content-center">
                                <div class="offset-6 col-2 text-center" style="opacity: 0.8;">
                                    <?php echo $invoice_data["adultqty"] ?> Adults
                                </div>
                                <div class="col-4 text-center" style="opacity: 0.8;">
                                    LKR <?php echo $invoice_data["oneAdprice"] ?>
                                </div>

                                <div class="offset-6 col-2 text-center mt-3" style="opacity: 0.8;">
                                    <?php echo $invoice_data["childqty"] ?> Childs
                                </div>
                                <div class="col-4 text-center mt-3" style="opacity: 0.8;">
                                    LKR <?php echo $invoice_data["oneChprice"] ?>
                                </div>

                                <div class="offset-6 col-2 text-center mt-3" style="opacity: 0.8;">
                                    <?php echo $invoice_data["infantqty"] ?> Infants
                                </div>
                                <div class="col-4 text-center mt-3" style="opacity: 0.8;">
                                    LKR <?php echo $invoice_data["oneInfprice"] ?>
                                </div>

                                <div class="offset-6 col-2 text-center mt-4" style="opacity: 0.9;">
                                    Subtotal
                                </div>
                                <div class="col-4 text-center mt-4" style="opacity: 0.9;">
                                    LKR 6500
                                </div>

                                <div class="offset-6 col-2 text-center mt-3" style="opacity: 0.9;">
                                    Discount
                                </div>
                                <div class="col-4 text-center mt-3" style="opacity: 0.9;">
                                    <?php echo $invoice_data["discount"] ?>%
                                </div>
                                <!-- <div class="col-6">
									<span>Stay Time</span>
									<br/>
									<span style="opacity: 0.8;"></span>
								</div> -->
                                <div class="offset-6 col-6">
                                    <hr />
                                </div>

                                <div class="col-8 text-center" style="opacity: 1;">
                                    <span class="4 ms-5">Stay Time</span>&nbsp;&nbsp;
                                    <span class="4" style="opacity: 0.8;"><?php echo $invoice_data["chekinDate"] . " - " . $invoice_data["cheloutDate"] ?></span>
                                    <span class="4 ms-5">fulltotal</span>
                                </div>
                                <div class="col-4 text-center" style="opacity: 1;">
                                    LKR <?php echo $invoice_data["fulltotal"] ?>
                                </div>

                                <div class="offset-6 col-6">
                                    <hr />
                                </div>

                            </div>


                        </div>



                    </div>

                    <div class="col-12 d-block d-lg-none px-4">

                        <div class="row col-12">
                            <div class="col-12 text-center">
                                <div class="col-12">
                                    <span class="fw-bold fs-5" style="color: red;">INVOICE ID</span>

                                    <span class="fs-5"><?php echo $invoice_data["invoiceIduniquly"] ?></span>
                                    <div class="mt-2" style="opacity: 0.9;">
                                        <span>Date : </span>

                                        <span><?php echo $invoice_data["chekinDate"] . " - " . $invoice_data["cheloutDate"] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 col-12 text-start">
                                <div class="col-12">
                                    <span style="font-size: 14px; opacity: 0.7;">Invoice To</span>
                                    <div class="col-12 mt-2">
                                        <span class="fs-6" style="font-weight: 500;"><?php echo $place_data["title"] ?></span>
                                        <br />
                                        <span style="font-size: 14px; opacity: 1;"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></span>
                                        <br />
                                        <span style="font-size: 14px; opacity: 1;"><?php echo $_SESSION["u"]["address"] ?></span>
                                        <br />
                                        <span style="font-size: 14px; opacity: 1;"><?php echo $_SESSION["u"]["mobile"] ?></span>
                                        <br />
                                        <span style="font-size: 14px; opacity: 1;"><?php echo $_SESSION["u"]["email"] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 col-12 text-center">
                                <div class="col-12">
                                    <span style="font-size: 14px; opacity: 0.7;">Payment Details</span>
                                </div>
                                <div class="row align-content-center ">
                                    <div class="col-6 text-start mt-2">
                                        <h4>Total Payment</h4>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <h4>LKR <?php echo $invoice_data["fulltotal"] ?></h4>
                                    </div>
                                    <div class="mt-3 col-6 text-start">
                                        <span><?php echo $invoice_data["adultqty"] ?> adults</span>
                                    </div>
                                    <div class="mt-3 col-6 text-end">
                                        <span>LKR <?php echo $invoice_data["oneAdprice"] ?></span>
                                    </div>
                                    <div class="mt-2 col-6 text-start">
                                        <span><?php echo $invoice_data["childqty"] ?> Child</span>
                                    </div>
                                    <div class="mt-2 col-6 text-end">
                                        <span>LKR <?php echo $invoice_data["oneChprice"] ?></span>
                                    </div>
                                    <div class="mt-2 col-6 text-start">
                                        <span><?php echo $invoice_data["infantqty"] ?> Infant</span>
                                    </div>
                                    <div class="mt-2 col-6 text-end">
                                        <span>LKR <?php echo $invoice_data["oneInfprice"] ?></span>
                                    </div>
                                    <div class="mt-3 col-6 text-start" style="font-weight: 500;">
                                        <span>Discount</span>
                                    </div>
                                    <div class="mt-3 col-6 text-end" style="font-weight: 500;">
                                        <span><?php echo $invoice_data["discount"] ?>%</span>
                                    </div>
                                    <div class="mt-1 offset-6 col-6">
                                        <hr />
                                    </div>
                                    <div class=" col-6 text-start">
                                        Subtotal
                                    </div>
                                    <div class=" col-6 text-end">
                                        LKR <?php echo $invoice_data["fulltotal"] ?>
                                    </div>
                                    <div class="offset-6 col-6">
                                        <hr />
                                    </div>

                                    <div class="mt-3 col-12 text-start">
                                        <span style="font-weight: 600; opacity: 0.8;">Date of Issue : </span>
                                        <span class="ms-3"><?php echo $invoice_data["issuedate"] ?></span><br /><br />
                                        <span class="fw-bold">Note : </span>
                                        <span class="ms-3">Bank Transfer Payment</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="col-12 p-2">
                            <hr />
                        </div>
                        <div class="col-12 p-2 text-center">
                            <p class=" fs-6" style="color: black; opacity: 0.7;"> Copyright &copy;2023 pheonixcart.lk All
                                Rights Reserved</p>

                        </div>
                        <div class="col-12 px-2">
                            <hr />
                        </div>
                        <div class="col-12" style="height: 10px;">

                        </div>

                    </div>


                </div>


            </div>

        </div>

        <script src="download.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("ado y bn");
}
?>