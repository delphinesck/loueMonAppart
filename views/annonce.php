<?php echo $header ?>

<main>
    <div class="box_principale">
        <?php
            $bddmanager = new BddManager();
            $annonce = $bddmanager->getAnnonceById($id_annonce);
            $user = $bddmanager->getUserById($annonce->getUser_id());
        ?>

        <?php
            if(empty($_SESSION)){
                echo "<input type='submit' value='☆' class='favori' />";
            }

            else{
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
                        <input type='submit' value='★' class='favori' />
                        </form>";
                    }

                    else{
                        echo "<form action='/WWW/TP_loueMonAppart/newFavoriService/" . $id_annonce . "' method='post'>
                        <input type='hidden' value='" . $annonce->getId() . "' name='annonce_id'>
                        <input type='submit' value='☆' class='favori' />
                        </form>";
                    }
                }

                else{
                    echo "<input type='submit' value='☆' class='favori' />";
                }
            }
        ?>
        <div class="titreannonce">
            <h2><?= $annonce->getTitre(); ?> <i>à</i> <?= $annonce->getVille(); ?></h2>

            Proposé par <?= $user->getUsername(); ?>
        </div>

        <div class="dateannonce">
            <?= "Publié le " . $annonce->getDatecreate() ?>
        </div>

        <div class="modifsuppr">
            <?php
                if(!empty($_SESSION)){
                    if($_SESSION['user']['id'] == $user->getId()){
                        echo "<a href='/WWW/TP_loueMonAppart/modifier_annonce/" . $annonce->getId() . "'><button class='bouton5'>Modifier</button></a>
                        <form action='/WWW/TP_loueMonAppart/supprAnnonceService/" . $annonce->getId() . "' method='post'>
                            <input type='submit' value='Supprimer' class='bouton5' />
                        </form>";
                    }
                }
            ?>
        </div>

        <?php
            if($annonce->getStatut() == true){ ?>
                <div class="reserve">Ce logement est déjà réservé !</div>
        <?php
            } 
        ?>

        <?php
            if(!empty($annonce->getPhoto1()) && empty($annonce->getPhoto2()) && empty($annonce->getPhoto3())){
                echo "<div class='imageseule'>
                    <img src='" . $annonce->getPhoto1() . "' style='height: 450px; width: 700px;'>
                </div><br />";
            }
        ?>

        <?php
            if(empty($annonce->getPhoto1()) && !empty($annonce->getPhoto2()) && empty($annonce->getPhoto3())){
                echo "<div class='imageseule'>
                    <img src='" . $annonce->getPhoto2() . "' style='height: 450px; width: 700px;'>
                </div><br />";
            }
        ?>

        <?php
            if(empty($annonce->getPhoto1()) && empty($annonce->getPhoto2()) && !empty($annonce->getPhoto3())){
                echo "<div class='imageseule'>
                    <img src='" . $annonce->getPhoto3() . "' style='height: 450px; width: 700px;'>
                </div><br />";
            }
        ?>

        <?php
            if(!empty($annonce->getPhoto1()) && !empty($annonce->getPhoto2()) && empty($annonce->getPhoto3())){
                echo "<div class='imageannonce'>
                    <img src='" . $annonce->getPhoto1() . "' style='height: 350px; width: 500px;'>
                    <img src='" . $annonce->getPhoto2() . "' style='height: 350px; width: 500px;'>
                </div><br />";
            }
        ?>

        <?php
            if(!empty($annonce->getPhoto1()) && !empty($annonce->getPhoto2()) && !empty($annonce->getPhoto3())){
                echo "<div class='imageseule'>
                    <img src='" . $annonce->getPhoto1() . "' style='height: 450px; width: 700px;'>
                </div><br />";
            }
        ?>

        <?php
            if(empty($annonce->getPhoto1()) && !empty($annonce->getPhoto2()) && !empty($annonce->getPhoto3())){
                echo "<div class='imageannonce'>
                    <img src='" . $annonce->getPhoto2() . "' style='height: 350px; width: 500px;'>
                    <img src='" . $annonce->getPhoto3() . "' style='height: 350px; width: 500px;'>
                </div><br />";
            }
        ?>

        <?php
            if(!empty($annonce->getPhoto1()) && empty($annonce->getPhoto2()) && !empty($annonce->getPhoto3())){
                echo "<div class='imageannonce'>
                    <img src='" . $annonce->getPhoto1() . "' style='height: 350px; width: 500px;'>
                    <img src='" . $annonce->getPhoto3() . "' style='height: 350px; width: 500px;'>
                </div><br />";
            }
        ?>

        <br />
        <div id="descriannonce">
            <h5 class="toph5">Description de la location</h5>
            <p><?= $annonce->getDescription(); ?></p>
        </div>

        <div id="detailsannonce">
            <div class="blocdetails">
                <h5>Ville </h5><?= $annonce->getVille(); ?>
                <h5>Tarif </h5><?= $annonce->getTarif(); ?>€ /jour
            </div>
            <div class="blocdetails">
                <h5>Type de propriété </h5><?= $annonce->getPropriete(); ?>
                <h5>Superficie </h5><?= $annonce->getSuperficie(); ?>m²
            </div>
            <div class="blocdetails">
                <h5>Début de disponibilité </h5><?= $annonce->getDispo_debut(); ?>
                <h5>Fin de disponiblité </h5><?= $annonce->getDispo_fin(); ?>
            </div>
        </div>

        <?php
            if(!empty($annonce->getPhoto1()) && !empty($annonce->getPhoto2()) && !empty($annonce->getPhoto3())){
                echo "<div class='imageannonce'>
                    <img src='" . $annonce->getPhoto2() . "' style='height: 350px; width: 500px;'>
                    <img src='" . $annonce->getPhoto3() . "' style='height: 350px; width: 500px;'>
                </div><br />";
            }
        ?>

        <?php
            if(empty($_SESSION['user'])){
                echo "Vous devez être connecté pour pouvoir réserver un logement.";
            }

            elseif(!empty($_SESSION['user']) && $_SESSION['user']['id'] != $user->getId()){
                if($annonce->getStatut() == false){
                    echo "<form action='/WWW/TP_loueMonAppart/reservationService/" . $id_annonce . "' method='post'>
                    <input type='submit' value='Réserver ce logement' class='bouton2' />
                    </form>";
                }
            }
        ?>


        <h3 id="avistitre">Avis</h3>
        <?php 
            if(empty($_SESSION)){
            }

            elseif($_SESSION['user']['id'] == $annonce->getUser_id()){
                /*echo "Vous ne pouvez pas donner d'avis sur votre propre location.<br /><br />";*/
            }

            elseif($_SESSION['user']['id'] != $annonce->getLocataire_id()){
                /*echo "Vous ne pouvez pas donner d'avis sur une location que vous n'avez pas louée.";*/
            }

            else{

            echo "<form action='/WWW/TP_loueMonAppart/newAvisService/" . $id_annonce . "' method='post'>
                <label>Notez votre séjour</label>
                <select name='note'>
                    <option value='★☆☆☆☆'>★☆☆☆☆</option>
                    <option value='★★☆☆☆'>★★☆☆☆</option>
                    <option value='★★★☆☆'>★★★☆☆</option>
                    <option value='★★★★☆'>★★★★☆</option>
                    <option value='★★★★★'>★★★★★</option>
                </select>
                <input type='hidden' value='" . $annonce->getId() . "' name='annonce_id'>
                <textarea name='commentaire' class='descri' placeholder='Décrivez votre expérience ici...'></textarea><br />
                <input type='submit' value='Valider' class='bouton4' />
            </form>";
            }

        ?>

        <?php
            $bddmanager = new BddManager();
            $allAvis = $bddmanager->getAvisByAnnonceId($id_annonce);

            if(empty($allAvis)){
                echo "Il n'y a aucun avis pour cette location.";
            }

            else{
                foreach($allAvis as $avis){
                    echo "<div class='avis_box'>";
                        $user = $bddmanager->getUserById($avis["user_id"]);
                        echo "<div class='noteavis'>" . $avis["note"] . "</div>
                        <h6>" . $user->getUsername() . "</h6>
                        <div class='commavis'>" . $avis["commentaire"] . "</div>
                        <div class='dateavis'> Posté le " . $avis["datecreate"] .
                        "</div>
                    </div><br />";
                }
            }
        ?>
    </div>
</main>

<?php echo $footer ?>