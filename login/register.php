<?php
session_start();
include_once("included/dbaccess/DBUtil.php");

$conn = getConnection();

$unique_id = uniqid();

$name = $_POST["Name"];
$username = $_POST["Username"];
$password = $_POST["Password"];
$role = $_POST["Role"];
$gender = $_POST["Gender"];

$sql = "INSERT INTO user (unique_id,Name,Email ,Password, Role, Gender, Status)
 VALUES ('".$unique_id."','".$name."','".$username."','".$password."', '".$role."', '".$gender."' ,'inactive')";
 
if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Registered Successfully!');</script>";
    header('Location: first.html');

}
else {
    echo "<script> alert('Registered Failed!');</script>";
    header('Location: index.php');
}

closeConnection($conn);


?>