<?php
    session_start();

    include_once '../models/db.php';

    if(!empty($_POST['addproduct'])){

        $allowedFilesTypes = array("png","jpg","jpeg");
        $folder = "../images/upload/";
        if(isset($_FILES['product-image']) ){

                
            $size = $_FILES['product-image']['size'];
            $tmpname = $_FILES['product-image']['tmp_name'];
            $error = $_FILES['product-image']['error'];

            $explodeName = explode(".", $_FILES["product-image"]["name"]);
            $FileType = end($explodeName);

            if($error === 0){

                if($size > 1250000){
                    header("Location: ../ajoutProduit.php?Erreur= The image is too large");
                }
                if( in_array($FileType, $allowedFilesTypes) ) {
                    $pname= str_replace(' ', '', $_POST['product-name']);
                    $pname= str_replace('|', '', $pname);
                    $pname= str_replace(',', '', $pname);
                    $pname= str_replace('"', '', $pname);
                    $pname= str_replace('-', '', $pname);
                    $pname= str_replace('/', '', $pname);
                    
                    $_FILES["product-image"]["name"] = $_SESSION['user']['user'].'_'.$pname.'_'.rand(0,1000000).'.'.$FileType;

                    move_uploaded_file($tmpname , $folder.$_FILES["product-image"]["name"]);
                }else{
                    header("Location:  ../ajoutProduit.php?Erreur = File type isn't allowed (Use png, jpg or jpeg)");
                }

            }
        }
        addProduct('upload/'.$_FILES["product-image"]["name"] , $_POST['product-name'], $_POST['owner'], $_POST['price'], $_POST['sold'], $_POST['password'], $_SESSION['user']['password']);

        header("Location:  ../ajoutProduit.php");
}

?>