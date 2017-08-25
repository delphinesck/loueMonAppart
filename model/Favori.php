<?php

class Favori {
    private $id;
    private $user_id;
    private $annonce_id;

    public function __CONSTRUCT($donnees = array()) {
        $this->hydrate($donnees);
    }

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUser_id($user_id) { $this->user_id = $user_id; }
    function getUser_id() { return $this->user_id; }
    function setAnnonce_id($annonce_id) { $this->annonce_id = $annonce_id; }
    function getAnnonce_id() { return $this->annonce_id; }

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
