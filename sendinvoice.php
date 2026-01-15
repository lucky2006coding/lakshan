<?php 

session_start();

require "connection.php";

 $invoice_id = $_GET["invoicingid"];

 $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id`='".$invoice_id."'");

 $invoice_num = $invoice_rs->num_rows;

 if($invoice_num == 1){
    $invoice_data = $invoice_rs->fetch_assoc();
    $_SESSION["inid"] = $invoice_data;
    echo ("success");

   }else{
      echo ("Something went wrong. Please try again later.");
  }
  
?>