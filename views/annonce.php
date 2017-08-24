<?php echo $header ?>

<?php
$bddmanager = new BddManager();
$annonce = $bddmanager->getAnnonceById($id_annonce);
?>

<h2>Annonce #<?= $annonce['id']; ?>
<?php
$bddmanager = new BddManager();
$user = $bddmanager->getUserById($annonce["user_id"]);
echo " par " . $user[0]["username"]
?></h2>

<h3>
<b>Titre : </b><?= $annonce['titre']; ?> 
</h3>
<p>
<b>Description : </b><br />
<?= $annonce['description']; ?>
</p>
<b>Ville : </b><?= $annonce['ville']; ?><br />
<b>Tarif : </b><?= $annonce['tarif']; ?>€ /jour<br />
<b>Type de propriété : </b><?= $annonce['propriete']; ?><br />
<b>Superficie : </b><?= $annonce['superficie']; ?>m<sup>2</sup><br />
<b>Début de disponibilité : </b><?= $annonce['dispo_debut']; ?><br />
<b>Fin de disponiblité : </b><?= $annonce['dispo_fin']; ?><br />
<?php
if(!empty($annonce["photo1"])){
    echo "<b>Photos : </b><br />
    <img src='" . $annonce['photo1'] . "'><br />";
}
?>

<?php
if(!empty($annonce["photo2"])){
    echo "<img src='" . $annonce['photo2'] . "'><br />";
}
?>

<?php
if(!empty($annonce["photo3"])){
    echo "<img src='" . $annonce['photo3'] . "'><br />";
}
?><br />

<?= "Posté le " . $annonce['datecreate'] ?><br />

<hr>

<h3>Avis</h3>
<?php 
if(empty($_SESSION)){
    echo "Vous devez être connecté pour donner votre avis.";
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
    <input type='hidden' value='" . $annonce['id'] . "' name='annonce_id'>
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
        echo $user[0]["username"] . $avis["note"] . "</h4>
        <p>" . $avis["commentaire"] . "</p>
        Posté le " . $avis["datecreate"] .
        "</div><br />";
    }
}
?>

<?php echo $footer ?>