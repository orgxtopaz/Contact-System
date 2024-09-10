<?php
$servername = "localhost";
$username = "zigm";
$password = "zigm1234567890";
$dbname="contactsystem";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>  