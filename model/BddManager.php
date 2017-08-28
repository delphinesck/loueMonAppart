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

    public function login($username, $upassword){
        $object = $this->connexion->prepare('SELECT id, username, telephone, email FROM user WHERE username=:username AND upassword=:upassword');
        $object->execute(array(
            'username' => $username,
            'upassword' => $upassword
        ));
        $verify = $object->fetch(PDO::FETCH_ASSOC);
        return $verify;
    }

    public function getUserById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM user WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $user = $pdo->fetch(PDO::FETCH_ASSOC);
        return new User($user);
    }

    public function postAnnonce(Annonce $annonce){
        $query = "INSERT INTO annonces SET titre=:titre, description=:description, ville=:ville, tarif=:tarif, propriete=:propriete, superficie=:superficie, dispo_debut=:dispo_debut, dispo_fin=:dispo_fin, photo1=:photo1, photo2=:photo2, photo3=:photo3, datecreate=NOW(), user_id=:user_id";
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

    public function modifyAnnonce(Annonce $annonce){
        $prepared = $this->connexion->prepare("UPDATE annonces SET titre=:titre, description=:description, tarif=:tarif, dispo_debut=:dispo_debut, dispo_fin=:dispo_fin, photo1=:photo1, photo2=:photo2, photo3=:photo3 WHERE id=:id");
        $prepared->execute(array(
            'titre' => $annonce->getTitre(),
            'description' => $annonce->getDescription(),
            'tarif' => $annonce->getTarif(),
            'dispo_debut' => $annonce->getDispo_debut(),
            'dispo_fin' => $annonce->getDispo_fin(),
            'photo1' => $annonce->getPhoto1(),
            'photo2' => $annonce->getPhoto2(),
            'photo3' => $annonce->getPhoto3(),
            'id' => $annonce->getId()
        ));
    }

    public function supprAnnonce(Annonce $annonce){
        $prepared = $this->connexion->prepare("DELETE FROM annonces WHERE id=:id");
        $prepared->execute(array(
            'id' => $annonce->getId()
        ));
    }

    public function getAnnonceById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM annonces WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $annonce = $pdo->fetch(PDO::FETCH_ASSOC);

        return new Annonce($annonce);
    }

    public function getAnnoncesById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM annonces WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $annonce = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $tabAnnonces = [];
        foreach($annonces as $data){
            $tabAnnonces[] = new Annonce($data);
        }
        return $tabAnnonces;
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

    public function getAnnoncesByLocataireId($locataire_id){
        $object = $this->connexion->prepare('SELECT * FROM annonces WHERE locataire_id=:locataire_id');
        $object->execute(array(
            'locataire_id' => $locataire_id
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

    public function reservation(Annonce $annonce){
        $prepared = $this->connexion->prepare("UPDATE annonces SET statut=:statut, locataire_id=:locataire_id WHERE id=:id");
        $prepared->execute(array(
            'statut' => $annonce->getStatut(),
            'locataire_id' => $annonce->getLocataire_id(),
            'id' => $annonce->getId()
        ));
    }

    public function ajoutFavori(Favori $favori){
        $prepared = $this->connexion->prepare("INSERT INTO favoris SET user_id=:user_id, annonce_id=:annonce_id");
        $prepared->execute(array(
            'user_id' => $favori->getUser_id(),
            'annonce_id' => $favori->getAnnonce_id()
        ));
    }

    public function supprFavori(Favori $favori){
        $prepared = $this->connexion->prepare("DELETE FROM favoris WHERE id=:id");
        $prepared->execute(array(
            'id' => $favori->getId()
        ));
    }

    public function getFavoriById($id){
        $pdo = $this->connexion->prepare('SELECT * FROM favoris WHERE id=:id');
        $pdo->execute(array(
            'id'=>$id
        ));
        $favori = $pdo->fetch(PDO::FETCH_ASSOC);

        return new Favori($favori);
    }

    public function getFavorisByUserId($user_id){
        $object = $this->connexion->prepare('SELECT * FROM favoris WHERE user_id=:user_id');
        $object->execute(array(
            'user_id' => $user_id
        ));
        $favoris = $object->fetchAll(PDO::FETCH_ASSOC);

        $tabFavoris = [];
        if(!empty($favoris)){
            foreach($favoris as $data){
                $tabFavoris[] = new Favori($data);
            }
        }
        return $tabFavoris;
    }

    public function getFavorisByAnnonceIdAndUserId($annonce_id, $user_id){
        $object = $this->connexion->prepare('SELECT * FROM favoris WHERE annonce_id=:annonce_id AND user_id=:user_id');
        $object->execute(array(
            'annonce_id' => $annonce_id,
            'user_id' => $user_id
        ));

        $favoridata = $object->fetch(PDO::FETCH_ASSOC);
        if(!empty($favoridata)){
            return new Favori($favoridata);
        }
        else return false;

    }
}

?>