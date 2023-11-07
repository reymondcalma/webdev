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
    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $id = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE id = '".$id."' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <script src="../js/bootstrap.min.js"></script>

   <title>Document</title>
<style>
   .body{
       background-image:url("../included/images/profile.jpg");
       background-repeat:no-repeat;
       background-size:cover;
       height:auto;
       width:100%;
        
   }
   .card{
        display: flex;
        border: 1px solid #b3e3f8;
        margin:0 25%;
        padding:6%;
        flex-direction:column;
        align-items:center;
        background-image: linear-gradient(to bottom right , #b3e3f8, #26547C);
        opacity: .8;
        font-family:Cursive;
        border-radius:10px;
        width:100%;
        max-width:50vw;
   }
   .card h1{
        padding:1% 7%;
        background-color:#b3e3f8;
        border-radius:10px;
        font-family:Cursive;
   }
</style>
</head>

<body>
<?php include_once("../included/header.php"); ?>
   <div class="body">
       <div class="card">
           <h1>Users Profile</h1><br>

           <h1>Name:<?php echo $row["Name"];?></h1><br>
           <h1>Email:<?php echo $row["Email"];?></h1><br>
           <h1>Password:<?php echo $row["Password"];?></h1><br>
           <h1>Gender:<?php echo $row["Gender"];?></h1><br>
           <h1>Your ID:<?php echo $row["id"];?></h1><br>

           <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" id="register" > Edit Profile </button>
       </div>
   </div>
</body>
<div id="myModal" class="modal">
        <div class="modal-dialog">
             <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header" >
                                    <div class="header">
                                         <h4 class="modal-title">Edit Profile</h4>
                                    </div>  
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form method="POST" action="register.php">
                                    <input type="text" name="Name" required value="<?php echo $row["Name"]?>" autocomplete="off"><br><br>
                                    <input type="email" name="Email" required value="<?php echo $row["Email"]?>" autocomplete="off"><br><br>
                                    <input type="text" name="Password" required value="<?php echo $row["Password"]?>"><br><br>
                                    <select name="Gender">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                     <br><br>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin:0 0 0 30%;">Cancel</button>
                                </form>
                            </div>
             </div>
        </div>
    </div>
<?php include_once("../included/footer.html"); ?>
</html>