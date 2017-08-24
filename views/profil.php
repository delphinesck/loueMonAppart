<?php echo $header ?>

<?php 
if(empty($_SESSION)){
    echo "Vous n'êtes pas connecté.";
}

else{

echo "<h2>Profil</h2>

<b>Nom d'utilisateur : </b>" . $_SESSION['user']['username'] . "<br />

<b>N° de téléphone : </b>" . $_SESSION['user']['telephone'] . "<br />

<b>Email : </b>" . $_SESSION['user']['email'] .

"<br /><br />

<a href='nouvelle_annonce'><button>Créer une annonce</button></a><br />

<h2>Vos annonces</h2>";

$bddmanager = new BddManager();
$annonces = $bddmanager->getAnnoncesByUserId($_SESSION['user']['id']);

    if(empty($annonces)){
        echo "Vous n'avez posté aucune annonce.";
    }

    else{
        foreach($annonces as $annonce){
            echo "<div class='listeannonce_box'>
            <h4><a href='annonce/" . $annonce->getId() . "'>" . $annonce->getTitre() . "</a></h4>
            <p>"
            . $annonce->getDescription() .
            "</p>
            <b>Ville : </b>" . $annonce->getVille() . "/ <b>Tarif : </b>" . $annonce->getTarif() . "€ /jour
            </div>";
        }
    }
}
?>

<?php echo $footer ?>