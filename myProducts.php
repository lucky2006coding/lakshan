<?php

require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='" . $_SESSION["u"]["email"] . "'");


    $user_data = $user_rs->fetch_assoc();

    $user_id = $user_data["customer_id"];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login or Signup</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />


        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>


    <body>
        <div class="d-block">
            <!--header-->

            <div class="col-12">

                <?php

                require "header.php";

                ?>

            </div>
            <!-- <hr /> -->
            <!--header-->

            <!-- body -->
            <div class="col-12">
                <div class="row">
                    <!-- filter -->
                    <div class="col-11 col-lg-2 mx-3 my-3 border border-primary rounded">
                        <div class="row">
                            <div class="col-12 mt-3 fs-5">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold fs-3">Sort Products</label>
                                    </div>
                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" placeholder="Search..." class="form-control" id="s" />
                                            </div>
                                            <div class="col-1 p-1">
                                                <label class="form-label"><i class="bi bi-search fs-5"></i></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold">Active Time</label>
                                    </div>
                                    <div class="col-12">
                                        <hr style="width: 80%;" />
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="n">
                                            <label class="form-check-label" for="n">
                                                Newest to oldest
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="o">
                                            <label class="form-check-label" for="o">
                                                Oldest to newest
                                            </label>
                                        </div>
                                    </div>



                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-bold">By status</label>
                                    </div>
                                    <div class="col-12">
                                        <hr style="width: 80%;" />
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="b">
                                            <label class="form-check-label" for="b">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="u">
                                            <label class="form-check-label" for="u">
                                                Deactive
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-3 mb-3">
                                        <div class="row g-2">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-success fw-bold" onclick="sort(0);">Sort</button>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-primary fw-bold" onclick="clearSort();">Clear</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- filter -->

                    <!-- product -->
                    <div class="col-12 col-lg-9 mt-3 mb-3 bg-white">
                        <div class="row" id="sort">

                            <div class="offset-1 col-10 text-center">
                                <div class="row justify-content-center">

                                    <?php

                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $place_rs = Database::search("SELECT * FROM `place` WHERE `customer_customer_id`='" . $user_id . "'");
                                    $place_num = $place_rs->num_rows;

                                    $results_per_page = 6;
                                    $number_of_pages = ceil($place_num / $results_per_page);

                                    $page_results = ($pageno - 1) * $results_per_page;
                                    $selected_rs = Database::search("SELECT * FROM `place` WHERE `customer_customer_id`='" . $user_id . "'
                                                    LIMIT " . $results_per_page . " OFFSET " . $page_results . " ");

                                    $selected_num = $selected_rs->num_rows;

                                    for ($x = 0; $x < $selected_num; $x++) {
                                        $selected_data = $selected_rs->fetch_assoc();

                                    ?>

                                        <!-- card -->
                                        <div class="col-12 col-lg-6 mb-3 mt-3">

                                            <div class="shadow text-center justify-content-center">
                                                <div class="col-12">
                                                    <div class="col-12 p-3">
                                                        <?php

                                                        $product_img_rs = Database::search("SELECT * FROM `place_img` WHERE 
                                                                            `place_place_id`='" . $selected_data["place_id"] . "'");
                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                        $cat_re = Database::search("SELECT * FROM `place_category` WHERE 
                                                    `place_category_id`='" . $selected_data["plc_cat_id"] . "'");
                                                        $cat_data = $cat_re->fetch_assoc();

                                                        ?>

                                                        <img src="<?php echo $product_img_data["path"]; ?>" class="img-fluid rounded-start col-12" style="height: 200px; border-radius: 20px;" />
                                                    </div>
                                                    <div class="col-12 text-center justify-content-center p-3">
                                                        <div class="col-12">
                                                            <h5 class="col-12 fw-bold"><?php echo $selected_data["title"]; ?></h5>
                                                            <!-- add another prices  -->
                                                            <span class=" fw-bold text-primary">Rs. <?php echo $selected_data["adultprice"]; ?> .00</span><br />
                                                            <span class=" fw-bold text-success"><?php echo $cat_data["plc_cat_name"] ?></span>
                                                            <div class="form-check form-switch px-5">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $selected_data["place_id"]; ?>" onchange="changeStatus(<?php echo $selected_data['place_id']; ?>);" <?php if ($selected_data["status"] == 2) { ?> checked <?php } ?> />
                                                                <label class="form-check-label fw-bold text-info" for="<?php echo $selected_data["place_id"]; ?>">
                                                                    <?php if ($selected_data["status"] == 2) { ?>
                                                                        Activate Place
                                                                    <?php } else {
                                                                    ?>
                                                                        Deactivate Place
                                                                    <?php
                                                                    } ?>
                                                                </label>
                                                            </div>
                                                            <div class="col-12 p-3">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-6 d-grid mt-1">
                                                                            <button class="btn btn-success fw-bold" onclick="goUpdateproduct(<?php echo $selected_data['place_id']; ?>);">Update</button>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 d-grid mt-1">
                                                                            <button class="btn btn-danger fw-bold" onclick="deletePlace(<?php echo $selected_data['place_id']; ?>)">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- card -->

                                    <?php
                                    }

                                    ?>



                                </div>
                            </div>

                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        <?php

                                        for ($y = 1; $y <= $number_of_pages; $y++) {
                                            if ($y == $pageno) {
                                        ?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }

                                        ?>

                                        <li class="page-item">
                                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>


                        </div>
                    </div>
                    <!-- product -->


                </div>
            </div>
        </div>

        <?php include "footer.php" ?>

    <?php } else {
    echo ("Invalid user");
} ?>


    <script src="script.js"></script>
    </body>

    </html>