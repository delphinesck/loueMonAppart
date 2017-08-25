<?php

$bddmanager = new BddManager();
$favori = $bddmanager->getFavorisByAnnonceIdAndUserId($id_annonce, $_SESSION['user']['id']);

if($favori != false){
    $bddmanager->supprFavori($favori);
}

?>