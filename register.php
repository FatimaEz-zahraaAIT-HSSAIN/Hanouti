<?php 
    session_start();
    if(isset($_SESSION['user'])){ header( "Location: index.php");}

    include_once 'models/db.php';


    $file = 'data/checkusers.json';
    arrayToJSON(getUsers(), $file);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/icon.png">
    <title>Hanouti : Register</title>
</head>
<body>
    <center>
        <div class="wrapper">
            <div class="container">
                <img src="images/hanouti.png" alt="">
                <p>Do you already have an account? <a href="login.php">Login.</a></p>
            </div>
            <div class="login-form">
                <h3>Register</h3>
                <form action="controllers/adduser.php" method="post">
                    <?php if(isset($_GET['Erreur'])){ ?>
                        <div class="erreur-box">
                            <p class="erreur"><strong>Erreur: </strong><?=$_GET['Erreur'] ?> </p>
                        </div>
                    <?php } ?>
                    <div class="forum-input">
                        <ion-icon name="sparkles-outline"></ion-icon>
                        <input type="text" name="name" id="name" placeholder="Name*">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="user" id="user" placeholder="User*">
                    </div>
                    <p id="u-v" class="erreur"></p>
                    <div class="forum-input">
                        <ion-icon name="at-outline"></ion-icon>
                        <input type="email" name="email" id="email" placeholder="Email*">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="pass" placeholder="Password*">
                    </div>
                    <div class="forum-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="cpassword" id="cpass" placeholder="Confirm Password*">
                    </div>
                    <input name="register" type="submit" value="Register">
                </form>
            </div>
        </div>
    </center>
    



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="data/checkuser.js"></script>
</body>
</html>