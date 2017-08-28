<?php

if(isset($_POST["username"]) && isset($_POST["upassword"]) && isset($_POST["telephone"]) && isset($_POST["email"])){
    $username = $_POST["username"];
    $upassword = $_POST["upassword"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    $user = new User();
    $user->setUsername($username);
    $user->setPassword($upassword);
    $user->setTelephone($telephone);
    $user->setEmail($email);

    $bddmanager = new BddManager();
    $bddmanager->register($user);

    Flight::redirect('/accueil');
}

?>