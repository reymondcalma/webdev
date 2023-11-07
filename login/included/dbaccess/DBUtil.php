<?php

$conn;

function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sd208";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeConnection($conn)
{
    $conn->close();
}
?>