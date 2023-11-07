<?php
    session_start();

    if($_SESSION["Role"] == null)
    {        
        header("Location: first.html");
    }
    else
    {
        if($_SESSION["Role"] == "admin")
        {

        }
        else
        {
            header("Location: first.html");
        }
    }

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $query = "SELECT * FROM user WHERE Role = 'staff' ";
    $result = mysqli_query($conn, $query);

    $query4 = "SELECT * FROM deactivated_user WHERE Role = 'staff' ";
    $result4 = mysqli_query($conn, $query4);

    $query1 = "SELECT count(*) as male FROM user WHERE Gender = 'male' and Role = 'staff'";
    $query2 = "SELECT count(*) as female FROM user WHERE Gender = 'female' and Role = 'staff'";
    $query3 = "SELECT count(*) as others FROM user WHERE Gender = 'others' and Role = 'staff'";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);

    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    $row3 = mysqli_fetch_assoc($result3);

    $sql = "SELECT DATE_FORMAT(Date, '%Y-%m') AS month, COUNT(*) AS activity_count FROM activities GROUP BY month";
    $result5 = $conn->query($sql);

    if ($result5->num_rows > 0) {
        // Fetch data and store it in an array
        $data = array();
        while ($row = $result5->fetch_assoc()) {
            $data[$row['month']] = $row['activity_count'];
        }
    } else {
        echo "No activities found.";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <script src="../js/bootstrap.min.js"></script>

<style>
    *{
        font-size:1.1rem;
    }
    .body{
        display:flex;
        font-family:Cursive;
    }
    .body a{
        text-decoration:none;
        color:black;
    }
    .col1{
        border:1px solid black;
        width:30%;
        height:100vh;
        position: sticky;
        top:0;
        background-color:#f3f4f6;
    }
    .col2{
        border:1px solid black;
        width:100%;
        max-width: 80vw;
        text-align: center;
        background-color:#f3f4f6;
    }
    .profile{   
        flex-direction: row;
        display:flex;
        width: 15%;
        height: 15%;
        margin:5% 0 0 27%;
    }
    .members{
        display: flex;
        flex-direction:row;  
        margin:0 10%;
        flex-wrap:wrap;
       
    }
      .member-info {
        width: 100%;
        flex: 0 0 49%; /* Adjust the width as needed */
        border:.1px solid black;
        border-radius:20px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }   
    .deact_members{
        display: flex;
        flex-direction:row;  
        margin:0 10%;
        flex-wrap:wrap;
    }
    .deact-member-info{
        width: 100%;
        flex: 0 0 49%; /* Adjust the width as needed */
        border:.1px solid black;
        border-radius:20px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }
    
    .pie{
        display: flex;
        justify-content: center;
        align-items: center;
        border:1px solid black;
        margin:7% 12%;
        border-radius:20px;
        padding:2% 0;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }
    .viewmem{
        display: flex;
        justify-content: center;
        border:1px solid black ;
        margin:10% 5%;
        border-radius:10px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
        padding:1%;
    }
    .viewdeact{
        display: flex;
        justify-content: center;
        border:1px solid black ;
        margin:10% 5%;
        border-radius:10px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
        padding:1%;
        text-align:center;
    }
    .viewgen{
        display: flex;
        justify-content: center;
        border:1px solid black ;
        margin:10% 5%;
        border-radius:10px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
        padding:1%;
    }
    .viewbar{
        display: flex;
        justify-content: center;
        border:1px solid black ;
        margin:10% 5%;
        border-radius:10px;
        text-align:center;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
        padding:1%;
    }
    #textt{
        border:1px solid black;
        margin:5% 30%;
        padding:2% 0;
        border-radius:20px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }
    .member-info h1{
        padding:4%;
        border-bottom:2px solid black;
        margin-left:7%;
        margin-right:7%;
    }   
    #titles{
        border:1px solid black;
        margin:5% 30%;
        padding:2% 0;
        border-radius:20px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }   
    .bargraph{
        display: flex;
        justify-content: center;
        align-items: center;
        border:1px solid black;
        margin:7% 5%;
        border-radius:20px;
        padding:2% 0;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }
    .graph{
        border:1px solid black;
        margin:5% 30%;
        padding:1% 0;
        border-radius:20px;
        box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -webkit-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        -moz-box-shadow: -1px 2px 5px 4px rgba(0,0,0,0.3);
        background-color:white;
    }
</style>
</head>
<body>
<?php include_once("../included/header.php"); ?>
    <div class="body">
        <div class="col1">
            <div class="profile">
                <img src="../included/images/ad.png" style="" >
            </div>
            <div class="viewbar">
                <h1> <a href="#">POST AN ANNOUNCEMENT</a></h1>   
            </div>
            <div class="viewmem">
                <h1><a href="#members">View Members</a></h1>
            </div>
            <div class="viewdeact">
                <h1><a href="#deact_members">View Deactivated User</a></h1>
            </div>
            <div class="viewgen">
                 <h1><a href="#gender">Pie chart of gender</a></h1>
            </div>
            <div class="viewbar">
                <h1> <a href="#">Bar graph of activities from jan to dec</a></h1>   
            </div>

        </div>
        <div class="col2">
                 <h1 id="textt">ALL MEMBERS</h1>
            <div class="members" id="members">
                <?php while($row = mysqli_fetch_assoc($result)) 
                { ?>  
                    <div class="member-info">
                        <h1>Name:<?php echo $row['Name']; ?></h1>
                        <h3>Email:<?php echo $row['Email']; ?></h3>
                        <h3>Role:<?php echo $row['Role']; ?></h3>
                        <h3>Status:<?php echo $row['Status']; ?></h3>
                        <h3>Gender:<?php echo $row['Gender']; ?></h3><br>
                        <a href="deactivate.php?id=<?php echo $row["id"]; ?>">DeActivate</a><br><br><br>
                    </div>
                <?php
                    } 
                ?>
            </div>

            <div class="pie" id="gender">
                <h1>Gender:</h1>
                   <canvas id="myChart" style="width:100%; max-width:400px;"></canvas>
            </div>
                <div class="graph">
                   <h1>ACTIVITY BAR GRAPH</h1>
                </div>  
            <div class="bargraph">
                <canvas id="activityChart" ></canvas>
            </div>
            <h1 id="titles">DEACTIVATED USERS</h1>
            <div class="deact_members" id="deact_members">
             
                <?php while($row = mysqli_fetch_assoc($result4)) 
                { ?>  
                    <div class="deact-member-info">
                        <h1>Name:<?php echo $row['Name']; ?></h1>
                        <h3>Email:<?php echo $row['Email']; ?></h3>
                        <h3>Role:<?php echo $row['Role']; ?></h3>
                        <h3>Gender:<?php echo $row['Gender']; ?></h3><br><br><br>
                    </div>
                <?php
                    } 
                ?>
            </div>
        </div>
    </div>
</body>
<?php include_once("../included/footer.html"); ?>

    <script>
    var xValues = ["Male", "Female" ,"Others"];
    var yValues = [<?php echo $row1['male'] ?>, <?php echo $row2['female'] ?> ,<?php echo $row3['others'] ?>] ;
    var barColors = [ "#327fa8","#e33b3b" ,"#c014de"];

    new Chart("myChart", {
        type: "pie",
        data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
        },
        options: {
        title: {
            display: true,
        },
        maintainAspectRatio:false
        }
    });
    </script>
        <script>
        // Define the data for the chart
        var data = <?php echo json_encode($data); ?>;

        // Convert the data into arrays for labels and values
        var labels = Object.keys(data);
        var values = Object.values(data);

        // Create the chart
        var ctx = document.getElementById('activityChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Activity Count',
                    data: values,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
</html>

