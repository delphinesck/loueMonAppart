<?php echo $header ?>

<h2>Créer une nouvelle annonce</h2>

<?php if(empty($_GET['incomplet']) == false): ?>
    <span class="messageerreur">Veuillez remplir tous les champs.</span>
<?php endif; ?>

<form action="newAnnonceService" method="post">
    <label>Titre : </label>
    <input type="text" name="titre" /><br />
    <label>Description : </label><br />
    <textarea placeholder="Décrivez votre location ici..." name="description" rows="5" cols="60"></textarea><br />
    <label>Ville : </label>
    <input type="text" name="ville" /><br />
    <label>Tarif : </label>
    <input type="number" name="tarif" /> € /jour<br />
    <label>Type de propriété : </label>
        <select name="propriete">
            <option value="maison">Maison</option>
            <option value="appartement">Appartement</option>
            <option value="chateau">Château</option>
            <option value="chalet">Chalet</option>
        </select><br />
    <label>Superficie : </label>
    <input type="text" name="superficie" /> m<sup>2</sup><br />
    <label>Début de disponibilité : </label>
    <input type="date" name="dispo_debut" /><br />
    <label>Fin de disponibilité : </label>
    <input type="date" name="dispo_fin" /><br />

    <h4>Photos</h4>
    <label>Photo 1 : </label>
    <input type="text" name="photo1" /><br />
    <label>Photo 2 : </label>
    <input type="text" name="photo2" /><br />
    <label>Photo 3 : </label>
    <input type="text" name="photo3" /><br /><br />

    <input type="submit" value="Mettre en ligne" />
</form>

<?php echo $footer ?>