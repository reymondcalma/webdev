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

    $query = "SELECT * FROM user WHERE Role = 'staff' and id != '".$_SESSION["id"]."' ";
    $result = mysqli_query($conn, $query);

    $query1 = "SELECT * FROM announcements ";
    $result1 = mysqli_query($conn, $query1);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
<style id="theme">
.body{
    display:flex;
}
.content{
    display: flex;
    width:80%;
    height:auto;
    background-color:gray;
    flex-direction:column;
    margin-left: 20%;
}
.homeimage{
    display: flex;
    background-image:url("../included/images/surf2.jpg" );
    background-size:cover;
    height:100vh;
    margin:auto;
    width:100%;
    align-items: center;
    justify-content: center;
}
.homeimage h1{
    border:2px solid white;
    padding: 5% 5% ;
    color: white;
    font-family:Cursive;
    border-radius:10px;
    text-shadow:4px 4px black;
    background-color:transparent;
    box-shadow: 5px 10px 18px #888888;
    width: 38%;
    font-size:50px;
    overflow: hidden; /* Hide overflowing characters */
    animation: typing 3s steps(30, end); /* Animation properties */
    white-space: nowrap; /* Prevent line breaks */
    border-right: 3px solid; /* Add a blinking cursor effect */
    animation-name: typing;
}
@keyframes typing {
    from {
        width: 0; 
        }
    to {
        width: 38%; 
        }
    }
.nav{
    width:19%;
    position:fixed;
    height:90vh;
    overflow-y:auto;
    overflow-x:hidden;
}
.profile{
    width:40%;
    height:auto;
    padding:10% 0% 0% 30%;

}


.see h1{
    text-align: center;
    font-family: cursive;
    padding:5% 5% ;
    border:1px solid black;
    border-bottom: 5px solid black;
    border-radius: 10px;

}
.see{
    margin:0 1%;
}
.announce{
    display: flex;
    flex-direction: column;
    height:100vh;
    background-image: url("../included/images/announce.jpg");
    background-size: cover;
    overflow-y:scroll;
    overflow-x:hidden;
}
.h1{
    text-align: center;
    border:2px solid white;
    border-bottom:7px solid white;
    font-size:1.5em;
    font-family: cursive;
    margin:5% 20%;
    text-shadow: 4px 4px solid white;
    border-radius: 20px;
}
.h1 h1{
    color: white;
    text-shadow: 7px 7px black;
}
.chat button span{
}
.chat button p{
    margin-left: 5%;
}
.chat i{

}
.chat .button{
    display:flex;
    padding:3% 0  ;
    font-family:sans-serif;
    width:100%;
    cursor: pointer;
    background-color: whitesmoke;
    border: 1px solid white;
    border-bottom: 3px solid black;
    margin: 0 1% 2% 0 ;
    border-radius: 8px;
    justify-content: center;
    font-size: 1em;
    text-decoration:none;
    color:black;
}
.chat-box {
width: 20vw;
height: 60vh;
border: 1px solid black;
border-radius: 4px;
z-index: 9;
margin:0 0 0 21% ;
position: fixed;
left: 0;
background-color:white;
}

.chat-messages {
height: 53vh;
padding: 2%;
}

.message {
margin-bottom: 2%;
}

.message p {
padding: 1%;
background-color: #f1f0f0;
border-radius: 4px;
}

.incoming {
text-align: left;
}

.outgoing {
text-align: right;

}

.chat-input {
padding: 10px;
display: flex;
align-items:flex-end;
position:sticky;
bottom: 0;
}

.chat-input input {
flex: 1;
padding: 6px;
border: 1px solid #ccc;
border-radius: 4px;
}

.chat-input button {
padding: 6px 12px;
margin-left: 10px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
}
.annnouncements{
    justify-content:center;
    display:flex;
    border:2px solid black;
    border-bottom:5px solid black;
    margin:2% 10% ;
    padding: 5% 2% ;
    background-color:white;
    border-radius:20px;
    font-family:cursive;
    word-break: break-all;
    text-shadow:1.1px 1.1px gray;
}
</style>
</head>
<?php include_once("../included/header.php"); ?>
<body>


    <div class="body">
        <div class="nav">
            <div class="prof">
                <img src="" class="profile" id="profilePic" >
            </div>
            <div class="see">
                <h1>List of Friends</h1>
            </div>
            <div class="friends">
                <?php while($row = mysqli_fetch_assoc($result)) 
                    {         
                ?>  
                    <div class="chat">
                    <a href="message.php?name=<?php echo $row["Name"]; ?>&unique_id=<?php echo $row["unique_id"]; ?>" class="button">
                           <p><b><?php echo $row["Name"];?></b> is <span> <?php  echo $row["Status"];?>  </span> <i class="fa fa-circle" id="icon"></i></p>
                        </a>
                    </div>
                <?php                 
                    } 
                ?>
            </div>
        </div>
        <div class="content">
                <div class="homeimage">
                    <h1>Let's Create Activities!</h1> 
                </div>
                <div class="announce" id="announcements">
                    <div class="h1">
                        <h1>ANNOUNCEMENTS</h1>

                    </div>
                    <div class="ann">
                        <?php while($row = mysqli_fetch_assoc($result1)) 
                             {         
                          ?>  
                            <div class="annnouncements">
                                    <h2><b><?php echo $row["announcement"] ?></b></h2>
                            </div>
                            <?php                 
                            } 
                          ?>
                    </div>
                </div>
                <?php include_once("../included/footer.html"); ?>
        </div>
        
    </div>

</body>
          
<script>
    var profilePic = document.getElementById("profilePic");
    var icon = document.getElementById("icon");

    if (<?php echo isset($_SESSION["gender"]) ? 'true' : 'false'; ?>) {

        var gender = "<?php echo $_SESSION["gender"]; ?>";

        if (gender === "male") {
            profilePic.src = "../included/images/male_profile.jpg";
        } else if (gender === "female") {
            profilePic.src = "../included/images/female_profile.png"; 
        }
    }

</script>


</html>