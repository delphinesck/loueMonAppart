<?php

$locataire_id = $_SESSION['user']['id'];

$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
$annonce = new Annonce();
$annonce->setId($id_annonce);
$annonce->setStatut(true);
$annonce->setLocataire_id($locataire_id);

$bddmanager->reservation($annonce);

?>