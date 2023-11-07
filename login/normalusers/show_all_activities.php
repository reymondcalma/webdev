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

        $query = "SELECT * FROM activities where user_id = ".$_SESSION["id"]." ORDER BY Date";
        $result = mysqli_query($conn, $query);

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
    }
    .user a{
        text-decoration:none;
        color:white;
    }
    .show{
        text-align:center;
        margin:0 20% 0 20%;
        padding:7%;
        background-color:whitesmoke;
        border-radius:20px;
        box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -webkit-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -moz-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        border:1px solid gray;
    }
    .show a{
        color:black;
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
    .show h1, h3 {
        background-color:#B8B8B8;
        padding:15px;
        border-radius:20px;
        text-shadow:.5px .5px white; 
        font-family:Cursive;
    }
    .act{
        text-align:center;
        margin:0 20% 5% 20%;
        padding: 3% 7%;
        background-color:whitesmoke;
        box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -webkit-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        -moz-box-shadow: -8px 10px 9px 4px rgba(0,0,0,0.75);
        border:1px solid gray;
        font-family:Cursive;
        text-shadow:1px 1px gray;
    }
</style>
</head>


<body>
<div class="body">
<?php include_once("../included/header.php"); ?>
    <div class="user">
        <div class="act"> 
            <h1>ACTIVITIES</h1>
        </div>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>  
          <div class="show">
            <h1><?php echo $row['Name']; ?></h1><br>
                    <h3>Date: <b><?php echo $row['Date']; ?></b> </h3>
                    <h3>Time: <?php echo $row['Time']; ?></h3>
                    <h3>Location: <?php echo $row['Location']; ?></h3>
                    <h3>OOTD: <?php echo $row['ootd']; ?></h3><br><br>
                    <b><a href="edit_activity.php?id=<?php echo $row['id']; ?>">Edit</a></b><br><br>
                    <b><a href="set_activity.php?id=<?php echo $row['id']; ?>">Set Activity</a></b><br><br>   
          </div>
          <br><br>
        <?php
          } 
        ?>
    </div>
    <?php include_once("../included/footer.html"); ?>
</div>
</body>

</html>