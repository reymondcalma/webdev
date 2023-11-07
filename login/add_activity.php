<?php
/*
session_start();
include_once("../included/dbaccess/DBUtil.php");

$conn = getConnection();

$user_id = $_SESSION["id"];
$name = $_POST["name"];
$date = $_POST["date"];
$time = $_POST["time"];
$location = $_POST["location"];
$ootd = $_POST["ootd"];


    $sql = "INSERT INTO activities (user_id, Name, Date, Time, Location, ootd)
    VALUES ('".$user_id."','".$name."','".$date."', '".$time."','".$location."','".$ootd."')";
    
   if ($conn->query($sql) === TRUE) {
       header('Location: staff_home.php');
   }    
   else {
       header('Location: activity.php');
   }



closeConnection();

?>