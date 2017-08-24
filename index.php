<?php
session_start();
require 'flight/Flight.php';
require 'autoloader.php';

Flight::render('header', array('heading' => 'loueMonAppart'), 'header');
Flight::render('footer', array('footer' => 'loueMonAppart'), 'footer');

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/accueil', function(){
    Flight::render('accueil');
    Flight::redirect('/');
});

Flight::route('/annonces', function(){
    Flight::render('annonces');
});

Flight::route('/annonce/@id', function($id){
    Flight::render('annonce', array("id_annonce" => $id));
});

Flight::route('/annonce', function(){
    Flight::render('annonce', array(
    ));
});

Flight::route('/nouvelle_annonce', function(){
    Flight::render('newannonce');
});

Flight::route('/profil', function(){
    Flight::render('profil');
});

Flight::route('/login', function(){
    Flight::render('login');
});

Flight::route('/loginService', function(){
    include "service/loginService.php";
    Flight::redirect('/accueil');
});

Flight::route('/register', function(){
    Flight::render('/register');
});

Flight::route('/registerService', function(){
    include "service/registerService.php";
});

Flight::route('/newAnnonceService', function(){
    include "service/newAnnonceService.php";
    Flight::redirect('/annonces');
});

Flight::route('/newAvisService/@id', function($id){
    include "service/newAvisService.php";
    Flight::redirect('/annonce/'.$id);
});


Flight::start();
?>