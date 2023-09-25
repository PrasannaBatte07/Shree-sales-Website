<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "shree_sales";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

    $query = "SELECT * FROM cart";
    
    $result = mysqli_query($conn, $query);
    if (!$result) {
        trigger_error(mysqli_error($conn), E_USER_ERROR);
    }
    $row =  mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

mysqli_close($conn);
?>

