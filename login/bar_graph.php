<?php
    session_start();

    include_once("../included/dbaccess/DBUtil.php");

    $conn = getConnection();

    $query = "SELECT MONTH(STR_TO_DATE(Date, '%m/%d/%Y')) AS month, COUNT(*) AS count FROM activities GROUP BY MONTH(STR_TO_DATE(Date, '%m/%d/%Y'))";
    $result = $conn->query($query);
    $activityData = array_fill(0, 12, 0);
      if ($result->num_rows > 0) {
          while ($rowActivity = $result->fetch_assoc()) {
              $month = $rowActivity['month'];
              $count = $rowActivity['count'];
              $monthIndex = $month - 1;
              $activityData[$monthIndex] = (int) $count;
          }
      } else {
          echo "No activity data found.";
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https:cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
  .div{
    display:flex;
  }
</style>
</head>
<body>

    <div class="bargraph">
      <canvas id="activityChart" style="width:100%;max-width1000px"></canvas>
    </div>



</body>
<script>
var activityLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   var activityData = <?php echo json_encode(array_values($activityData)); ?>;
   activityData.push(<?php echo array_sum($activityData); ?>);

   var activityCtx = document.getElementById('activityChart').getContext('2d');
   var activityChart = new Chart(activityCtx, {
      type: 'bar',
      data: {
         labels: activityLabels,
         datasets: [{
            label: 'Number of Activities',
            data: activityData,
            backgroundColor: 'black',
            borderColor: '#793398',
            borderWidth: 1

         }]
         
      },
      options: {
         responsive: true,
         scales: {
            y: {
               beginAtZero: true,
               stepSize: 1,
               ticks: {
                  callback: function (value, index, values) {
                     if (index === values.length - 1) {
                        return 'Total: ' + value;
                     } else {
                        return value;
                     }
                  }
               }
            }
         }
      }
   });

</script>
</html>