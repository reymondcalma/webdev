<?php
session_start();
include_once("../included/dbaccess/DBUtil.php");

class ArrayList {
    private $array;

    public function __construct() {
        $this->array = array();
    }

    public function add($element) {
        $this->array[] = $element;
    }

    public function get($index) {
        if ($this->validIndex($index)) {
            return $this->array[$index];
        }
        return null;
    }

    public function size() {
        return count($this->array);
    }

    public function remove($index) {
        if ($this->validIndex($index)) {
            array_splice($this->array, $index, 1);
        }
    }

    private function validIndex($index) {
        return $index >= 0 && $index < count($this->array);
    }
}

// Creating a new ArrayList-like object
$list = new ArrayList();

// Adding elements to the list
$list->add("Item 1");

// Getting the size of the list
 $list->size();  // Output: 3

// Accessing elements in the list
 $list->get(0);  // Output: Item 1

// Removing an element from the list
$list->remove(1);

// Getting the updated size of the list
 $list->size();  // Output: 2


$conn = getConnection();


if ($conn) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $ootd = $_POST["ootd"];
    $numberofuser_id = $_POST["user_id"];

    $list->add($numberofuser_id);

    foreach($list as $users){
        $sql = "INSERT INTO activities (user_id, Name, Date, Time, Location, ootd)
                VALUES ('".$users."','".$name."','".$date."', '".$time."','".$location."','".$ootd."')";  
        if ($conn->query($sql) === TRUE) {
            header('Location: w3schools.com');
        }
        else {
            header('Location: index.php');
        }
    }

    closeConnection($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>