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
    }

    function login($username, $upassword){
        $object = $this->connexion->prepare('SELECT id, username, telephone, email FROM user WHERE username=:username AND upassword=:upassword');
        $object->execute(array(
            'username' => $username,
            'upassword' => $upassword
        ));
        $verify = $object->fetch(PDO::FETCH_ASSOC);
        return $verify;
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
        $annonce = $pdo->fetch(PDO::FETCH_ASSOC);
        return $annonce;
    }

    public function getAllAnnonces(){
        $object = $this->connexion->prepare('SELECT * FROM annonces');
        $object->execute(array());
        $annonces = $object->fetchAll(PDO::FETCH_ASSOC);

        $tabAnnonces = [];
        foreach($annonces as $data){
            $tabAnnonces[] = new Annonce($data);
        }
        return $tabAnnonces;
    }

    public function getAnnoncesByUserId($user_id){
        $object = $this->connexion->prepare('SELECT * FROM annonces WHERE user_id=:user_id');
        $object->execute(array(
            'user_id' => $user_id
        ));
        $annonces = $object->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($annonces)){
            $tabAnnonces = [];
            foreach($annonces as $data){
                $tabAnnonces[] = new Annonce($data);
            }
            return $tabAnnonces;
        }
    }

    public function postAnnonce(Annonce $annonce){
        $query = "INSERT INTO annonces SET titre=:titre, description=:description, ville=:ville, tarif=:tarif, propriete=:propriete, superficie=:superficie, 
        dispo_debut=:dispo_debut, dispo_fin=:dispo_fin, photo1=:photo1, photo2=:photo2, photo3=:photo3, datecreate=NOW(), user_id=:user_id";
        $pdo = $this->connexion->prepare($query);
        $pdo->execute(array(
            'titre' => $annonce->getTitre(),
            'description' => $annonce->getDescription(),
            'ville' => $annonce->getVille(),
            'tarif' => $annonce->getTarif(),
            'propriete' => $annonce->getPropriete(),
            'superficie' => $annonce->getSuperficie(),
            'dispo_debut' => $annonce->getDispo_debut(),
            'dispo_fin' => $annonce->getDispo_fin(),
            'photo1' => $annonce->getPhoto1(),
            'photo2' => $annonce->getPhoto2(),
            'photo3' => $annonce->getPhoto3(),
            'user_id' => $annonce->getUser_id()
        ));
        return $pdo->rowCount();
    }

    public function postAvis(Avis $avis){
        $query = "INSERT INTO avis SET note=:note, commentaire=:commentaire, datecreate=NOW(), user_id=:user_id, annonce_id=:annonce_id";
        $pdo = $this->connexion->prepare($query);
        $pdo->execute(array(
            'note' => $avis->getNote(),
            'commentaire' => $avis->getCommentaire(),
            'user_id' => $avis->getUser_id(),
            'annonce_id' => $avis->getAnnonce_id()
        ));
        return $pdo->rowCount();
    }

    public function getAvisByAnnonceId($annonce_id){
        $object = $this->connexion->prepare('SELECT * FROM avis WHERE annonce_id=:annonce_id');
        $object->execute(array(
            'annonce_id' => $annonce_id
        ));
        $allAvis = $object->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($allAvis)){
            foreach ($allAvis as $value) {
                $tabAvis[] = $value;
            }
            return $tabAvis;
        }
    }
}

?>