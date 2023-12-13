<?php 
    session_start();
    include_once '../models/db.php';

    if(isset($_POST['register'])){
        
        if(empty($_POST['name'])){
            header( "Location: ../register.php?Erreur=Name field cannot be empty.");
            exit();
        }else if(empty($_POST['email'])){
            header( "Location: ../register.php?Erreur=E-mail field cannot be empty.");
            exit();
        }else if(empty($_POST['user'])){
            header( "Location: ../register.php?Erreur=User field cannot be empty.");
            exit();
        }else if(empty($_POST['password'])){
            header( "Location: ../register.php?Erreur=Password field cannot be empty.");
            exit();
        }else if(empty($_POST['cpassword'])){
            header( "Location: ../register.php?Erreur=Confirm Password field cannot be empty.");
            exit();
        }

        if($_POST['password'] === $_POST['cpassword']){
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                addUser($_POST['name'],$_POST['user'], $_POST['email'], $pass_hash);

                header( "Location: ../login.php");
                exit();
            }else{
                header( "Location:../register.php?Erreur=Password and Confirm Password aren't identical");
                exit();
            }
            
    }
?>