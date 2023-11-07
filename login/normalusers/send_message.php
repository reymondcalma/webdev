<?php

    session_start();

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $message = $_POST["message"];
    $incoming_id = $_GET["unique_id"];

    $sql = "INSERT INTO messages(incoming_id,outgoing_id,message)
    VALUES ('".$incoming_id."','".$_SESSION["unique_id"]."','".$message."')";
 
if ($conn->query($sql) === TRUE) {
    header('Location: message.php');
}
else {
    header('Location: index.php');
}

closeConnection($conn);

?>