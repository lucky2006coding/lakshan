<?php

session_start();
require "connection.php";




$date = date("Y:m:d H:i:s");

if (isset($_SESSION["u"])) {

    if (!empty($_POST["txt"])) {

        $sender_id = $_POST["sender"];
        $msgText = $_POST["txt"];


        Database::iud("INSERT INTO `chat`(`content`,`datetime`,`admin_adminId`,`to`)
         VALUES('" . $msgText . "','" . $date . "','1','" . $sender_id . "')");


?>



    <?php

    } else {
        echo ("Please enter text");
    }

    ?>


    <!-- ado  -->
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



        </div>
    </div>



    <div class="col-12 mb-3 py-3 row align-content-center" id="chatapp_divuser">

        <?php

        $chat_rs = Database::search("SELECT * FROM chat");

        $customer_id = $_SESSION["u"]["customer_id"];

        for ($chat = 0; $chat < $chat_rs->num_rows; $chat++) {

            $chat_data = $chat_rs->fetch_assoc();

            if ($chat_data["admin_adminId"] == '1' && $chat_data["from"] == $customer_id) {
        ?>


                <div class="col-12 ps-4 ms-1 mt-3 text-start d-flex align-content-center justify-content-start">
                    <div class="py-2  px-4 stylechatdivs shadow align-content-center bg-primary">

                        <span class="bg-primary text-white"><?php echo $chat_data["content"] ?></span>

                    </div>
                </div>

            <?php
            }

            if ($chat_data["admin_adminId"] == '1' && $chat_data["to"] == $customer_id) {
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
            <button class="continueBtn col-12" onclick="sendmsg(<?php echo $customer_id ?>);">Send</button>
        </div>

    </div>


    <!-- ado  -->

    <?php

} else {
    // validate $_SESSION["au"]

    if (isset($_GET["reciver"])) {

        $reciver_id = $_GET["reciver"];

        // $_SESSION["recive_id"] = $reciver_id;


        // Database::iud("INSERT INTO `chat`(`content`,`datetime`,`admin_adminId`,`from`)
        // VALUES('" . $msgText . "','" . $date . "','1','" . $reciver_id . "')");

        $recever_rs = Database::search("SELECT * FROM `customer` WHERE `customer_id`='" . $reciver_id . "'");

        if ($recever_rs->num_rows == 1) {


    ?>

            <?php

            if (isset($_GET["admintxt"])) {

                if (!empty($_GET["admintxt"])) {

                    $admintext = $_GET["admintxt"];

                    // echo $admintext;
                    // echo $date;
                    // echo"<br/>";
                    // echo $reciver_id;

                    Database::iud("INSERT INTO `chat`(`content`,`datetime`,`admin_adminId`,`from`) VALUES('" . $admintext . "','" . $date . "','1','" . $reciver_id . "');");

                }else{
                    echo("Enter text");
                }
            }

            ?>
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



</div>
</div>



<div class="col-12 mb-3 py-3 row align-content-center" id="chatapp_divadmin">

<?php

$chat_rs = Database::search("SELECT * FROM `chat`");


for ($chat = 0; $chat < $chat_rs->num_rows; $chat++) {

    $chat_data = $chat_rs->fetch_assoc();

    if ($chat_data["admin_adminId"] == '1' && $chat_data["to"] == $reciver_id) {

        // echo $reciver_id;
?>


        <div class="col-12 ps-4 ms-1 mt-3 text-start d-flex align-content-center justify-content-start">
            <div class="py-2  px-4 stylechatdivs shadow align-content-center bg-primary">

                <span class="bg-primary text-white"><?php echo $chat_data["content"] ?></span>

            </div>
        </div>

    <?php
    }

    if ($chat_data["admin_adminId"] == '1' && $chat_data["from"] == $reciver_id) {
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
    <input class="form-control col-12" placeholder="Type text here..." type="text" id="msgtextadmin" />
</div>
<div class="col-3 ps-3 pe-2 mt-5">

    <?php

    ?>
    <button class="continueBtn col-12" onclick="sendMsgId2(<?php echo $reciver_id ?>);">Send</button>
</div>

</div>

<?php


        } else {
            echo ("Undefined user");
        }
    }
}
?>