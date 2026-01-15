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

                <div class="col-12 text-center align-content-center justify-ceontent-center p-3">

                    <label class="form-label fs-1 mt-1 text-primary fw-bolder">Watchlist &hearts;</label>
                   
                </div>
                <div class="row col-12 ms-1 align-content-center mt-2">
                <?php

                $customer_id = $_SESSION["u"]["customer_id"];

                $watchlistRs = Database::search("SELECT * FROM `watchlist` WHERE `customer_customer_id`='" . $customer_id . "'");

                if ($watchlistRs->num_rows != 0) {

                    for ($x = 0; $x < $watchlistRs->num_rows; $x++) {

                        $watchlistData = $watchlistRs->fetch_assoc();

                        $place_rs = Database::search("SELECT * FROM `place` WHERE `place_id`='" . $watchlistData["place_place_id"] . "'");

                        $place_data = $place_rs->fetch_assoc();

                        $country_rs = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $place_data["country_country_id"] . "'");

                        $country_data = $country_rs->fetch_assoc();

                        $place_imgRs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='".$place_data["place_id"]."' LIMIT 1");

                        $place_imgData = $place_imgRs->fetch_assoc();
                ?>

                        
                            <div class="col-12 px-2 col-lg-3 col-md-6 mt-2" style="border-radius: 20px; background-color: transparent;">
                                <img src="<?php echo $place_imgData["path"] ?>" class="shadow ms-lg-1" style="border-radius: 20px ; width: 98%; height: 300px;" />
                            </div>
                            <div class="col-12 px-2 text-center col-lg-3 mt-2 col-md-6 shadow-lg" style="height: 300px;">

                                <div class="col-12 mt-3">
                                    <span class="fw-bold fs-5"><?php echo $place_data["title"] ?></span>
                                </div>
                                <div class="col-12 text-start ">
                                    <div class="col-12 mt-3 ms-2">
                                        <div class="row align-content-center" style="background-color: transparent; width: 90%;">
                                            <div class="col-9 text-start" style="background-color: transparent;">
                                        <span class="fs-5" style="color: rgb(206, 16, 48);"><?php echo  $country_data["country_name"] ?></span>
                                            </div>
                                            <div class="col-3 text-end" style="background-color: transparent;" data-value="<?php echo $place_data["place_id"] ?>" onclick="getplace(this);">
                                        <span class="fs-6 ms-5" style="text-decoration: underline;">View</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                        
                                    $place_id = $place_data["place_id"];
                           
                                ?>
                                <div class="col-12 text-center ">
                                    <div class="col-12 mt-3 ms-2">
                                        <img src="Daco_4110701.png" style="height: 100px;" data-value="<?php echo $place_id ?>" onclick="favo(this);"/>
                                    </div>
                                </div>

                                <div class="col-12 text-center ">
                                    <div class="col-12 mt-3 px-2 mt-lg-4">
                                        <button class="btn btn-primary col-12" data-value="<?php echo $place_data["place_id"] ?>" onclick="getplace(this);">Reserve Now</button>
                                    </div>
                                </div>

                            </div>


                    <?php
                    }
                    ?>
                <?php
                } else {
                    echo ("You dont select watchlist items yet");
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
        echo ("Session destroyed..! SIGN IN again");
    }
} else {
    echo ("Invalid user");
}
?>