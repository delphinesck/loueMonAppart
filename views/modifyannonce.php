<?php echo $header ?>

<main>
    <div class="box_principale">
        <?php 
            $bddmanager = new BddManager();
            $annonce = $bddmanager->getAnnonceById($id_annonce);
            $user = $bddmanager->getUserById($annonce->getUser_id());

            if($_SESSION['user']['id'] == $user->getId()){
                echo "<h2>Modifier votre annonce</h2>
                    <form action='/WWW/TP_loueMonAppart/modifyAnnonceService/".$id_annonce."' method='post'>
                    <label>Titre</label>
                    <input type='text' name='titre' value='" . $annonce->getTitre() . "' class='inputs' />
                    <label>Description</label>
                    <textarea placeholder='Décrivez votre location ici...' name='description' class='descri' >" . $annonce->getDescription() . "</textarea>
                    <div class='labelnomodify'><label>Ville : </label> " . $annonce->getVille() . "</div>
                    <label>Tarif</label><br />
                    <input type='number' name='tarif' value='" . $annonce->getTarif() . "' class='inputs inputinline' /> € /jour
                    <div class='labelnomodify'><label>Type de propriété : </label> " . $annonce->getPropriete() . "</div>
                    <div class='labelnomodify'><label>Superficie : </label> " . $annonce->getSuperficie() . " m²</div>
                    <label>Début de disponibilité</label>
                    <input type='date' name='dispo_debut' value='" . $annonce->getDispo_debut() . "' class='inputs date' />
                    <label>Fin de disponibilité</label>
                    <input type='date' name='dispo_fin' value='" . $annonce->getDispo_fin() . "' class='inputs date' />

                    <br /><br />

                    <h3>Photos</h3>
                    <label>Photo 1</label>
                    <input type='text' name='photo1' value='" . $annonce->getPhoto1() . "' class='inputs' />
                    <label>Photo 2</label>
                    <input type='text' name='photo2' value='" . $annonce->getPhoto2() . "' class='inputs' />
                    <label>Photo 3</label>
                    <input type='text' name='photo3' value='" . $annonce->getPhoto3() . "' class='inputs' />

                    <input type='submit' value='Modifier' class='bouton2' />
                </form>";
            }

            else{
                echo "Vous ne disposez pas des droits pour modifier cette annonce.";    
            }
        ?>
    </div>
</main>

<?php echo $footer ?>