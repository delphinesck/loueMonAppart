<?php echo $header ?>

<h2>Profil</h2>

<b>Nom d'utilisateur : </b><?php echo($_SESSION['user']['username']); ?><br />

<b>N° de téléphone : </b><?php echo($_SESSION['user']['telephone']); ?><br />

<b>Email : </b><?php echo($_SESSION['user']['email']); ?>

<br /><br />

<a href="nouvelle_annonce"><button>Créer une annonce</button></a><br />

<h2>Vos annonces</h2>

<?php
$bddmanager = new BddManager();
$annonces = $bddmanager->getAnnoncesByUserId(3);
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