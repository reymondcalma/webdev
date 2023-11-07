<?php
session_start();

include_once("included/dbaccess/DBUtil.php");

$conn = getConnection();

$sql1 = "UPDATE user SET Status = 'inactive' where id = '".$_SESSION["id"]."' ";
mysqli_query($conn, $sql1);

session_destroy();
header("Location: index.php");
?>