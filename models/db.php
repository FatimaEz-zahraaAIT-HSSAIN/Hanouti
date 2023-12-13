<?php

function connect(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=hanouti', 'root', '');
        return $db;
        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }

}
$db=connect();

function addUser($name,$user,$email,$password){
    global $db;
        $req=$db->prepare("INSERT INTO users (`id`, `name`, `user`, `email`, `password`) VALUES (NULL, :name, :user, :email, :password) ");
        $req->execute(["name"=>$name, "user"=>$user,"email"=>$email,"password"=>$password]);
}

function getUserByUsername($user){
    global $db;
        $req=$db->prepare("SELECT * FROM users WHERE user=:user" );
        $req->execute(["user"=>$user]);
        $user=$req->fetch(PDO::FETCH_OBJ);

        return (array)$user;
}

function getUsers(){
    global $db;
        $req=$db->prepare("SELECT user FROM users " );
        $req->execute();
        $users=$req->fetchAll(PDO::FETCH_OBJ);

        return (array)$users;
}

function addProduct($image, $title, $owner, $price, $SOLD, $pass, $hash){
    global $db;
    if(password_verify($pass, $hash)){
        $req=$db->prepare("INSERT INTO produits (`id`, `image`, `title`, `owner`, `price`, `SOLD`) VALUES (NULL, :image, :title, :owner, :price, :SOLD) ");
        $req->execute(["image"=>$image, "title"=>$title,"owner"=>$owner,"price"=>$price,"SOLD"=>$SOLD]);
    }      
}

function getProducts(){
    global $db;
    $req=$db->prepare("SELECT p.* , u.name
                        FROM produits as p
                        INNER JOIN users as u
                        WHERE p.owner = u.id");

    $req->execute();
    $prods=$req->fetchAll(PDO::FETCH_OBJ);
return $prods;
}

function getMyProds($user_id){
    global $db;
    $req=$db->prepare("SELECT p.* 
                        FROM produits as p
                        WHERE p.owner =:user_id");

    $req->execute(["user_id"=>$user_id]);
    $prods=$req->fetchAll(PDO::FETCH_OBJ);
return (array)$prods;
}

function getProductById($id){
    global $db;
    $req=$db->prepare("SELECT * FROM produits WHERE id=:id ");
    $req->execute(["id"=>$id]);
    //$prods=$req->fetchAll();
    $prods=$req->fetch(PDO::FETCH_OBJ);
return (array)$prods;
}

function ModProduct($id){
    global $db;
    $req=$db->prepare("UPDATE produits SET  WHERE id=:id ");
    $req->execute(["id"=>$id]);

}

function arrayToJSON($array, $jsonFile) {
    if(sizeof($array) > 0){
        $json_data = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $json_data);
    }  
}

function jsonToArray($jsonFile) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    return (array)$data;
}

?>