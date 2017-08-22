<?php
$paramserror = "";

if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["ville"]) && isset($_POST["tarif"]) && isset($_POST["propriete"]) && isset($_POST["superficie"]) 
&& isset($_POST["dispo_debut"]) && isset($_POST["dispo_fin"]) && isset($_POST["photo1"])){
    if(strlen($_POST["titre"]) == 0 || strlen($_POST["description"]) == 0 || strlen($_POST["ville"]) == 0 || strlen($_POST["tarif"]) == 0 || strlen($_POST["propriete"]) == 0
     || strlen($_POST["superficie"]) == 0 || strlen($_POST["dispo_debut"]) == 0 || strlen($_POST["dispo_fin"]) == 0 || strlen($_POST["photo1"]) == 0){
        $paramserror .= "&incomplet=1";

        if(!empty($paramserror)){
            Flight::redirect('/nouvelle_annonce?'.$paramserror); 
        }
    }

    else {
        $user_id = $_SESSION['user']['id'];

        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $ville = $_POST["ville"];
        $tarif = $_POST["tarif"];
        $propriete = $_POST["propriete"];
        $superficie = $_POST["superficie"];
        $dispo_debut = $_POST["dispo_debut"];
        $dispo_fin = $_POST["dispo_fin"];
        $photo1 = $_POST["photo1"];
        $photo2 = $_POST["photo2"];
        $photo3 = $_POST["photo3"];

        $annonce = new Annonce();
        $annonce->setTitre($titre);
        $annonce->setDescription($description);
        $annonce->setVille($ville);
        $annonce->setTarif($tarif);
        $annonce->setPropriete($propriete);
        $annonce->setSuperficie($superficie);
        $annonce->setDispo_debut($dispo_debut);
        $annonce->setDispo_fin($dispo_fin);
        $annonce->setPhoto1($photo1);
        $annonce->setPhoto2($photo2);
        $annonce->setPhoto3($photo3);
        $annonce->setUser_id($user_id);

        $bddmanager = new BddManager();
        $bddmanager->postAnnonce($annonce);

        var_dump($annonce);
    }
}

?>