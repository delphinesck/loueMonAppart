<?php

$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
$annonce = new Annonce();
$annonce->setId($id_annonce);

$bddmanager->supprAnnonce($annonce);

?>