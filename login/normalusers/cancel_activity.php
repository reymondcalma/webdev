<?php
    session_start();

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $query = "DELETE FROM activities WHERE id = '$id'";
        mysqli_query($conn, $query);
        
        header("Location: show_all_activities.php");
      
    }
?>