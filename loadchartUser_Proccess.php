<?php

session_start();
include "connection.php";

// $place_rs = Database::search("SELECT * FROM `place`");
$customer_rs = Database::search("SELECT customer.email, COUNT(*) AS count
FROM customer INNER JOIN place ON customer.customer_id = place.customer_customer_id
GROUP BY customer.customer_id
ORDER BY count DESC");
// $invoice_rsNum = Database::search("SELECT * FROM `invoice`");



if (isset($_GET["chart"])) {

    $data = [];
    $labels = [];

    for ($x = 0; $x < $customer_rs->num_rows; $x++) {

        $customer_data = $customer_rs->fetch_assoc();

        $labels[] = $customer_data["email"];

        $data[] = $customer_data["count"];
    }
    $json = [];
    $json["data"] = $data;
    $json["labels"] = $labels;

    echo json_encode($json);
}

if (isset($_GET["chartStatus"])) {

    $data2 = [];
    $labels2 = [];

    $customer_activate = Database::search("SELECT COUNT(customer_id) AS count FROM customer INNER JOIN `status` ON customer.status_status_id = status.status_id WHERE status.status_id='1'");

    $cusActDta = $customer_activate->fetch_assoc();


    $customer_deactivated = Database::search("SELECT COUNT(customer_id) AS count FROM customer INNER JOIN `status` ON customer.status_status_id = status.status_id WHERE status.status_id='2'");

    $cusDeactDta = $customer_deactivated->fetch_assoc();

    $data2 = [$cusActDta["count"], $cusDeactDta["count"]];
    $labels2 = ["Activated", "Deactivated"];


    $json = [];
    $json["data"] = $data2;
    $json["labels"] = $labels2;

    echo json_encode($json);
}
