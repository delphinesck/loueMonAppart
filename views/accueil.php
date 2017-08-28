<?php echo $header ?>

<main>
    <div class="box_principale">
        <section id="listeannonces">
            <?php
                $bddmanager = new BddManager();
                $annonces = $bddmanager->getAllAnnonces();
                foreach($annonces as $annonce){
            ?>
            
            <?= "<a href='annonce/" . $annonce->getId() . "'>" ?>
                <div class="annonce_box">
                    <?= "<img src='" . $annonce->getPhoto1() . "' style='height: 300px; width: 500px;' >" ?>
                    <div class="text_box">
                        <h4><?= $annonce->getTitre() . " <i>à</i> " . $annonce->getVille() ?></h4>
                        Tarif : <?=$annonce->getTarif(); ?>€ /jour
                    </div>
                </div>
            </a>

            <?php
                }
            ?>
        </section>
    </div>
</main>

<?php echo $footer ?>