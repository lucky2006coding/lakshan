<?php

require "connection.php";
session_start();


if (isset($_SESSION["as"])) {

    $text = $_GET["search"];


    $query = "SELECT * FROM `customer`";

    if (!empty($text)) {

        $query .= "WHERE `fname` LIKE '%" . $text . "%' OR `lname` LIKE '%" . $text . "%' OR `email` LIKE '%" . $text . "%'";
    }

    $pageno;


    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $user_rs = Database::search($query);
    $user_num = $user_rs->num_rows;

    $results_per_page = 20;
    $number_of_pages = ceil($user_num / $results_per_page);

    $page_results = ($pageno - 1) * $results_per_page;
    $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

    $selected_num = $selected_rs->num_rows;

    for ($x = 0; $x < $selected_num; $x++) {
        $selected_data = $selected_rs->fetch_assoc();

        $cus_imgRs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $selected_data["customer_id"] . "'");

        $cus_imgData = $cus_imgRs->fetch_assoc();


?>




        <div class="col-12 px-3 col-lg-6">
            <div class="col-12">
                <div class="col-12 text-center" style="opacity: 0.8;">
                    <hr />
                    <div class="row align-content-center mt-3">

                        <div class="col-3">

                            <?php

                            if ($cus_imgRs->num_rows == 0) {
                            ?>
                                <img src="profile-icon-images-7.jpg" style="height: 70px; width: 70px; border-radius: 100%;" class="col-12" />

                            <?php
                            } else {
                            ?>
                                <img src="<?php echo $cus_imgData["path"] ?>" style="height: 70px; width: 70px; border-radius: 100%;" class="col-12" />

                            <?php
                            }

                            ?>


                        </div>
                        <div class="col-6 py-2">
                            <span class="col-12"><?php echo $selected_data["fname"] . " " . $selected_data["lname"] ?></span><br />
                            <span class="col-12"><?php echo $selected_data["email"] ?></span>
                        </div>
                        <div class="col-3 py-2">

                            <?php

                            $cus_id = $selected_data["customer_id"];

                            if ($selected_data["status_status_id"] == 1) {
                            ?>

                                <button class="btn btn-danger" id="userblock<?php echo $cus_id  ?>" onclick="block(<?php echo $cus_id ?>);">Block</button>

                            <?php
                            } else {
                            ?>

                                <button class="btn btn-success" id="userblock<?php echo $cus_id ?>" onclick="block(<?php echo $cus_id ?>);">Unblock</button>

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

    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-5">
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

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
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
    <!--  -->
<?php
} else {
    echo ("Invalid admin");
}

?>