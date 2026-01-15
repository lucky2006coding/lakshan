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


    <?php

    session_start();
    require "connection.php";

    $query = "SELECT * FROM `customer`";
    $pageno;


    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    ?>


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


                        <div class="col-12" id="manageUsersdiv">

                            <div class="col-12 py-1">
                                <div class="row align-content-center">
                                    <div class="col-9">
                                        <input class="form-control" id="searchtxt" type="text" />
                                    </div>
                                    <div class="col-3">
                                        <button class="col-12 text-white btn btn-success" onclick="searchCUSAdmin();">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div style="border-radius: 20px; height: 80%;" class="col-10  offset-1 offset-lg-4 col-lg-4 offset-md-4 col-md-4 mt-5 align-content-center offcanvas offcanvas-top" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                <!-- <div class="offcanvas-header">
                                                <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div> -->
                                <!-- <div class="offcanvas-body">
                                                <div>
                                                    I will not close if you click outside of me.
                                                </div>
                                            </div> -->

                                <div class="offcanvas-body shadow-lg py-2" id="offcanvas-bodyadmin" style="border-radius: 20px;">

                                    <div class="col-12 header border-bottom">

                                        <div class="col-12 p-2 d-flex">

                                            <div class="col-8 justify-content-center align-content-center">

                                                <img src="img/home/male.png" alt="" class="admincontactimage">

                                                <label class="form-label" style="font-weight: 500;">Lakshan Eranga</label>

                                            </div>

                                            <div class="col-4 text-end px-3 justify-content-center align-content-center">
                                                <svg data-bs-dismiss="offcanvas" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                                </svg>
                                            </div>


                                            <div class="col-12 mb-3 py-3 row align-content-center" id="chatapp_divuser">

                                                <?php

                                                $chat_rs = Database::search("SELECT * FROM `chat`");

                                                $admin_id = $_SESSION["as"]["adminId"];

                                                for ($chat = 0; $chat < $chat_rs->num_rows; $chat++) {

                                                    $chat_data = $chat_rs->fetch_assoc();

                                                    if ($admin_id == '1' && $chat_data["to"] == $admin_id) {
                                                ?>


                                                        <div class="col-12 ps-4 ms-1 mt-3 text-start d-flex align-content-center justify-content-start">
                                                            <div class="py-2  px-4 stylechatdivs shadow align-content-center bg-primary">

                                                                <span class="bg-primary text-white"><?php echo $chat_data["content"] ?></span>

                                                            </div>
                                                        </div>

                                                    <?php
                                                    }

                                                    if ($admin_id == '1' && $chat_data["from"] == $admin_id) {
                                                    ?>
                                                        <div class="col-12 mt-3 text-end d-flex align-content-center justify-content-end">
                                                            <div class="py-2 px-4 stylechatdivs shadow align-content-center bg-success">

                                                                <span class="bg-success text-white"><?php echo $chat_data["content"] ?></span>

                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>



                                                <?php
                                                }

                                                ?>








                                                <div class="col-9 ps-3 pe-2 mt-5">
                                                    <input class="form-control col-12" placeholder="Type text here..." type="text" id="msgtext" />
                                                </div>
                                                <div class="col-3 ps-3 pe-2 mt-5">

                                                    <?php

                                                    ?>
                                                    <button class="continueBtn col-12" onclick="sendMsgAdmin(<?php echo $cus_id ?>);">Send</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>


                            <div class="row align-content-center mt-3" id="searchcu">

                                <?php
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


                                    <!-- manage users  -->




                                    <?php

                                    $cus_id = $selected_data["customer_id"];

                                    ?>



                                    <?php

                                    ?>

                                    <div class="col-12 px-3 col-lg-6">
                                        <div class="col-12">
                                            <div class="col-12 text-center" style="opacity: 0.8;">
                                                <hr />
                                                <div class="row align-content-center mt-3">
                                                    <?php


                                                    ?>

                                                    <div class="col-3" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" onclick="sendMsgId(<?php echo $cus_id ?>);">

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

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>