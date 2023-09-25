<?php
 
$user = 'root';
$password = '';

$database = 'shree_sales';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM cart ORDER BY id";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="CSS/cart.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Shree Sales</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart-home.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 style="text-align:center; margin: 7% 0 3% 0;">Shoping cart</h2>

    <!-- <form method="post" action="showcart.php"> -->

        <?php
        $total = 0;
        $product_name = array();
        $i = 0;
    
        while($rows=$result->fetch_assoc())
        {
    ?>
        <div class="container-1">
            <h1>
                <?php echo $rows['product_name'];?>
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $rows['image'] ;?>" class="img-responsive" alt="Product Image">
                </div>
                <div class="col-md-6" style="margin-left: -15%;">
                    <p style="color:grey; font-size:25px;font-weight: bold;">
                        <?php echo $rows['price'];?> Rs.
                    </p>
                </div>
            </div>
        </div>
     <?php
   
       $total = $rows['price'] + $total;
       $product_name[] = $rows['product_name'];
      
    }
    ?>

<h2 class="total"> Subtotal: <?php echo $total; ?> Rs. </h2>
 <a href="place-order.html"><button class="btn">Place Order</button></a>

    <!-- Footer -->
    <section class="footer-1">
        <div class="copy">&copy; All rights are reserved.</div>
    </section>
 </body>

</html>