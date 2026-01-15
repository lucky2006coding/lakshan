<?php

session_start();
include "connection.php";

// $place_rs = Database::search("SELECT * FROM `place`");
$place_rs = Database::search("SELECT place.title, COUNT(*) AS count
FROM place INNER JOIN invoice ON place.place_id = invoice.place_place_id
GROUP BY place.place_id
ORDER BY count DESC");
// $invoice_rsNum = Database::search("SELECT * FROM `invoice`");



if (isset($_GET["chart"])) {

    $data = [];
    $labels = [];

    for ($x = 0; $x < $place_rs->num_rows; $x++) {

        $place_data = $place_rs->fetch_assoc();

        $labels[] = $place_data["title"];

        $data[] = $place_data["count"];
    }
    $json = [];
    $json["data"] = $data;
    $json["labels"] = $labels;

    echo json_encode($json);
}


if (isset($_GET["chartStatus"])) {

    $data2 = [];
    $labels2 = [];

    $place_activate = Database::search("SELECT COUNT(place_id) AS count FROM place INNER JOIN `status` ON place.status = status.status_id WHERE status.status_id='1'");

    $plcActDta = $place_activate->fetch_assoc();


    $place_deactivate = Database::search("SELECT COUNT(place_id) AS count FROM place INNER JOIN `status` ON place.status = status.status_id WHERE status.status_id='2'");

    $plcDeactDta = $place_deactivate->fetch_assoc();

    $data2 = [$plcActDta["count"], $plcDeactDta["count"]];
    $labels2 = ["Activated", "Deactivated"];


    $json = [];
    $json["data"] = $data2;
    $json["labels"] = $labels2;

    echo json_encode($json);
}

