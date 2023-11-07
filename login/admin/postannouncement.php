<?php
session_start();
include_once("../included/dbaccess/DBUtil.php");

$conn = getConnection();

$announce = $_POST["announcement"];

$sql = "INSERT INTO announcements (announcement)
 VALUES ('".$announce."')";
 
if ($conn->query($sql) === TRUE) {
    header('Location: admin_home.php');

}
else {
    header('Location: w3schools.php');
}

closeConnection($conn);


?>