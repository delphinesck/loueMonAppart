<?= $header ?>

<main>
    <div class="box_log">
        <h2>Se connecter</h2>

        <?php if(empty($_GET['incomplet']) == false): ?>
            <div class="messageerreur">Erreur lors de la connexion : veuillez vérifier que tous les champs sont remplis et que le mot de passe et le nom d'utilisateur ne sont pas erronés.</div><br />
        <?php endif; ?>

        <form action="loginService" method="post">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" class="inputs" />
            <label>Mot de passe</label>
            <input type="password" name="upassword" class="inputs" />

            <input type="submit" value="Se connecter" class="bouton2" />
        </form>
    </div>
</main>

<?= $footer ?>
