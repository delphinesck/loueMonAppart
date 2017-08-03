<?php

class User {
    private $id;
    private $username;
    private $upassword;
    private $telephone;
    private $email;
    private $admin;

    public function __CONSTRUCT($donnees = array()) {
        $this->hydrate($donnees);
    }

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUsername($username) { $this->username = $username; }
    function getUsername() { return $this->username; }
    function setPassword($upassword) { $this->upassword = $upassword; }
    function getPassword() { return $this->upassword; }
    function setTelephone($telephone) { $this->telephone = $telephone; }
    function getTelephone() { return $this->telephone; }
    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
    function setAdmin($admin) { $this->admin = $admin; }
    function getAdmin() { return $this->admin; }

    public function hydrate($donnees){
        foreach($donnees as $key => $value){
            $key = preg_replace('#_#', "", $key);
            $method = "set".ucfirst($key);

            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    // public function save(BddManager $bddmanager){
    //     $bddmanager->saveUser($this);
    // }
}
?>