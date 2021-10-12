
<?php
$name = $_POST['YourName'];
$email = $_POST['YourEmail'];
$sub = $_POST['Subject'];
$msg = $_POST['contents'];




// Create connection
$conn = new mysqli('localhost', 'root', '', 'whatson_academy');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $sql = "INSERT INTO contact_us VALUES ($name, $email, $sub, $msg)";

$sql = "INSERT INTO contact_us(YourName,YourEmail,Subject) VALUES('$name',$email',$sub')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<?php
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
  echo "Submit Successfully";
  $stmt->close();
  $conn->close();
}


?>