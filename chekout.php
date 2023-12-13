<?php session_start(); 
    include_once 'models/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : Home</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="" >
            </a>
        </div>
        <div id="nav-con">
            <?php if(empty($_SESSION['user'])): ?>
                <a href="login.php" id="login">Log in</a>
                <a href="register.php" class="btn-primary">Sign up</a>
            <?php else: ?>
                <a href="myProducts.php" id="login"><ion-icon name="layers-outline"></ion-icon> My Products</a>
                <a href="ajoutProduit.php" id="login"><ion-icon name="add-outline"></ion-icon> Sell Product</a>
                <a href="logout.php" class="btn-primary">Logout</a>
            <?php endif; ?>
        </div>
    </nav>

    