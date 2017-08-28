<?php echo $header ?>

<?php 
    $bddmanager = new BddManager();
    $annonce = $bddmanager->getAnnonceById($id_annonce);
    $user = $bddmanager->getUserById($annonce->getUser_id());

    if($_SESSION['user']['id'] == $user->getId()){
        echo "<h2>Modifier votre annonce</h2>
            <form action='/WWW/TP_loueMonAppart/modifyAnnonceService/".$id_annonce."' method='post'>
            <label>Titre : </label>
            <input type='text' name='titre' value='" . $annonce->getTitre() . "'/><br />
            <label>Description : </label><br />
            <textarea placeholder='Décrivez votre location ici...' name='description' rows='5' cols='60'>" . $annonce->getDescription() . "</textarea><br />
            <label>Ville : </label> " . $annonce->getVille() . "<br />
            <label>Tarif : </label>
            <input type='number' name='tarif' value='" . $annonce->getTarif() . "' /> € /jour<br />
            <label>Type de propriété : </label> " . $annonce->getPropriete() . "<br />
            <label>Superficie : </label> " . $annonce->getSuperficie() . " m<sup>2</sup><br />
            <label>Début de disponibilité : </label>
            <input type='date' name='dispo_debut' value='" . $annonce->getDispo_debut() . "' /><br />
            <label>Fin de disponibilité : </label>
            <input type='date' name='dispo_fin' value='" . $annonce->getDispo_fin() . "' /><br />

            <h4>Photos</h4>
            <label>Photo 1 : </label>
            <input type='text' name='photo1' value='" . $annonce->getPhoto1() . "' /><br />
            <label>Photo 2 : </label>
            <input type='text' name='photo2' value='" . $annonce->getPhoto2() . "' /><br />
            <label>Photo 3 : </label>
            <input type='text' name='photo3' value='" . $annonce->getPhoto3() . "' /><br /><br />

            <input type='submit' value='Modifier' />
        </form>";
    }

    else{
        echo "Vous ne disposez pas des droits pour modifier cette annonce.";    
    }
?>

<?php echo $footer ?>