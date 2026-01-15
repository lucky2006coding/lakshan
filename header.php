<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <title>Update Profile | C_lento</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="icon" href="5-2-phoenix-picture_64x64.ico" />

</head>

<body>
    <div class="col-12 container-fluid">
        <!--header-->
        <div class="col-12">
            <div class="row col-12 align-content-center">


                <div class="col-lg-1 col-md-1 col-3">
                    <img src="5-2-phoenix-picture (1).png" class="mt-2" style="width: 100px; height: 100px;" />
                </div>
                <div class="col-lg-2 text-start mt-3 d-none d-lg-block">
                    <p class="fs-4 mt-4" style="font-style: italic; font-weight: bold; margin-left: -10px; font-family: 'Times New Roman'; color: rgb(255, 109, 73);">PHEONIX_cart</p>
                </div>

                <div class="col-6 mt-4 ">
                    <!-- 
                    <input class="col-12 rounded-5 p-3 border-0 shadow-lg" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-danger search_btn rounded-circle mt-2" type="submit" style="position: absolute; margin-left: -50px;"><i class='bx bg-transparent bx-search fw-bold'></i></button> -->

                </div>

                <div class="col-3 offset-lg-2 offset-md-2 col-lg-1 col-md-1 mt-4">
                    <div class="row shadow-lg" style="width: 100px; border-radius: 100%;">

                        <div class="col-6" style="border-radius: 15px;">

                            <!--Offcanvas-->

                            <i class='bx bx-menu fs-1 nav-link mt-2 mb-2' data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title mt-5 ms-2" id="offcanvasRightLabel">PHEONIX_cart.....!!!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="list-unstyled">
                                    <li>
                                            <p onclick="gohome();" class="listing-items">Home</p>
                                        </li>
                                        <li>
                                            <p onclick="profile();" class="listing-items">My Profile</p>
                                        </li>
                                        <li>
                                            <p onclick="myproduct();" class="listing-items">My Sellings</p>
                                        </li>
                                        <li>
                                            <p onclick="addproduct();" class="listing-items">My Products</p>
                                        </li>
                                        <li>
                                            <p onclick="watchlist();" class="listing-items">Watchlist</p>
                                        </li>
                                        <li>
                                            <p onclick="invoices();" class="listing-items">Product History</p>
                                        </li>
                                        <li style="color: black;">
                                            <p data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" class="listing-items">Contact Admin</p>
                                        </li>
                                        <li>
                                            <p onclick="adminlogin();" class="listing-items">Admin login</p>
                                        </li>
                                        <li><span class="listing-items" onclick="signout();">Log out</span></li>
                                    </ul>

                                </div>
                            </div>
                            <!--offcanvas-->

                        </div>
                        <div class="col-6 py-lg-2 py-1" style="border-radius: 15px;" onclick="profile();">

                            <?php
                            if (isset($_SESSION["u"])) {

                                $email = $_SESSION["u"]["email"];

                                $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='" . $email . "'");


                                $user_data = $user_rs->fetch_assoc();

                                $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='" . $user_data["customer_id"] . "'");

                                $image_data = $image_rs->fetch_assoc();

                                if ($image_data == 0) {
                            ?>
                                    <img src="img/home/male.png" alt="" class="profile_img">
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo $image_data["path"] ?>" alt="" class="profile_img">
                                <?php
                                }
                            } else {
                                ?>
                                <img src="img/home/male.png" alt="" class="profile_img">
                            <?php
                            }



                            ?>
                        </div>
                    </div>

                </div>






            </div>
            <hr />
        </div>
    </div>
</body>

</html>