<?php

class BddManager {
    public $connexion;

    public function __CONSTRUCT(){
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

    // function login($username, $upassword){
    //     $pdo = $connexion->prepare('SELECT * FROM user WHERE username=:username AND upassword=:upassword');
    //     $pdo->execute(array(
    //         'username'=>$username,
    //         'upassword'=>$upassword
    //     ));
    //     $user = $pdo->fetchAll(PDO::FETCH_ASSOC);
    //     return $user;
    // }

    function checkUserLogin($username, $upassword){
        $object = $this->connexion->prepare('SELECT id, username, telephone, email FROM user WHERE username=:username AND upassword=:upassword');
        $object->execute(array(
            'username' => $username,
            'upassword' => $upassword
        ));
        $passwordverify = $object->fetchAll(PDO::FETCH_ASSOC);
        return $passwordverify;
    }

    function getUserById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM user WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $user = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    function getAnnonceById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM annonces WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $annonce = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $annonce;
    }

    public function getAllAnnonces(){
        $this->getConnexion();

        $object = $this->connexion->prepare('SELECT * FROM annonces');
        $object->execute(array());
        $annonces = $object->fetchAll(PDO::FETCH_ASSOC);

        foreach($annonces as $index){
            $tabAnnonces[]=$index;
        }
        return $tabAnnonces;
    }
}

?>