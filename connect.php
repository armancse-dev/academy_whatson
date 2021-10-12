
<?php

session_start();
$Fname = $_POST['name'];
$email = $_POST['email'];
$subjects = $_POST['subject'];
$messages = $_POST['message'];


// Create connection
$conn = new mysqli('localhost', 'root', '', 'whatson_academy');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  $stmt = $conn->prepare("INSERT INTO registration (name,email,subject,message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss",$Fname, $email, $subjects, $messages);
  $stmt->execute();
  $_SESSION['status']="Your Data Submitted Successfully";
  header("Location: http://localhost/academy/contact.php");
  $stmt->close();
  $conn->close();
}



?>