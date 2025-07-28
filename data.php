<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot";

$motor1 = $_POST["motor1"];
$motor2 = $_POST["motor2"];

echo "Motor 1: $motor1<br>";
echo "Motor 2: $motor2<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO arm  (id, motor1, motor2)
VALUES ('', '$motor1', '$motor2')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>