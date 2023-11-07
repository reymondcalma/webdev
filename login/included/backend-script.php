<?php

include('dbaccess/DBUtil.php'); 

$conn = getConnection();

$searchTerm = $_GET['term'];
$sql = "SELECT * FROM user WHERE Name LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {

   $data['id']    = $row['id']; 
   $data['value'] = $row['Name'];
   array_push($tutorialData, $data);
} 
}

 echo json_encode($tutorialData);

?>