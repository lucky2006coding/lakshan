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

<body style="background-color: rgb(192, 13, 43);">

    <div class="container" style="background-color: rgb(192, 13, 43);">

        <div class="col-12 p-5" style="background-color: rgb(192, 13, 43);">
            <div class="row align-content-center" style="background-image: url('Premium\ Photo\ _\ Pink\ watercolor\ abstract\ background.jpeg');">
                <div class="col-lg-6 col-md-6 d-lg-block d-md-block d-none p-3" style="height: 100%; background-image: url('Premium\ Photo\ _\ Pink\ watercolor\ abstract\ background.jpeg');">
                
                <div class="col-12 text-center mt-2" style="background-color: transparent;">
                    <h4 style="background-color: transparent;">Welcome back..!</h4>
                </div>
                <div class="col-12 text-center mt-3" style="background-color: transparent;">
                <img src="5-2-phoenix-picture (1).png" style="width: 150px; height: 150px; background-color: transparent;" />
                </div>

                <div class="col-12 text-center mt-3" style="background-color: transparent;">
                   <h5 style="color: rgb(192, 13, 43); font-style: italic; background-color: transparent;">PHEONIX_cart</h5>
            </div>

            <div class="col-12 text-center mt-5" style="background-color: transparent;">
               <p class="opacity-75" style="background-color: transparent; font-size: 18px;">We' ll plan your place and develop your <br/>
                Entertainment... we wish your opetunity for leading marketing place to get you</p>
         </div>

         <div class="col-12 text-center mt-5" style="background-color: transparent;">
           <p class="opacity-50 mt-3" style="background-color: transparent; font-size: 15px;">
            All right reserved &copy; 2023  PHEONIX_cart &trade;
        </p>
        </div>

                </div>
                <div class="col-lg-6 col-md-6 col-12 shadow-lg p-2" style="background-color: aliceblue;">

                    <div class="col-12 p-2 text-center" style="background-color: transparent;">
                        <img src="5-2-phoenix-picture (1).png" style="width: 50px; height: 50px; background-color: transparent;" />
                    </div>
                    <div class="col-12 d-block" style="background-color: transparent;" id="adminsignbox">
                        <div class="col-12 text-start p-2" style="background-color: transparent;">
                            <h5 class="mt-1" style="background-color: transparent;">Admin Sign In</h5>
                        </div>
                        <div class="col-12 mt-2 p-2" style="background-color: transparent;">
                            <span class="col-12" style="background-color: transparent;">Email</span><br />
                            <div class="col-12 mt-2">
                                <input type="email" class="col-12 form-control" placeholder="you@gmail.com" id="adminemail" />
                            </div>
                        </div>
                        <div class="col-12 p-2" style="background-color: transparent;">
                            <span class="col-12" style="background-color: transparent;">Password</span><br />
                            <div class="col-12 mt-2">
                                <input type="password" class="col-12 form-control" placeholder="*********" id="adminpassword" />
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-none p-5" style="background-color: transparent;" id="adminsuccess">
                     <img src="png-image.png" style="width: 150px; height: 100px; background-color: transparent; margin-left: 32%;"/>
                </div>

                    <div class="col-12 d-none py-5 loading" style="background-color: transparent;" id="adinloading">
                        <div class="text-center" style="background-color: transparent;">
                            <p style="font-size: 18px; background-color: transparent;"> Check Your Email</p>
                        </div>
                        <div class="text-center" style="background-color: transparent;">
                            <span class="loading__dot"></span>
                            <span class="loading__dot"></span>
                            <span class="loading__dot"></span>
                        </div>
                    </div>

                    <div class="col-12" id="verifyadmin" style="background-color: transparent;">

                        <div class="col-12 p-2 opacity-75" style="background-color: transparent;">
                            <span class="col-12" style="background-color: transparent;">Veification Code</span>
                            <div class="col-12 mt-2">
                                <input type="text" class="col-12 form-control" id="verificationadmin" placeholder="ex : 65tvae91m/9" readonly />
                            </div>
                        </div>
                        <div class="col-12 mt-2 p-2 text-center" style="background-color: transparent;">
                            <span class="opacity-75" style="font-size: 15px; background-color: transparent;">We’ll call or text you to
                                confirm your number. Standard message and data rates apply. Privacy Policy</span>
                        </div>
                        <div class="col-12 p-3" style="background-color: transparent;">
                            <button class="btn btn-primary col-12" onclick="adminsignin();">Sign in</button>
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