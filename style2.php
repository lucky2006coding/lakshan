<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pheonix_cart</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<body class="w-100 h-100">
    
    <div class="container">
        <!-- Home---------------------------------------------------------------------------- -->
        <nav class="navbar bg-body-tertiary col-12 p-3">
            <div class="container-fluid">
                <a class="col-1" href="#"><img src="img/home/logo.png" alt="" class="home_logo"></a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <form class="col-6 shadow rounded-5 navbarform" role="search">
                    <input class="col-12 rounded-5 p-3 border-0" type="search" placeholder="Search" aria-label="Search">
                    <button
                        class="btn top-50 btn-danger position-absolute search_btn translate-middle search_btn rounded-circle"
                        type="submit"><i class='bx bg-transparent bx-search fw-bold'></i></button>
                </form>

                <div
                    class=" dropdown d-inline-flex flex justify-content-center gap-1 dropstart shadow p-1 rounded-3">

                    <i class='bx bx-menu fs-3 nav-link mt-1' href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li><a class="dropdown-item" href="#">Notifications</a></li>
                        <li><a class="dropdown-item" href="#">Wishlist</a></li>
                        <li><a class="dropdown-item" href="#">Massages</a></li>
                        <li><a class="dropdown-item" href="#">Help Center</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                    </ul>
<?php
                   if(isset($_SESSION["u"])){
                   
                    $email = $_SESSION["u"]["email"];

                    $user_rs =  Database::search("SELECT * FROM `customer` WHERE `email`='".$email."'");

                    
        $user_data = $user_rs->fetch_assoc();

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `customer_customer_id`='".$user_data["customer_id"]."'");

        $image_data = $image_rs->fetch_assoc();

        if($image_data == 0){
            ?>
<img src="img/home/male.png" alt="" class="profile_img">
            <?php
        }else{
            ?>
             <a href="profile.php"><img src="<?php echo $image_data["path"] ?>" alt="" class="profile_img"></a>
            <?php
        }

                   }else{
                    ?>
                    <img src="img/home/male.png" alt="" class="profile_img">
                <?php   
                }

                    
                    
?>

      
                </div>
            </div>
        </nav>




        <!-- category --------------------------------------------------->

        <div class="row container mt-3 category_container">
            <div class="col-lg-8 col-6 d-inline-flex overflow-x-auto">
                <div class=" text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>
                <div class="text-center category_div mx-2">
                    <img src="img/home/Home.png" alt="" class="category_icon">
                    <div class="category_text mt-2">
                        Home
                    </div>
                </div>

                <div class="text-center category_div mx-2 align-items-center">
                    <div class="category_text fs-3">
                        >
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-3 h-100">
                <div class="w-50 text-center d-inline-flex btn btn_filter">
                    <img src="img/home/Slider.png" alt="" class="filter_icon rounded-2">
                    <div class="filter_text bg-white p-1">
                        Filters
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-3">
                <div class="d-inline-flex toggle_box">
                    <div class="toggletext d-none d-lg-block">
                        Display befor tex
                    </div>
                    <div class="togglediv">
                        <img src="img/home/Toggle On.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    

        <!-- card ------------------------------------------------------------------>

        <section class="product_card row container">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div col-12 card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div col-12 card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow rounded-4 my-4 col-11">
                    <div class="product_img_div col-12 card-img-top">
                        <img src="img/home/Favorite.png" class="position-absolute harticon top-0 end-0" alt="">
                        <img src="img/home/Back To.png" class="position-absolute backicon start-0" alt="">
                        <img src="img/home/To.png" class="position-absolute toicon end-0" alt="">
                        <img src="/img/home/Component 1.png"
                            class=" rounded-4 border border-5 border-white product_img object-fit-fill col-12"
                            alt="...">
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between card_head card-text">
                            One Night<span><i class='bx bx-star'></i>0.5</span>
                        </div>
                        <div class="card-text">
                            <h5 class="card-title text-center mt-2 fw-bold">Nigambo,Sri lanka</h5>
                            <p class="card-text text-center card_text1 m-0">Hosted by Hansana Gunarathna</p>
                            <p class="card-text text-center card_text2 mt-1">Sep 15-18</p>
                            <div class=" card-text text-center card_text3">$85.80</div>
                        </div>

                    </div>
                </div>
            </div>

        </section>


        <div class="container justify-content-center align-items-center d-flex m-4">
            <div class="text-center p-2">
                <div class="fs-5 fw-bold mb-3">Continue exploring</div>
                <button class="btn btn-dark" id="btn">Show more</button>
            </div>
        </div>

    </div>




    <!-- footer -------------------------------------------->

    <footer class="bg-dark text-white pt-5 pb-4">

        <div class="container text-center text-md-left">

            <div class="row text-center text-md-left">

                <div class="col-md-3 col-lg-6 col-xl-3 mx-auto mt-0">
                    <img src="img/home/logo.png" class="fotter_logo" alt="">
                    <p class="foter_text1">Here we are the C_Lento™ to support you
                        for accomplish your dessire by selling
                        high quality products.</p>
                </div>

                <div class="col-md-4 col-lg-6 col-xl-6 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i> Maradana, Colombo 10, Sri Lanka
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> Pheonix_cart@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> +94112 345 876
                    </p>
                    <p>
                        <i class="fas fa-print	 mr-3"></i> +94112 345 877
                    </p>
                </div>

            </div>

            <hr class="mb-4">

            <div class="row align-items-center">

                <div class="col-md-7 col-lg-8">
                    <p> Copyright © 2023 Pheonix_cart.lk All Rights Reserved.
                        <!-- <a href="#" style="text-decoration: none;">
                            <strong class="text-warning">The Providers</strong>
                        </a> -->
                    </p>

                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">

                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-youtube"></i></a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </footer>





        </div>
        
    </div>
<!-- 
    <div class="col-12">
        
    <div class="row col-12" style="position: absolute; margin-top: -1100px;">
        <?php
        include "index.php";
        ?>
        </div>
    </div> -->



    <script src="http://unpkg.com/jquery"></script>
    <script src="./index.js"></script>
    <script>

    </script>
    <script src="script.js"></script>
</body>

</html>