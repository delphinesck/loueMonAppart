<?php

class Avis {
    private $id;
    private $note;
    private $commentaire;
    private $datecreate;
    private $user_id;
    private $annonce_id;

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setNote($note) { $this->note = $note; }
    function getNote() { return $this->note; }
    function setCommentaire($commentaire) { $this->commentaire = $commentaire; }
    function getCommentaire() { return $this->commentaire; }
    function setDatecreate($datecreate) { $this->datecreate = $datecreate; }
    function getDatecreate() { return $this->datecreate; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setAnnonce_id($annonce_id) { $this->annonce_id = $annonce_id; }
    function getAnnonce_id() { return $this->annonce_id; }


    public function hydrate($donnees){
        foreach($donnees as $key => $value){
            $key = preg_replace('#_#', "", $key);
            $method = "set".ucfirst($key);

            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}
?>