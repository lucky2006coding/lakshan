<?php

session_start();

if(isset($_SESSION["u"])){
   echo("Success");
}else{
  echo("Invalid user");
}

?>