<?php
 session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: ../first.html");
    }
    else
    {
        if($_SESSION["Role"] == "staff")
        {
        }
        else
        {
            header("Location: ../first.html");
        }
    }
    $_SESSION["login"] = $_SESSION["Role"];

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $id = $_GET["id"];

    $sql = "SELECT * FROM activities WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
<style>
    .body{
        background-image:linear-gradient(to right bottom, #b3e3f8,#26547C);
    }
    .user{
        padding:50px;
        color:black;
        background-image:url("../included/images/para.jpg");
        background-repeat:no-repeat;
        background-attachment:fixed;
        margin:3% 20%;
        background-size: 100% 100%;
        box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -webkit-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -moz-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        border-radius:20px;
    }
    .user a{
        text-decoration:none;
        color:white;
    }
    .show{
        text-align:center;
        margin:0 15% 0 15%;
        padding:7%;
        background-color:#cdeffa;
        border-radius:20px;
        box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -webkit-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -moz-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        border:1px solid gray;
    }
    .show a{
        color:black;
        font-size:20px;
    }
    .show a:hover{
        color:gray;
    }
    .col1{
        padding:100px;
        color:black;
        border:1px solid black;
        margin:5%;
    }

    input{
        background-color:#B8B8B8;
        padding: 4% 4%;
        text-align:center;
        border-radius:20px;
        font-size:25px;
        font-weight:bold;
        text-shadow:1.5px 1.5px white; 
        font-family:Cursive;    
        border:1px solid black;
    }
    .title{
        text-shadow:2px 2px gray; 
        font-family:Cursive;
        padding:0 0 2%;
        border-bottom:2px solid black;
    }
    .show h3{
        font-family:Cursive;
        border-bottom:2px solid black;
        padding:5%;
        background-color:#B8B8B8;
        border-radius:20px;
    }
</style>
</head>
<body>
<div class="body">
    <?php include_once("../included/header.php"); ?>
    <div class="user">
          <div class="show">
            <div class="title">
                <h1>SET ACTIVITY</h1>
            </div>
                    <h1 style="padding:5%; border-bottom:2px solid black; font-family:Cursive;background-color:#B8B8B8; border-radius:20px;">Name: <?php echo $row['Name']; ?></h1>
                    <h3>Date: <?php echo $row['Date']; ?></h3>
                    <h3>Time: <?php echo $row['Time']; ?></h3>
                    <h3>Location: <?php echo $row['Location']; ?></h3>
                    <h3>OOTD: <?php echo $row['ootd']; ?></h3><br><br>
                
                    <form action="set_as_done_activities.php?id=<?php echo $row['id']; ?>" method="POST">
                        <input type="hidden" name="name" value="<?php echo $row['Name']; ?>" autocomplete="off">
                        <input type="hidden" name="date" value="<?php echo $row['Date']; ?>">
                        <input type="hidden" name="time" value="<?php echo $row['Time']; ?>">
                        <input type="hidden" name="location" value="<?php echo $row['Location']; ?>" autocomplete="off">
                        <input type="hidden" name="ootd" value="<?php echo $row['ootd']; ?>" autocomplete="off">
                        <h3 style="color:white; background-color:black; margin:0 30% 2% 30%;">Remarks</h3>
                        <textarea name="remarks" id="" cols="30" rows="5"></textarea><br><br>
                        <input type="submit" value="Mark as Done"><br><br>
                    </form>    
                    <a href="cancel_activity.php?id=<?php echo $row['id']; ?>"><h3>Cancel Activity</h3></a>
          </div>
          <br><br>
    </div>
    <?php include_once("../included/footer.html"); ?>
</div>
</body>
</html>
                 