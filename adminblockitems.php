<?php

require "connection.php";

if(isset($_GET["category"])){

    $category_id = $_GET["category"];

  Database::iud("DELETE FROM `place_category` WHERE `place_category_id`='".$category_id."'");

  echo("Delete Success");

}

?>