<?php

require "connection.php";
session_start();

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

    <div class="container-fluid">
        <div class="row vh-100 d-flex justify-content-center align-items-center " style="background-image: url('Premium\ Photo\ _\ Pink\ watercolor\ abstract\ background.jpeg');">

            <div class="col-10 col-lg-3">



                <div class="row ">

                    <div class="col-12 shadow-lg p-3">

                        <div class="col-12 d-flex">
                            <div class="col-6 mt-1 px-2">
                                <a href="index.php" style="text-decoration: none; color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                    </svg></a>
                            </div>
                            <div class="col-6 text-end mt-1">
                                <a href="signinup.php" class="anchoragHome me-3">Home</a>
                            </div>

                        </div>

                        <div class="col-12 text-center py-1" style="background-color: transparent;">
                            <img src="5-2-phoenix-picture (1).png" style="width: 150px; height: 150px; background-color: transparent;" />
                        </div>

                        <div class="col-12 py-1">

                            <label class="form-label">Reset password</label>
                            <input type="password" class="form-control" placeholder="*****" id="respw" />

                        </div>
                        <div class="col-12 py-1">

                            <label class="form-label">Confirm password</label>
                            <input type="password" class="form-control" placeholder="*****" id="conpw" />

                        </div>

                        <div class="col-12 py-1 d-none">

                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="rpveri" value="<?php echo $_GET["code"] ?>"/>

                        </div>

                        <div class="col-12 mt-2">

                            <button type="submit" class="continueBtn col-12 mb-2" onclick="resetPassword();">
                                Continue
                            </button>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>



    <script src="script.js"></script>
</body>

</html>