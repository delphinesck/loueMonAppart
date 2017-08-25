<?php

$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
$annonce = new Annonce();
$annonce->setId($id_annonce);
$annonce->setStatut(true);

$bddmanager->reservation($annonce);

?>