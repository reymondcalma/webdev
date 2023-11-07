<?php
session_start();
include_once("included/dbaccess/DBUtil.php");

$username = $_POST["Username"];
$password = $_POST["Password"];

$conn = getConnection();

$sql = "SELECT * from user where Email = '".$username."' and Password = '".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["Email"] == $username && $row["Password"]== $password){

    if($row["Role"]=="admin")
    {        
        header("Location: admin/admin_home.php");
    }
    else
    {        
        header("Location: normalusers/staff_home.php");
    }
    $_SESSION["id"] = $row["id"];
    $_SESSION["gender"] = $row["Gender"];
    $_SESSION["Role"] = $row["Role"];
    $_SESSION["Status"] = $row["Status"];
    $_SESSION["unique_id"] = $row["unique_id"];


    $sql1 = "UPDATE user SET Status = 'active' where id = '".$_SESSION["id"]."' ";
    mysqli_query($conn, $sql1);
     

}
else
{
    header("Location: first.html");
}

closeConnection();


?>