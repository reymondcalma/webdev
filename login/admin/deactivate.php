<?php

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $id = $_GET["id"];

    $query = "SELECT * FROM user WHERE id = '".$id."'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $name = $row["Name"];
    $email = $row["Email"];
    $password = $row["Password"];
    $role = $row["Role"];
    $gender = $row["Gender"];

     $query1 = "DELETE FROM user WHERE id = '".$id."'";
     mysqli_query($conn, $query1);

    $sql = "INSERT INTO deactivated_user (Name,Email ,Password, Role, Gender)
    VALUES ('".$name."','".$email."','".$password."','".$role."', '".$gender."')";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin_home.php');
    }
    else {
        header('Location: w3schools.com');
    }

closeConnection();
?>