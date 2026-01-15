<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $rid = '1';
    $sid = $_SESSION["u"]["customer_id"];

    if ($rid != 0) {

        $chatRs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $sid . "' OR `to`='" . $sid . "'");

        for ($x = 0; $x < $chatRs->num_rows; $x++) {

            $d = $chatRs->fetch_assoc();
            if ($d["to"] == $sid && $d["admin_adminId"] == $rid) {

                // $rs1 = Database::search("SELECT * FROM `admin` WHERE `adminId`='" . $rid . "'");

                // // $d1 = $rs1->fetch_assoc();

?>
                <div class="col-12 mt-2 px-2" id="sendadminmsgBox">
                    <div class="col-6 text-white" style="background-color: green;">
                        <div class="col-12 pt-2" style="background-color: green;">
                            <span class="text-white fw-bold fs-4" style="background-color: green;"><?php echo $d["content"] ?></span>
                        </div>
                        <div class="col-12 text-end pb-2" style="background-color: green;">
                            <span class="text-white fs-6" style="background-color: green;"><?php echo $d["datetime"]; ?></span>
                        </div>
                    </div>
                </div>
                <?php
            } else {

                if ($d["from"] == $sid && $d["admin_adminId"] == $rid) {



                ?>

                    <div class="col-12 mt-2 px-2" id="sendadminmsgBox">
                        <div class="offset-6 col-6 text-white" style="background-color: red;">
                            <div class="col-12 pt-2" style="background-color: red;">
                                <span class="text-white fw-bold fs-4" style="background-color: red;"><?php echo $d["content"] ?></span>
                            </div>
                            <div class="col-12 text-end pb-2" style="background-color: red;">
                                <span class="text-white fs-6" style="background-color: red;"><?php echo $d["datetime"]; ?></span>
                            </div>
                        </div>
                    </div>
<?php
                }
            }
        }
    }
}else{
    
    $recive_id = $_SESSION["recive_id"];
    $sender_id = '1';

    if ($recive_id != 0) {

        $chatRs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $recive_id . "' OR `to`='" . $recive_id . "'");

        for ($x = 0; $x < $chatRs->num_rows; $x++) {

            $d = $chatRs->fetch_assoc();
            if ($d["from"] == $recive_id && $d["admin_adminId"] == $sender_id) {

                // $rs1 = Database::search("SELECT * FROM `admin` WHERE `adminId`='" . $rid . "'");

                // // $d1 = $rs1->fetch_assoc();

?>
                <div class="col-12 mt-2 px-2" id="sendadminmsgBox">
                    <div class="col-6 text-white" style="background-color: green;">
                        <div class="col-12 pt-2" style="background-color: green;">
                            <span class="text-white fw-bold fs-4" style="background-color: green;"><?php echo $d["content"] ?></span>
                        </div>
                        <div class="col-12 text-end pb-2" style="background-color: green;">
                            <span class="text-white fs-6" style="background-color: green;"><?php echo $d["datetime"]; ?></span>
                        </div>
                    </div>
                </div>
                <?php
            } else {

                if ($d["to"] == $recive_id && $d["admin_adminId"] == $sender_id) {



                ?>

                    <div class="col-12 mt-2 px-2" id="sendadminmsgBox">
                        <div class="offset-6 col-6 text-white" style="background-color: red;">
                            <div class="col-12 pt-2" style="background-color: red;">
                                <span class="text-white fw-bold fs-4" style="background-color: red;"><?php echo $d["content"] ?></span>
                            </div>
                            <div class="col-12 text-end pb-2" style="background-color: red;">
                                <span class="text-white fs-6" style="background-color: red;"><?php echo $d["datetime"]; ?></span>
                            </div>
                        </div>
                    </div>
<?php
                }
            }
        }
    }

}

?>