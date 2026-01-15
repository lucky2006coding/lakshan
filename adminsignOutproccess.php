<?php


session_start();

if(isset($_SESSION["as"])){

    $_SESSION["as"] = null;
    session_destroy();

    echo ("success");

}



?>