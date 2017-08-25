<?php echo $header ?>

<?php
$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
?>

<h2>Annonce #<?= $annonce->getId(); ?>
<?php
$bddmanager = new BddManager();
$user = $bddmanager->getUserById($annonce->getUser_id());
echo " par " . $user->getUsername();
?></h2>

<?php
$favoris = $bddmanager->getFavorisByUserId($_SESSION['user']['id']);
$is_favoris = false;

if($annonce->getUser_id() != $_SESSION['user']['id']){
    foreach($favoris as $favori){
        if($favori->getAnnonce_id() == $annonce->getId()){
            $is_favoris = true;
        }
    }

    if($is_favoris == true){
        echo "<form action='/WWW/TP_loueMonAppart/supprFavoriService/" . $id_annonce . "' method='post'>
        <input type='hidden' value='" . $annonce->getId() . "' name='annonce_id'>
        <input type='submit' value='suppr ★' />
        </form>";
    }

    else{
        echo "<form action='/WWW/TP_loueMonAppart/newFavoriService/" . $id_annonce . "' method='post'>
        <input type='hidden' value='" . $annonce->getId() . "' name='annonce_id'>
        <input type='submit' value='ajout ☆' />
        </form>";
    }
}
?>

<h3>
<b>Titre : </b><?= $annonce->getTitre(); ?> 
</h3>

<p>
<b>Description : </b><br />
<?= $annonce->getDescription(); ?>
</p>
<b>Ville : </b><?= $annonce->getVille(); ?><br />
<b>Tarif : </b><?= $annonce->getTarif(); ?>€ /jour<br />
<b>Type de propriété : </b><?= $annonce->getPropriete(); ?><br />
<b>Superficie : </b><?= $annonce->getSuperficie(); ?>m<sup>2</sup><br />
<b>Début de disponibilité : </b><?= $annonce->getDispo_debut(); ?><br />
<b>Fin de disponiblité : </b><?= $annonce->getDispo_fin(); ?><br />
<?php
if(!empty($annonce->getPhoto1())){
    echo "<b>Photos : </b><br />
    <img src='" . $annonce->getPhoto1() . "'><br />";
}
?>

<?php
if(!empty($annonce->getPhoto2())){
    echo "<img src='" . $annonce->getPhoto2() . "'><br />";
}
?>

<?php
if(!empty($annonce->getPhoto3())){
    echo "<img src='" . $annonce->getPhoto3() . "'><br />";
}
?><br />

<?= "Posté le " . $annonce->getDatecreate() ?><br />

<?php
if(empty($_SESSION['user'])){
    echo "Vous devez être connecté pour pouvoir réserver un logement.";
}

elseif($_SESSION['user']['id'] == $user->getId()){
    echo "<a href='/WWW/TP_loueMonAppart/modifier_annonce/" . $annonce->getId() . "'><button>Modifier</button></a>
    <form action='/WWW/TP_loueMonAppart/supprAnnonceService/" . $annonce->getId() . "' method='post'>
        <input type='submit' value='Supprimer' />
    </form>";
}

elseif(!empty($_SESSION['user']) && $_SESSION['user']['id'] != $user->getId()){
    if($annonce->getStatut() == false){
        echo "<form action='/WWW/TP_loueMonAppart/reservationService/" . $id_annonce . "' method='post'>
        <input type='submit' value='Réserver ce logement' />
        </form>";
    }

    else{ ?>
        <div class="reserve">Ce logement est déjà réservé.</div>
<?php
    }
}
?>

<hr>

<h3>Avis</h3>
<?php 
if(empty($_SESSION)){
    echo "Vous devez être connecté pour donner votre avis.";
}

elseif($_SESSION['user']['id'] == $annonce->getUser_id()){
    echo "Vous ne pouvez pas donner d'avis sur votre propre location.";
}

elseif($_SESSION['user']['id'] != $annonce->getLocataire_id()){
    echo "Vous ne pouvez pas donner d'avis sur une location que vous n'avez pas louée.";
}

else{

echo "<form action='/WWW/TP_loueMonAppart/newAvisService/".$id_annonce."' method='post'>
    Donnez votre avis sur cette location !<br />
    <label>Notez votre séjour</label>
    <select name='note'>
        <option value='★☆☆☆☆'>★☆☆☆☆</option>
        <option value='★★☆☆☆'>★★☆☆☆</option>
        <option value='★★★☆☆'>★★★☆☆</option>
        <option value='★★★★☆'>★★★★☆</option>
        <option value='★★★★★'>★★★★★</option>
    </select><br />
    <input type='hidden' value='" . $annonce->getId() . "' name='annonce_id'>
    <textarea name='commentaire' cols='80' rows='6' placeholder='Décrivez votre expérience ici...'></textarea><br />
    <input type='submit' value='Valider' />
</form>";
}

?>

<br /><br />

<?php
$bddmanager = new BddManager();
$allAvis = $bddmanager->getAvisByAnnonceId($id_annonce);

if(empty($allAvis)){
    echo "Il n'y a aucun avis pour cette location.";
}

else{
    foreach($allAvis as $avis){
        echo "<div class='listeavis_box'>
        <h4>";
        $user = $bddmanager->getUserById($avis["user_id"]);
        echo $user->getUsername() . $avis["note"] . "</h4>
        <p>" . $avis["commentaire"] . "</p>
        Posté le " . $avis["datecreate"] .
        "</div><br />";
    }
}
?>

<?php echo $footer ?>