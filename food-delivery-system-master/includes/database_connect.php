<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "food_delivery_system";

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$connect)
{
    die("Conenction failed: ".mysqli_connect_error());
}