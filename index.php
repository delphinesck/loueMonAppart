<?php
session_start();
require 'flight/Flight.php';
require 'autoloader.php';

Flight::render('header', array('heading' => 'loueMonAppart'), 'header');
Flight::render('footer', array('footer' => 'loueMonAppart'), 'footer');

Flight::route('/',  function(){
    Flight::render('accueil', array(
    ));
});

Flight::route('/accueil',  function(){
    Flight::render('accueil', array(
    ));
});

Flight::route('/login',  function(){
    Flight::render('login', array(
    ));
});

Flight::route('/register',  function(){
    Flight::render('register', array(
    ));
});

Flight::route('/registerService', function(){
    include "service/registerService.php";
    Flight::redirect('/accueil');
});


Flight::start();
?>