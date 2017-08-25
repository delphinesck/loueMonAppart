<?php

$user_id = $_SESSION['user']['id'];

$bddmanager = new BddManager();
$favori = $bddmanager->getAnnonceById($id_annonce);
$favori = new Favori();
$favori->setUser_id($user_id);
$favori->setAnnonce_id($id_annonce);

$bddmanager->ajoutFavori($favori);

?>