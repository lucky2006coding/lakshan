<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    if (!empty($_SESSION["u"])) {

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

            <div class="col-12">
            <?php require "header.php" ?>
            </div>

                <div class="col-12 p-3 text-center">

                    <label class="form-label fs-1 mt-1 text-primary fw-bolder">YOUR INVOICES</label>
            
                </div>

                <div class="row col-12 ms-1 px-2 align-content-center  justify-content-center" style="width: 99%;">

                    <?php

                    $invoiceRs = Database::search("SELECT * FROM `invoice` WHERE `customer_customer_id`='" . $_SESSION["u"]["customer_id"] . "'");

                    for ($x = 0; $x < $invoiceRs->num_rows; $x++) {

                        $invoiceData = $invoiceRs->fetch_assoc();

                        $placeRs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $invoiceData["place_place_id"] . "'");

                        $placeData = $placeRs->fetch_assoc();

                        $placeImgRs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $placeData["place_id"] . "' LIMIT 1");

                        $placeImgData = $placeImgRs->fetch_assoc();

                        $invoicedate = $invoiceData["issuedate"];

                        $recivedate =  explode(" ", $invoicedate);

                        $recdate = $recivedate[0];

                        $invo_uniqId = $invoiceData["invoice_id"];
                    ?>

                        <div class="col-12 col-lg-4 col-md-6 shadow mt-2 px-4">

                        
                            <div class="row align-content-center">
                                <div class="col-3 py-3">
                                    <img src="<?php echo $placeImgData["path"] ?>" style="height: 50px; width: 50px; border-radius: 100%;" />
                                </div>
                                <div class="col-5 text-center mt-3">
                                    <span><?php echo $placeData["title"] ?></span>
                                    <br />
                                    <span class="text-danger" style="font-size: 13px">Recieved : </span>
                                    <span style="font-size: 13px;"><?php echo $recdate ?></span>
                                </div>

                                <div class="col-3 mt-3 ">
                                    <button class="col-12 ms-3 mt-1 btn btn-success" onclick="viewinvoicing(<?php echo $invo_uniqId ?>);">View</button>
                                </div>
                            </div>

                        </div>

                    <?php
                    }

                    ?>



                </div>



            </div>






            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
        </body>

        </html>
<?php
    } else {
        echo ("Session destroyed... sign in again");
    }
} else {
    echo ("Invalid user");
}
?>