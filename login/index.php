<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>
        .body{
            display:flex;
            justify-content:space-between;
        }
        .image{
            background-image:url("included/images/kid.jpg");
            background-repeat:no-repeat;
            background-size:cover;
            height:100vh;
            width: 100%;
            max-width:120vh;
            animation-name: fade;
            animation-duration: 1s; 
            animation-fill-mode: forwards; 
        }
        .text{
            width: 60%;
            background-image: linear-gradient(to bottom right , #b3e3f8, #26547C);
            height:100vh;
        }
        .text h1{
            font-family:Cursive;
            text-align:center;
            margin-top:20%;
            text-shadow: 2px 2px white;
        }
        .register{
            display:flex;
            justify-content: center;
            margin: 20% 0 ;
        }
        .modal-header{
            justify-content: center;
            font-family: serif;
            background-color: whitesmoke;
            text-shadow: 1px 1px white;
        }
        input{
            border-radius: 10px;
            border:1px solid black;
            padding:5%;
        }
        select{
            width: 110%;
            padding: 5%;
            border-radius: 10px;
            border:1px solid black;
        }
        @-webkit-keyframes fade {
        0%   { opacity: 0; }
        100% { opacity: 1; }
        }
        @-moz-keyframes fade {
        0%   { opacity: 0; }
        100% { opacity: 1; }
        }
        @-o-keyframes fade {
        0%   { opacity: 0; }
        100% { opacity: 1; }
        }
        @keyframes fade {
        0%   { opacity: 0; }
        100% { opacity: 1; }
        }


    </style>
</head>
<?php include("included/header.php"); ?>
    <body>
        <div class ="body">
            <div class="image"></div>
            <div class="text">
                <h1>Join us on our Activities!</h1>
                <div class="register">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" id="register" style="background-color:#b3e3f8; border:2px solid white; color:black; font-family:serif; font-size: 1.5em;"> Sign Up Now ! </button>
                </div>
            </div>
        </div>
    </body>
    <div id="myModal" class="modal">
        <div class="modal-dialog">
             <div class="modal-content" style="border:1px solid white;border-radius:10px;border-right:1px solid gray;">
                            <!-- Modal Header -->
                            <div class="modal-header" style="background-image:linear-gradient(to  left, #b3e3f8, #26547C);padding:5% 0 8%; ">
                                    <div class="header" style=" padding: 2% 15%; box-shadow: 5px 8px gray; border-radius:10px;">
                                         <h4 class="modal-title">Register</h4>
                                    </div>  
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body" style="z-index:9999;justify-content:center;display:flex; background-image:linear-gradient(to  left, #b3e3f8, #26547C); padding:8% 0;">
                                <form method="POST" action="register.php">
                                    <input type="text" name="Name" required placeholder="Name: " autocomplete="off"><br><br>
                                    <input type="email" name="Username" required placeholder="Username: " autocomplete="off"><br><br>
                                    <input type="password" name="Password" required placeholder="Password: " id="p1" onblur="passLength()" ><br><br>
                                    <input type="password" name="CPassword" required placeholder="Confirm Password: " id="p2" onblur="checkPass()"><br><br>
                                    <select name="Role" id="">
                                        <option value="">Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                    </select><br><br>
                                    <select name="Gender" id="">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select><br><br>
                                    <input type="submit" value="Sign up"><br><br><br>
                                    <a href="first.html" style="color:black;">Already have a account?</a><br><br>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin:0 0 0 30%;">Cancel</button>
                                </form>
                            </div>
                            <!-- Modal Footer -->
             </div>
        </div>
    </div>
<?php include("included/footer.html"); ?>
<script>
    function passLength(){

        const ps1 = document.getElementById("p1").value;

        if(ps1 == ""){
            
        }
        else if(ps1.length < 8){
            alert("Password too short!");
        }
    }

    function checkPass(){

        const p1 = document.getElementById("p1").value;
        const p2 = document.getElementById("p2").value;

        if(p2 == ""){
            
        }
        else if(p1 != p2){
            alert("Password Don't Match!");
        }
    }   
</script>
</html>