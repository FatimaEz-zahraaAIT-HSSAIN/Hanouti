<?php session_start(); 
    include_once 'models/db.php';
    $prod = getProductById($_GET['id_Produit']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/details.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : Product details</title>
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

    <div class="container">
        <img src="images/<?=$prod['image']?>" alt="">
        
        <?php if($prod['SOLD'] != 0 ){ $afterS=  $prod['price'] - ($prod['price']*$prod['SOLD'])/100;}
                else{$afterS= $prod['price']; }

         ?>
            <div class="prod-info">
                    <div class="info"><span>Product Name:</span> <p><?=$prod['title']?> </p></div>
                    <div class="info"><span>Product Price:</span> <p> <?=$prod['price']?> MAD</p></div>
                    <div class="info"><span>Sale %:</span> <p><?=$prod['SOLD']?>% OFF</p></div>
                    <div class="info"><span>Price after sale:</span> <p id="price"> <?=$afterS?> MAD </p></div>      
            </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="data/produits.js"></script>
</body>
</html>