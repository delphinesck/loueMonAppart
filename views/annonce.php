<?php echo $header ?>

<?php
$bddmanager = new BddManager();
$annonces = $bddmanager->getAnnonceById(3);
?>

<h2>Annonce #<?= $annonces['id']; ?></h2>

<h3>
<b>Titre : </b><?= $annonces['titre']; ?> 
</h3>
<p>
<b>Description : </b><br />
<?= $annonces['description']; ?>
</p>
<b>Ville : </b><?= $annonces['ville']; ?><br />
<b>Tarif : </b><?= $annonces['tarif']; ?>€ /jour<br />
<b>Type de propriété : </b><?= $annonces['propriete']; ?><br />
<b>Superficie : </b><?= $annonces['superficie']; ?>m<sup>2</sup><br />
<b>Début de disponibilité : </b><?= $annonces['dispo_debut']; ?><br />
<b>Fin de disponiblité : </b><?= $annonces['dispo_fin']; ?><br />
<b>Photos : </b><br />
<?= "<img src='" . $annonces['photo1'] . "'>" ?><br />
<?= "<img src='" . $annonces['photo2'] . "'>" ?><br />
<?= "<img src='" . $annonces['photo3'] . "'>" ?><br />


<?php echo $footer ?>