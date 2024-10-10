<?php
session_start();
$servername = "localhost";
$db_user = "akalinichev";
$db_pass = "B57Klm";
$db_name = "Group-37";

$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>