<?php

if(isset($_POST["username"]) && isset($_POST["upassword"]) && isset($_POST["telephone"]) && isset($_POST["email"])){
    if(strlen($_POST["username"]) == 0 || strlen($_POST["upassword"]) == 0 || strlen($_POST["telephone"]) == 0 || strlen($_POST["email"]) == 0){
        header("Location: ../register?message='Champs incomplets'");
    }
    else {
        $username = $_POST["username"];
        $upassword = $_POST["upassword"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($upassword);
        $user->setTelephone($telephone);
        $user->setEmail($email);
        $bddmanager = new BddManager("", "", "", "");
        $bddmanager->register($user);

        var_dump($user);
    }
}

?>