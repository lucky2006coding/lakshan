<?php

require "connection.php";
session_start();

$text = $_POST["t"];

$query = "SELECT * FROM `place`";

if (!empty($text)) {

    $query .= "WHERE `title` LIKE '%" . $text . "%'";
}

?>

<div class="container-fluid">
    <div class="row text-sm-center text-md-start">



        <?php

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $place_rs = Database::search($query);
        $place_num = $place_rs->num_rows;

        $results_per_page = 8;
        $number_of_pages = ceil($place_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . " ");


        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();
            // echo $selected_data["place_id"];
            $product_img_rs = Database::search("SELECT * FROM `place_img` WHERE `place_place_id`='" . $selected_data["place_id"] . "'");
            $product_img_data = $product_img_rs->fetch_assoc();

            $place_id = $selected_data["place_id"];

            $cus_rs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $selected_data["customer_customer_id"] . "'");
            $cus_data = $cus_rs->fetch_assoc();

            $country_name = Database::search("SELECT * FROM `country` WHERE `country_id`='" . $selected_data["country_country_id"] . "'");
            $country_data = $country_name->fetch_assoc();

            $place_id = $selected_data["place_id"];



        ?>

            <!-- card -->
            <div class="offset-2 col-8 col-md-3 col-lg-3 mx-auto mt-3">

                <div class="card" style="width: 18rem;">

                    <?php

                    if (isset($_SESSION["u"])) {
                        $customer_id = $_SESSION["u"]["customer_id"];

                        $watchlistRs = Database::search("SELECT * FROM `watchlist` WHERE `customer_customer_id`='" . $customer_id . "' AND `place_place_id`='" . $place_id . "'");

                        if ($watchlistRs->num_rows == 1) {
                    ?>
                            <img src="Daco_4110701.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">

                        <?php

                        } else {
                        ?>
                            <img src="Daco_4421474.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">
                        <?php
                        }
                    } else {
                        ?>
                        <img src="Daco_4421474.png" class="position-absolute harticon top-0 end-0" style=" z-index: 1; background-color: transparent;" data-value="<?php echo $place_id ?>" onclick="favo(this);" id="draco1">

                    <?php
                    }
                    ?>
                    <img data-value="<?php echo $selected_data["place_id"] ?>" onclick="getplace(this);" src="<?php echo $product_img_data["path"] ?>" class="card-img-top" alt="..." style="height: 200px;">
                    <div class="card-body col-12" data-value="<?php echo $selected_data["place_id"] ?>" onclick="getplace(this);">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <h5 class="card-title" style="text-align: center;"><?php echo $selected_data["city"] . " , " . $country_data["country_name"] ?></h5>
                        <p class="card-text text-center card_text1 m-0"><?php echo $cus_data["fname"] . " " . $cus_data["lname"] ?></p>
                        <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                        <div class=" card-text text-center card_text3">LKR <?php echo $selected_data["adultprice"]; ?></div>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>



            </div>
            <!-- card -->

        <?php
        }

        ?>


    </div>
</div>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                            } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($y = 1; $y <= $number_of_pages; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="basicSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                            } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row text-sm-center text-md-start">