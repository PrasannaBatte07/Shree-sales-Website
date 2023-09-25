<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shree_sales";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$message=$_POST['message'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into get_in_touch (fname, lname, email, phno, message)
    VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $fname, $lname ,$email, $phno, $message);
    $execval = $stmt->execute();
    echo $execval;
    echo "Message sent...";
    echo "Thank you";
    header('Location: index.html');
    echo "<script>alert('Thank you...!');</script>";
    $stmt->close();
    $conn->close(); 
} 

?>