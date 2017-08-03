<?php

class loginService {
    private $params;
    private $error;
    private $user;

    public function getParams(){
        return $this->params;
    }

    public function setParams($params){
        $this->params = $params;
    }

    public function getError(){
        return $this->error;
    }

    public function setError($error){
        $this->error = $error;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function launchControls(){
        if(empty($this->params['username'])){
            $this->error['username'] = 'Nom utilisateur manquant';
        }

        if(empty($this->params['upassword'])){
            $this->error['upassword'] = 'Mot de passe manquant';
        }

        if(empty($this->error) == false){
            return $this->error;
        }

        $this->user = $this->checkUsernamePassword();

        if(empty($this->user)){
            $this->error['identifiants'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            return $this->error;
        }

        else{
            return $this->user;
        }
    }

    public function checkUsernamePassword(){
        $username = $this->params['username'];
        $upassword = $this->params['upassword'];

        $connexion = new PDO("mysql:host=localhost;dbname=blog2;charset=UTF8", 'root', 'root');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $object = $connexion->prepare('SELECT id, username FROM user WHERE username=:username AND upassword=:upassword');
        $object->execute(array(
            'upassword' => $upassword,
            'username' => $username
        ));
        $user = $object->fetchAll(PDO::FETCH_ASSOC);
        if(empty($user) == false){
            return $user;
        }
        return false;
    }
}

?>