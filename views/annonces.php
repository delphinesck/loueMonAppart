<?php echo $header ?>

<h2>Annonces</h2>

<?php
    if(empty($_SESSION['user'])){
        echo "Vous devez être connecté pour pouvoir poster une annonce.";
    }

    else{
        echo "<a href='nouvelle_annonce'><button>Créer une annonce</button></a>";
    }
?>

<?php
    $bddmanager = new BddManager();
    $annonces = $bddmanager->getAllAnnonces();
    foreach($annonces as $annonce){
?>

<div class="listeannonce_box">
    <h4>
        <?= "<a href='annonce/" . $annonce->getId() . "'>" . $annonce->getTitre() . "</a>"; ?>
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