<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "shree_sales";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
session_start();

if(isset($_POST['submit'])) {
    $phone = $_POST['phno'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE phno = '$phone' AND password = '$password'";
    
    $result = mysqli_query($conn, $query);
    if (!$result) {
        trigger_error(mysqli_error($conn), E_USER_ERROR);
    }
    $row =  mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count  == 1) {
        // Login successful, set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        
        header('Location: index.html');
    } else {
        // Login failed, display error message
        $error = 'Invalid login credentials';
        header('Location: login.html');
    }
}

mysqli_close($conn);
?>
