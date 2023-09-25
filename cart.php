<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shree_sales";

$product_name=$_POST['product_name'];
$price=$_POST['price'];
$image=$_POST['image'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into cart (product_name, price, image)
    VALUES (?,?,?)");
    $stmt->bind_param("sss", $product_name, $price, $image);
    $execval = $stmt->execute();
    echo $execval;
    echo "Message sent...";
    echo "Thank you";
    header('Location: products.html');
    echo "<script>alert('Thank you...!');</script>";
    $stmt->close();
    $conn->close(); 
} 

?>