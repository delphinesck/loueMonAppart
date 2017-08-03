<?= $header ?>

<h2>S'inscrire</h2>

<form action="registerService" method="post">
    <label>Nom d'utilisateur</label>
    <input type="text" name="username" /><br />
    <label>Mot de passe</label>
    <input type="password" name="upassword" /><br />
    <label>Vérifier le mot de passe</label>
    <input type="password" name="verifypassword" /><br />
    <label>N° de téléphone</label>
    <input type="number" name="telephone" /><br />
    <label>Email</label>
    <input type="text" name="email" /><br /><br />

    <input type="submit" value="S'inscrire" />
</form>

<?= $footer ?>