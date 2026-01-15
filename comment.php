<?php

// session_start();
// require "connection.php";

if (isset($_SESSION["u"])) {

    if (isset($_SESSION["p"])) {

        $place_id = $_SESSION["p"]["place_id"];

        $customer_id = $_SESSION["u"]["customer_id"];

        // $email = $_SESSION["u"]["email"];

        $customer_img_Rs = Database::search("SELECT * FROM profile_img WHERE profile_img.customer_customer_id='" . $customer_id . "';");

        $comment_rs = Database::search("SELECT * FROM `comment` WHERE `comment`.place_place_id='" . $place_id . "';");

?>

        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/bootstrap.css" />
            <title>Document</title>
        </head>

        <body>

            <div class="container-fluid">

                <div class="col-12 commentbox py-4 shadow-sm px-2 ps-3" style="border-radius: 5px;">

                    <div class="col-12 commentbox row align-content-center py-2">

                        <div class="col-lg-1 commentbox col-md-1 col-2 text-end px-2 mt-1">
                            <?php

                            if ($customer_img_Rs->num_rows > 0) {

                                $customer_img_Data = $customer_img_Rs->fetch_assoc();
                            ?>
                                <img src="<?php echo $customer_img_Data["path"] ?>" style="border-radius: 100%;" class="shadow" width="50px" height="50px" />

                            <?php
                            } else {
                            ?>
                                <img src="8665306_circle_user_icon.png" style="border-radius: 100%;"  class=" shadow" width="50px" height="50px" />

                            <?php
                            }

                            ?>

                        </div>
                        <div class="col-lg-9 col-md-6 col-7  text-start justify-content-center align-content-center commentbox">
                            <textarea rows="2" class="col-12 form-control" placeholder="Text comment here....." id="comentcontent"></textarea>
                        </div>
                        <div class="col-lg-2 col-md-2 col-3 mt-2  text-start commentbox">
                            <button class="btn btn-primary col-12" onclick="coment(<?php echo $place_id; ?>)">Send</button>
                        </div>


                    </div>

                    <hr />

                    <div class="col-12 commentbox text-start mt-3  py-2">

                        <?php

                        if($comment_rs->num_rows > 0){

                        for ($x = 0; $x < $comment_rs->num_rows; $x++) {

                            $comment_data = $comment_rs->fetch_assoc();

                            $customer_in_coment = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $comment_data["customer_customer_id"] . "'");

                            $comnt_img_path = Database::search("SELECT * FROM profile_img WHERE profile_img.customer_customer_id='" . $comment_data["customer_customer_id"] . "';");
                            $comnt_img_pathData = $comnt_img_path->fetch_assoc();
                            $customer_in_comentData = $customer_in_coment->fetch_assoc();
                        ?>


                            <div class="col-12 commentbox row align-content-center">


                                <div class="col-lg-1 commentbox col-md-1 col-2 text-start ps-4">
                                    <img src="<?php echo $comnt_img_pathData["path"] ?>" height="43px" width="43px" style="border-radius: 100%;" />

                                </div>
                                <div class="col-lg-11  commentbox col-md-11 col-10 text-start">
                                    <label class="form-label commentbox" style="font-weight: 500;"><?php echo $customer_in_comentData["email"] ?></label>

                                    <div class="col-12 commentbox">
                                        <textarea class="col-12 commentbox" style="border-style: none;" placeholder="Text comment here....."
                                            readonly><?php echo $comment_data["content"] ?></textarea>

                                    </div>
                                </div>

                            </div>

                        <?php
                        }
                    }else{
                        ?>
<div class="col-12 commentbox text-center" style="color: gray;">Not found coment Yet.....!</div>
                        <?php
                    }

                        ?>




                    </div>

                </div>

            </div>

            <script src="script.js"></script>

        </body>

        </html>

<?php
    } else {
        echo ("Invalid place");
    }
} else {
    echo ("Invalid user");
}

?>