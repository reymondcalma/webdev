<?php
    if (isset($_SESSION["Role"]) && $_SESSION["Role"] == "staff"){
        $contprof = '<a href="user_profile.php" class="aa">Profile</a>';  
        $loginButton = '<a href="../logout.php" class="aa">Logout</a>';   
        $home = '<a href="staff_home.php" class="aa">Home</a>';
        $announcements = '<a href="#announcements" class="aa">Announcements</a>';
        $activity = '<div class="dropdown" id="drop">
                         <button class="dropbtn">Activities</button>
                         <div class="dropdown-content">
                        <a href="activity.php">Add Activity</a>
                        <a href="show_all_activities.php">Show All Your Activities</a>
                        <a href="done_activities.php">Done Activities</a>
                        </div>
                    </div>';
    } 
    elseif(isset($_SESSION["Role"]) && $_SESSION["Role"] == "admin"){
        $home = '<a href="admin_home.php" class="aa">Home</a>';
        $contprof = '<a href="" class="aa">Admin</a>';  
        $loginButton = '<a href="../logout.php" class="aa">Logout</a>';   
        $activity = '<a href=""></a>';
        $announcements = '<a href="" class="aa" >Post an Announcement</a>';
    }   
    else {
        $contprof = '<a href="" class="aa">Contact us</a>';  
        $loginButton = '<a href="first.html" class="aa">Login</a>';
        $home = '<a href="index.php" class="aa">Home</a>';   
        $activity = '<a href=""></a>';
        $announcements = '<a href="staff_home.php" class="aa">Announcement</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .header{
            display: flex;
            background-color: #b3e3f8;
            padding: 15px;
            justify-content: right;
            position:sticky;
            top:0;
            z-index:999;
        }
        .aa{
            padding: 0.8% .8%;
            text-decoration: none;
            color: black;
            margin-right: 1%;
            font-size :1.1em;
            border:1px solid gray;
            font-family:serif;
            border-radius:5px;

        }
        .aa:hover{
            background-color: white;
            border-radius: 5px;
            color: black;
        }

        .dropbtn {
            font-size :1.1em;
            color: black;
            padding: 15% 10%;
            border: none;
            background-color:#b3e3f8;
            border:1px solid gray;
            margin-right:34px;
            font-family:serif;
            border-radius: 5px;
        }
        .dropbtn:hover {
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color:#b3e3f8 ;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border:2px solid white;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align:center;
        }

        .dropdown-content a:hover {
            background-color: white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: white;
        }
        .modal-header{
            justify-content: center;
            font-family: serif;
            background-color: whitesmoke;
            text-shadow: 1px 1px white;
        }
        .modal-body{
            display: flex;
            justify-content: center;
        }
        .modal{
            
        }
    </style>
</head>
    <div class="header">
        <?php echo $activity?>
        <?php echo $home ?>
        <?php echo $announcements ?>
        <?php echo $contprof ?>
        <?php echo $loginButton ?>
    </div>

</html>


