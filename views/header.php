<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
</head>
<body>

<nav>
    <div id="navigation">
        <div id="logo"><a href="/WWW/TP_loueMonAppart/accueil"><h1><span class="logostyle1">LoueMon</span><br /><span class="logostyle2">Appart</span></h1></a></div>

        <div id="slogan">Location de courte durée entre particuliers</div>

        <div id="menu">
            <?php 
                if(!empty($_SESSION)){
                    echo "<button class='bouton3'><a href='/WWW/TP_loueMonAppart/profil'>Profil</a></button>
                    <button class='bouton3'><a href='/WWW/TP_loueMonAppart/nouvelle_annonce'>Créer une annonce</a></button>
                    <form action='/WWW/TP_loueMonAppart/deconnecterService' method='post' style='display:inline-block;'>
                        <input type='submit' value='Se déconnecter' class='bouton3' />
                    </form>";
                }

                else{
                    echo "<button class='bouton3'><a href='/WWW/TP_loueMonAppart/login'>Se connecter</a></button>
                    <button class='bouton3'><a href='/WWW/TP_loueMonAppart/register'>S'inscrire</a></button>";
                }
            ?>
        </div>
    </div>
</nav>
