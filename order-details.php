<?php
include('cart-home.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shree_sales";

$name=$_POST['name'];
$ph_no=$_POST['ph_no'];
$email=$_POST['email'];
$address=$_POST['address'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $subtotal = $total;
    $product_names = implode(',', $product_name);

     $stmt = $conn->prepare("insert into order_details (name, ph_no, email, address, product_name, total)
        VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name, $ph_no, $email, $address, $product_names, $subtotal);
    $execval = $stmt->execute();
    echo $execval;
    }
    echo "Message sent...";
    echo "Thank you";
    header('Location: products.html');
    echo "<script>alert('Thank you...!');</script>";
    $stmt->close();
    $conn->close();  

?>