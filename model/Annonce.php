<?php

class Annonce {
    private $id;
    private $titre;
    private $description;
    private $ville;
    private $tarif;
    private $propriete;
    private $superficie;
    private $dispo_debut;
    private $dispo_fin;
    private $statut;
    private $photo1;
    private $photo2;
    private $photo3;
    private $datecreate;
    private $user_id;
    private $locataire_id;

    public function __CONSTRUCT($donnees = array()) {
        $this->hydrate($donnees);
    }

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setTitre($titre) { $this->titre = $titre; }
    function getTitre() { return $this->titre; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setVille($ville) { $this->ville = $ville; }
    function getVille() { return $this->ville; }
    function setTarif($tarif) { $this->tarif = $tarif; }
    function getTarif() { return $this->tarif; }
    function setPropriete($propriete) { $this->propriete = $propriete; }
    function getPropriete() { return $this->propriete; }
    function setSuperficie($superficie) { $this->superficie = $superficie; }
    function getSuperficie() { return $this->superficie; }
    function setDispo_debut($dispo_debut) { $this->dispo_debut = $dispo_debut; }
    function getDispo_debut() { return $this->dispo_debut; }
    function setDispo_fin($dispo_fin) { $this->dispo_fin = $dispo_fin; }
    function getDispo_fin() { return $this->dispo_fin; }
    function setStatut($statut) { $this->statut = $statut; }
    function getStatut() { return $this->statut; }
    function setPhoto1($photo1) { $this->photo1 = $photo1; }
    function getPhoto1() { return $this->photo1; }
    function setPhoto2($photo2) { $this->photo2 = $photo2; }
    function getPhoto2() { return $this->photo2; }
    function setPhoto3($photo3) { $this->photo3 = $photo3; }
    function getPhoto3() { return $this->photo3; }
    function setDatecreate($datecreate) { $this->datecreate = $datecreate; }
    function getDatecreate() { return $this->datecreate; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setLocataire_id($locataire_id) { $this->locataire_id = $locataire_id; }
    function getLocataire_id() { return $this->locataire_id; }

    public function hydrate($donnees){
        foreach($donnees as $key => $value){
            //$key = preg_replace('#_#', "", $key);
            $method = "set".ucfirst($key);

            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}
?>