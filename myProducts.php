<?php session_start(); 
    include_once 'models/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/myProducts.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : My products</title>
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
    <div class="wrapper">
        <center><h2>My products</h2></center>
        
        <div class="container">
            <?php $prod = getMyProds($_SESSION['user']['id']); 
                foreach($prod as $pro){
                    $p = (array)$pro;
                    $afterS= $p['price'] - ($p['price']*$p['SOLD'])/100 ;
                    ?>
                <div class="prod">
                    <div class="img">
                        <p><span>ID: </span> <?=$p['id']?></p>
                        <img src="images/<?=$p['image']?>" alt="">
                    </div>
                        <div class="prod-info">
                            <div class="info"><span>Product Name:</span> <p><?=$p['title']?> </p></div>
                            <div class="info"><span>Product Price:</span> <p><?=$p['price']?> MAD </p></div>
                            <div class="info"><span>Sale %:</span> <p><?=$p['SOLD']?>% OFF</p></div>
                            <div class="info"><span>Price after sale:</span> <p><?=$afterS?> MAD</p></div>
                        </div>
                        <button class="edit"><ion-icon name="create-outline"></ion-icon></button>
                    
                </div>
            <?php } ?>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="data/cart.js"></script>

</body>
</html>