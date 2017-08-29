<?php echo $header ?>

<main>
    <div class="box_principale">
        <?php 
            if(empty($_SESSION)){
                echo "Vous devez être connecté pour poster une annonce.";
            }

            else{
                echo "<h2>Créer une nouvelle annonce</h2>";

                if(empty($_GET['incomplet']) == false){
                    echo "<div class='messageerreur'>Veuillez remplir tous les champs.</div><br />";
                }

                echo "<form action='newAnnonceService' method='post'>
                    <label>Titre</label>
                    <input type='text' name='titre' class='inputs' />
                    <label>Description</label>
                    <textarea placeholder='Décrivez votre location ici...' name='description' class='descri'></textarea>
                    <label>Ville</label><br />
                    <input type='text' name='ville' class='inputs inputinline' /><br />
                    <label>Tarif</label><br />
                    <input type='number' name='tarif' class='inputs inputinline' /> € /jour<br />
                    <label>Type de propriété</label>
                        <select name='propriete'>
                            <option value='maison'>Maison</option>
                            <option value='appartement'>Appartement</option>
                            <option value='château'>Château</option>
                            <option value='chalet'>Chalet</option>
                        </select>
                    <label>Superficie</label><br />
                    <input type='text' name='superficie' class='inputs inputinline' /> m²<br />
                    <label>Début de disponibilité</label>
                    <input type='date' name='dispo_debut' class='inputs date' />
                    <label>Fin de disponibilité</label>
                    <input type='date' name='dispo_fin' class='inputs date' />

                    <br /><br />

                    <h3>Photos</h3>
                    <label>Photo 1</label>
                    <input type='text' name='photo1' class='inputs' />
                    <label>Photo 2</label>
                    <input type='text' name='photo2' class='inputs' />
                    <label>Photo 3</label>
                    <input type='text' name='photo3' class='inputs' />

                    <input type='submit' value='Mettre en ligne' class='bouton2' />
                </form>";
            }
        ?>
    </div>
</main>

<?php echo $footer ?>