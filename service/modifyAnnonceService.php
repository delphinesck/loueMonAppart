<?php

$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
$annonce = new Annonce();
$annonce->setId($id_annonce);
$annonce->setTitre($_POST["titre"]);
$annonce->setDescription($_POST["description"]);
$annonce->setTarif($_POST["tarif"]);
$annonce->setDispo_debut($_POST['dispo_debut']);
$annonce->setDispo_fin($_POST['dispo_fin']);
$annonce->setPhoto1($_POST['photo1']);
$annonce->setPhoto2($_POST['photo2']);
$annonce->setPhoto3($_POST['photo3']);

$bddmanager->modifyAnnonce($annonce);

?>