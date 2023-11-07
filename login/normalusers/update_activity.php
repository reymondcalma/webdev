<?php
session_start();

include_once("../included/dbaccess/DBUtil.php");

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $ootd = mysqli_real_escape_string($conn, $_POST['ootd']);
    
    $query = "UPDATE activities SET Name = '$name', Date = '$date', Time = '$time', Location = '$location', ootd = '$ootd'  WHERE ID = '$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: show_all_activities.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>