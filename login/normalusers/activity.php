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

    $query = "SELECT * FROM user where Role = 'staff' and id != '".$_SESSION["id"]."'";
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
            display:flex;
            justify-content:space-between;
            background-image: linear-gradient(to left ,#b3e3f8, #b3e3f8, #26547C);
        }

        input{
            padding: 5%;
            border-radius: 5px;
        }
        input:hover{
            background-color: black;
            color: white;
        }
        input[type=submit]{
            padding: 10%;
            border-radius: 5px;
            margin-left: 40%;
            background-color: black;
            color:white ;
            cursor: pointer;
        }
        input[type=submit]:hover{
            background-color: #26547C;
            color: white;
        }
        input[type=date]{
            width:98%;
        }
        input[type=time]{
            width:98%;
        }
        .didnt{
            text-decoration: none;
            color: black;
            margin-left:37%;
            border:1px solid black;
            padding: 7%;
        }
        .didnt:hover{
            color: black;
            background-color:white;
        }
        .col1{
            background-image:url("../included/images/2.jpg");
            background-repeat:no-repeat;
            background-size:contain;
            height:80vh;
            width:70%;
            max-width:90vw;
            margin:3% 0 5%;
        }
        .col2{
            background-color: rgb(179, 227, 248, 0.2);
            padding: 0 14.6%;
            display:flex;
            justify-content:center;
            background-image: linear-gradient(to bottom right , #b3e3f8,#b3e3f8, #26547C);

        }
        .inner{
            margin:20% 0;
            border:1px solid black;
            padding:80% 100% 80%;
            box-shadow: -3px 2px 5px 3px rgba(150,144,144,0.75);
            -webkit-box-shadow: -3px 2px 5px 3px rgba(150,144,144,0.75);
            -moz-box-shadow: -3px 2px 5px 3px rgba(150,144,144,0.75);
        }
        .inner h1{
            text-shadow:3px 3px 2px white;
            font-family:Cursive;
            padding: 0 0 10% ;
            text-align:center;
        }
        .inner p{
            font-size:20px;
            text-align:center;
        }
</style>
</head>
<body>
<?php include_once("../included/header.php"); ?>
    <div class="body">
        <div class="col1">
            
        </div>
            <div class="col2">
                <div class="inner">
                    <form method="POST" action="add_activity.php">
                        <h1>Add Activty</h1>
                        <input type="hidden" name="user_id" value="<?php isset($_SESSION["id"]) ?>">
                        <input type="text" name="name" required placeholder="Activity Name: " autocomplete="off"><br><br>
                        <input type="date" name="date" required placeholder="Date: "><br><br>
                        <input type="time" name="time" required placeholder="Time: "><br><br>
                        <input type="text" name="location" required placeholder="Location: " autocomplete="off"><br><br>
                        <input type="text" name="ootd" required placeholder="OOTD: " autocomplete="off"><br><br><br>
                        <br>
                        <input type="submit" value="Add" ><br><br><br><br>
                        <a href="staff_home.php" class="didnt">Cancel</a>
                    </form>
                </div>

            </div>
    </div>
</body>
<?php include_once("../included/footer.html"); ?>
</html> -->