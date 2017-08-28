<?php echo $header ?>

<main>
    <div class="box_principale">
        <?php 
            if(empty($_SESSION)){
                echo "Vous n'êtes pas connecté.";
            }

            else{
                echo "<h2>Profil</h2>
                <b>Nom d'utilisateur : </b>" . $_SESSION['user']['username'] . "<br />
                <b>N° de téléphone : </b>" . $_SESSION['user']['telephone'] . "<br />
                <b>Email : </b>" . $_SESSION['user']['email'] . "<br /><br />


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
                        <b>Ville : </b>" . $annonce->getVille() . " / <b>Tarif : </b>" . $annonce->getTarif() . "€ /jour<br />
                            
                        <a href='/WWW/TP_loueMonAppart/modifier_annonce/" . $annonce->getId() . "'><button>Modifier</button></a>
                            
                        <form action='/WWW/TP_loueMonAppart/supprAnnonceService/" . $annonce->getId() . "' method='post'>
                            <input type='submit' value='Supprimer' />
                        </form></div>";
                    }
                }
            }

            echo "<br /><a href='nouvelle_annonce'><button>Créer une annonce</button></a><br /><br />



            <h2>Vos favoris</h2>";
            $bddmanager = new BddManager();
            $favoris = $bddmanager->getFavorisByUserId($_SESSION['user']['id']);

            if(empty($favoris)){
                echo "Vous n'avez aucun favoris.";
            }

            else{
                foreach($favoris as $favori){
                    $annonceId = $favori->getAnnonce_id();
                    $annonceFav = $bddmanager->getAnnonceById($annonceId);

                    echo "<div class='listeannonce_box'>
                    <h4><a href='annonce/" . $annonceFav->getId() . "'>" . $annonceFav->getTitre() . "</a></h4>
                    <p>"
                    . $annonceFav->getDescription() .
                    "</p>
                    <b>Ville : </b>" . $annonceFav->getVille() . " / <b>Tarif : </b>" . $annonceFav->getTarif() . "€ /jour<br />
                        
                    <form action='/WWW/TP_loueMonAppart/supprFavoriService/" . $annonceFav->getId() . "' method='post'>
                        <input type='submit' value='Supprimer des favoris' />
                    </form></div>";
                }
            }



            echo "<br /><h2>Vos réservations</h2>";
            $annoncesreservees = $bddmanager->getAnnoncesByLocataireId($_SESSION['user']['id']);

                if(empty($annoncesreservees)){
                    echo "Vous n'avez réservé aucune location.";
                }

                else{
                    foreach($annoncesreservees as $annoncereservee){
                        echo "Vous avez réservé la location \"<a href='annonce/" . $annoncereservee->getId() . "'>" . $annoncereservee->getTitre() . "</a>\" du " . $annoncereservee->getDispo_debut() . " au " . $annoncereservee->getDispo_fin() . ".<br />";
                    }
                }



            echo "<br /><h2>Vos locations réservées</h2>";

                if(empty($annonces)){
                    echo "Vous n'avez mis aucun bien en location.";
                }

                elseif($annonce->getStatut() == false){
                    echo "Aucun de vos biens n'a encore été réservé.";
                }

                elseif($annonce->getStatut() == true){
                    foreach($annonces as $annonce){
                        $locataire = $bddmanager->getUserById($annonce->getLocataire_Id());
                        echo "Votre location \"<a href='annonce/" . $annonce->getId() . "'>" . $annonce->getTitre() . "</a>\" a été réservée par " . $locataire->getUsername() . ".<br />";
                    }
                }
        ?>
        <br />
    </div>
</main>

<?php echo $footer ?>