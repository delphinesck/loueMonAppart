<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>LoueMonAppart</h1>

<nav>
    <ul>
        <li><a href="/WWW/TP_loueMonAppart/accueil">Accueil</a></li>
        <li><a href="/WWW/TP_loueMonAppart/annonces">Annonces</a></li>
        <?php 
            if(!empty($_SESSION)){
                echo "<li><a href='/WWW/TP_loueMonAppart/profil'>Profil</a></li>
                <li>Se déconnecter</li>";
            }

            else{
                echo "<li><a href='/WWW/TP_loueMonAppart/login'>Se connecter</a></li>
                <li><a href='/WWW/TP_loueMonAppart/register'>S'inscrire</a></li>";
            }
        ?>
    </ul>
</nav>

