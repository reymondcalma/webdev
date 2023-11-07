<?php

    session_start();
    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $id = $_GET["id"];
        
    $query1 = "DELETE FROM activities WHERE id = '$id'";
    mysqli_query($conn, $query1);

    
    $user_id = $_SESSION["id"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $ootd = $_POST["ootd"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO done_activities (user_id, Name, Date, Time, Location, ootd, remarks)
    VALUES ('".$user_id."','".$name."','".$date."', '".$time."','".$location."','".$ootd."', '".$remarks."')";

    if ($conn->query($sql) === TRUE) {
        header('Location: staff_home.php');
    }
    else {
        header('Location: activity.php');
    }

    closeConnection();
?>