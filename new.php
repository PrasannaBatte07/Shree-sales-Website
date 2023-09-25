<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "shree_sales";

$phno=$_POST['phno'];
$password=$_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into users (phno, password)
    VALUES (?,?)");
    $stmt->bind_param("is", $phno, $password);
    $execval = $stmt->execute();
    echo $execval;
    echo "Message sent...";
    echo "Thank you";
    header('Location: login.html');
    $stmt->close();
    $conn->close(); 
} 

?>