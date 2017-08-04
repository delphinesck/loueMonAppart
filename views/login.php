<?= $header ?>

<h2>Se connecter</h2>

<?php if(empty($_GET['incomplet']) == false): ?>
    <span class="messageerreur">Erreur lors de la connexion : veuillez vérifier si tous les champs sont remplis et que le mot de passe et le nom d'utilisateur ne sont pas erronés.</span>
<?php endif; ?>

<form action="loginService" method="post">
    <label>Nom d'utilisateur</label>
    <input type="text" name="username" /><br />
    <label>Mot de passe</label>
    <input type="password" name="upassword" /><br /><br />

    <input type="submit" value="Se connecter" />
</form>

<?= $footer ?>
