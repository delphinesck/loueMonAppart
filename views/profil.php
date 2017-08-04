<?php echo $header ?>

<h2>Profil</h2>

<b>Username : </b><?php echo($_SESSION['user'][0]['username']); ?><br />

<b>N° de téléphone : </b><?php echo($_SESSION['user'][0]['telephone']); ?><br />

<b>Email : </b><?php echo($_SESSION['user'][0]['email']); ?>

<?php echo $footer ?>