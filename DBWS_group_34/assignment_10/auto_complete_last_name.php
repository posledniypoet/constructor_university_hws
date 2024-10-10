<?php
require_once('base.php');

function get_last_name($connect , $term){
    $query = "SELECT * FROM Persons WHERE last_name LIKE '%".$term."%' ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data;
}

if (isset($_GET['term'])) {
    $getname = get_last_name($conn, $_GET['term']);
    $lastNamesList = array();
    foreach($getname as $name){
        $lastNamesList[] = $name['last_name'];
    }
    echo json_encode($lastNamesList);
}
?>