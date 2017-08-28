<?php
$paramserror = "";

if(isset($_POST["note"]) && isset($_POST["commentaire"])){
    if(strlen($_POST["note"]) == 0 || strlen($_POST["commentaire"]) == 0){
        $paramserror .= "&incomplet=1";

        if(!empty($paramserror)){
            Flight::redirect('/nouvelle_annonce?'.$paramserror); 
        }
    }

    else {
        $user_id = $_SESSION['user']['id'];
        
        $note = $_POST["note"];
        $commentaire = $_POST["commentaire"];
        $annonce_id = $_POST["annonce_id"];

        $avis = new Avis();
        $avis->setNote($note);
        $avis->setCommentaire($commentaire);
        $avis->setUser_id($user_id);
        $avis->setAnnonce_id($annonce_id);

        $bdd = new BddManager();
        $bdd->postAvis($avis);
    }
}

?>