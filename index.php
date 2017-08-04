<?php
session_start();
require 'flight/Flight.php';
require 'autoloader.php';

Flight::render('header', array('heading' => 'loueMonAppart'), 'header');
Flight::render('footer', array('footer' => 'loueMonAppart'), 'footer');

Flight::route('/', function(){
    Flight::render('accueil', array(
    ));
});

Flight::route('/accueil', function(){
    Flight::render('accueil', array(
    ));
    Flight::redirect('/');
});

Flight::route('/annonces', function(){
    Flight::render('annonces', array(
    ));
});

Flight::route('/nouvelle_annonce', function(){
    Flight::render('newannonce', array(
    ));
});

Flight::route('/profil', function(){
    Flight::render('profil', array(
    ));
});

Flight::route('/login', function(){
    Flight::render('login', array(
    ));
});

Flight::route('/loginService', function(){
    include "service/loginService.php";
    Flight::redirect('/accueil');
});

Flight::route('/register', function(){
    Flight::render('register', array(
    ));
});

Flight::route('/registerService', function(){
    include "service/registerService.php";
});


Flight::start();
?>