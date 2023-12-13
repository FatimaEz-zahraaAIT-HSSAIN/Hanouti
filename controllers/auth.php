<?php
    session_start();
    include_once "../models/db.php";


    if(isset($_POST['login'])){

        if(empty($_POST['user']) && empty($_POST['password'])){
            header( "Location:../login.php?Erreur=Fields cannot be empty.");
            exit();
        }else if(empty($_POST['user'])){
            header( "Location:../login.php?Erreur=E-mail field cannot be empty.");
            exit();
        }else if(empty($_POST['password'])){
            header( "Location:../login.php?Erreur=Password field cannot be empty.");
            exit();
        }else{
            $user= getUserByUsername($_POST['user']);

            if(isset($user) && password_verify($_POST['password'], $user['password'])){
                $_SESSION['user']=$user;

                header( "Location:../index.php");
                exit();
            }else{
                header( "Location:../login.php?Erreur=Password/E-mail is incorrect.");
                exit();
            }
        }
    }


?>