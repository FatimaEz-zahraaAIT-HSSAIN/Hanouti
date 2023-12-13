<?php
    session_start();
    if(!isset($_SESSION['user'])){ header( "Location: index.php");}

    include_once 'models/db.php';

    $file = 'data/produits.json';
    arrayToJSON(getProducts(), $file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/addProduct.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : Sell Product</title>
</head>
<body>
    <nav>
        <a href="index.php">
            <img src="images/logo.png" alt="" >
        </a>
        <div id="nav-con">
                <a href="myProducts.php" id="login"><ion-icon name="layers-outline"></ion-icon> My Products</a>
                <a href="logout.php" class="btn-primary">Logout</a>
        </div>
    </nav>

    <center>
        <div class="wrapper">
            <div class="container">
                <img src="images/icon.png" alt="">
                <p>Hello, <span><?=$_SESSION['user']['name']?>!</span></p>
                <p>We are happy to see you here. Are you trying to sell a product? Your products deserve a stage that amplifies their value. Our website isn't just a marketplace; it's your partner in showcasing your excellence. Sell here with confidence and watch your success unfold.</p>
            </div>
            <div class="login-form">
                <h3>Product Information:</h3>
                <form action="controllers/addProduct.php" method="post" enctype="multipart/form-data">
                    <?php if(isset($_GET['Erreur'])){ ?>
                        <div class="erreur-box">
                            <p class="erreur"><strong>Erreur: </strong><?=$_GET['Erreur'] ?> </p>
                        </div>
                    <?php } ?>
                    <div class="forum-input">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <input type="text" name="product-name" id="" placeholder="Product name*">
                        <input type="hidden" name="owner" value="<?=$_SESSION['user']['id']?>">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="image-outline"></ion-icon>
                        <input type="file" name="product-image" id="">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="pricetag-outline"></ion-icon>
                        <input type="number" name="price" id="" placeholder="Price*">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <input type="number" name="sold" id="" placeholder="Sale (%)" >
                    </div>
                    <div class="forum-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="" placeholder="Password*">
                    </div>
                    <input name="addproduct" type="submit" value="Sell">
                </form>
            </div>
        </div>
    </center>

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>