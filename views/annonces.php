<?php echo $header ?>

<h2>Annonces</h2>

<a href="nouvelle_annonce"><button>Créer une annonce</button></a>

<?php
$bddmanager = new BddManager();
$annonces = $bddmanager->getAllAnnonces();
foreach($annonces as $annonce){
?>
<div class="listeannonce_box">
<h4>
<?= $annonce->getTitre(); ?> 
</h4>
<p>
<?=$annonce->getDescription(); ?>
</p>
<b>Ville : </b><?=$annonce->getVille(); ?> / <b>Tarif : </b><?=$annonce->getTarif(); ?>€ /jour
</div>
<?php
}
?>

<?php echo $footer ?>