<?php
session_start();
$servername = "localhost";
$db_user = "group34";
$db_pass = "_";
$db_name = "_";

$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>