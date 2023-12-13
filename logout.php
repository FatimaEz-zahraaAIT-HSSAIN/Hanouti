<?php
    session_start();

    $keys = array_keys($_SESSION);
    foreach ($keys as $key){
        unset($_SESSION[$key]);
    }

    header('Location: login.php');
?>