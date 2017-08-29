<?= $header ?>

<main>
    <div class="box_log">
        <h2>S'inscrire</h2>

        <form action="registerService" method="post">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" class="inputs" />
            <label>Mot de passe</label>
            <input type="password" name="upassword" class="inputs" />
            <label>Vérifier le mot de passe</label>
            <input type="password" name="verifypassword" class="inputs" />
            <label>N° de téléphone</label>
            <input type="number" name="telephone" class="inputs" />
            <label>Email</label>
            <input type="text" name="email" class="inputs" />

            <input type="submit" value="S'inscrire" class="bouton2" />
        </form>
    </div>
</main>

<?= $footer ?>