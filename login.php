<?php
    session_start();
    if(isset($_SESSION['user'])){ header( "Location: index.php");}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : Login</title>
</head>
<body>
    <center>
        <div class="wrapper">
            <div class="container">
                <img src="images/hanouti.png" alt="">
                <p>You dont have an account? <a href="register.php">Register.</a></p>
            </div>
            <div class="login-form">
                <h3>Login</h3>
                <form action="controllers/auth.php" method="post">
                    <?php if(isset($_GET['Erreur'])){ ?>
                        <div class="erreur-box">
                            <p class="erreur"><strong>Erreur: </strong><?=$_GET['Erreur'] ?> </p>
                        </div>
                    <?php } ?>
                    <div class="forum-input">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="user" id="" placeholder="User*">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="" placeholder="Password*">
                    </div>
                    <input name="login"  type="submit" value="Login">
                </form>
            </div>
        </div>
    </center>
    
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>