<?php
session_start();
require 'flight/Flight.php';
require 'autoloader.php';

Flight::render('header', array('heading' => 'Hello'), 'header');
Flight::render('footer', array('tests' => 'World'), 'footer');

// TESTS UNITAIRES
// Ils servent à tester des parties de code, des objets spécifiques, ou des méthodes.
// On peut automatiser ces tests pour ne pas devoir les refaire manuellement à chaque fois.

Flight::route('/',  function(){
    echo "Hello world!";
    //Flight::render('traducteur', array(
    //));
});

Flight::start();
?>