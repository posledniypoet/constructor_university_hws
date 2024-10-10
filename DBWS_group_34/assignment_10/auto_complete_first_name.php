<?php
require_once('base.php');

function get_first_name($connect , $term){
    $query = "SELECT * FROM Persons WHERE first_name LIKE '%".$term."%' ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data;
}

if (isset($_GET['term'])) {
    $getname = get_first_name($conn, $_GET['term']);
    $firstNamesList = array();
    foreach($getname as $name){
        $firstNamesList[] = $name['first_name'];
    }
    echo json_encode($firstNamesList);
}
?>