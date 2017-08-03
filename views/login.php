<?= $header ?>

<h2>Se connecter</h2>

<form action="loginService" method="post">
    <label>Nom d'utilisateur</label>
    <input type="text" name="username" /><br />
    <label>Mot de passe</label>
    <input type="password" name="password" /><br /><br />

    <input type="submit" value="Se connecter" />
</form>

<?= $footer ?>
