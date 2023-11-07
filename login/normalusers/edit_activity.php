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
        background-color:whitesmoke;
        padding: 4% 4%;
        text-align:center;
        border-radius:20px;
        font-size:25px;
        font-weight:bold;
        text-shadow:1.5px 1.5px black; 
        font-family:Cursive;    
        border-bottom:2px solid black;
        border-top:none;
        border-left:none;
        border-right:none;
        color:gray;
    }
    .title{
        text-shadow:2px 2px gray; 
        font-family:Cursive;
        padding:0 0 2%;
        border-bottom:2px solid black;
    }
    input[type=date]{
        width:94%;
    }
    input[type=time]{
        width:94%;
    }
    input[type=submit]:hover{
        color:white;
        background-color:gray;
        cursor:pointer;
    }
    input:hover{
        background-color:#B8B8B8;
        color:white;
        text-shadow:black;
    }
</style>
</head>
<body>
<div class="body">
    <?php include_once("../included/header.php"); ?>
    <div class="user">
          <div class="show">
          <form method="POST" action="update_activity.php">
                <input type="hidden" name="id" required value="<?php echo $row['id']; ?>">
                <div class="title">
                    <h1>EDIT ACTIVITY</h1>
                </div><br><br>
                <input type="text" name="name" required value="<?php echo $row['Name']; ?>" autocomplete="off"><br><br>
                <input type="date" name="date" required value="<?php echo $row['Date']; ?>"><br><br>
                <input type="time" name="time" required value="<?php echo $row['Time']; ?>"><br><br>
                <input type="text" name="location" required value="<?php echo $row['Location']; ?>" autocomplete="off"><br><br>
                <input type="text" name="ootd" required value="<?php echo $row['ootd']; ?>" autocomplete="off"><br><br><br><br>
                <input type="submit" value="Done" ><br><br><br>
                <a href="show_all_activities.php" class="didnt">Cancel</a>
            </form>
          </div>
          <br><br>
    </div>
    <?php include_once("../included/footer.html"); ?>
</div>
</body>

</html>