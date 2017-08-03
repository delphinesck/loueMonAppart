<?php

class BddManager {
    public $connexion;

    public function __CONSTRUCT($connexion){
        $this->connexion = Connexion::getConnexion();
    }

    public function register(User $user){
        $query = "INSERT INTO user SET username=:username, upassword=:upassword, telephone=:telephone, email=:email";
        $pdo = $this->connexion->prepare($query);
        $pdo->execute(array(
            'username' => $user->getUsername(),
            'upassword' => $user->getPassword(),
            'telephone' => $user->getTelephone(),
            'email' => $user->getEmail()
        ));
        return $pdo->rowCount();
        //return $pdo->lastInsertId();
    }

    public function saveUser(User $user){
        if(empty($user->getId()) == true){
            $this->register($user);
        }
        else{
            //$this->update($user);
        }
    }
}

?>