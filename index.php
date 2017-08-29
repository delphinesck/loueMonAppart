<?php
require 'flight/Flight.php';
require 'autoloader.php';

session_start();

Flight::render('header', array('heading' => 'loueMonAppart'), 'header');
Flight::render('footer', array('footer' => 'loueMonAppart'), 'footer');

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/accueil', function(){
    Flight::render('accueil');
    Flight::redirect('/');
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
    Flight::render('register');
});

Flight::route('/registerService', function(){
    include "service/registerService.php";
});

Flight::route('/newAnnonceService', function(){
    include "service/newAnnonceService.php";
    Flight::redirect('/accueil');
});

Flight::route('/newAvisService/@id', function($id){
    include "service/newAvisService.php";
    Flight::redirect('/annonce/'.$id);
});

Flight::route('/newFavoriService/@id', function($id_annonce){
    include "service/newFavoriService.php";
    Flight::redirect('/annonce/'.$id_annonce);
});

Flight::route('/supprFavoriService/@id', function($id_annonce){
    include "service/supprFavoriService.php";
    Flight::redirect('/annonce/'.$id_annonce);
});

Flight::route('/modifier_annonce/@id', function($id){
    Flight::render('modifyannonce', array("id_annonce" => $id));
});

Flight::route('/modifyAnnonceService/@id', function($id_annonce){
    include "service/modifyAnnonceService.php";
    Flight::redirect('/annonce/'.$id_annonce);
});

Flight::route('/reservation_validee', function(){
    Flight::render('reservationvalidee');
});

Flight::route('/reservationService/@id', function($id_annonce){
    include "service/reservationService.php";
    Flight::redirect('/reservation_validee');
});

// Flight::route('/reservationService/@id', function($id_annonce){
//     include "service/reservationService.php";
//     Flight::redirect('/annonce/'.$id_annonce);
// });

Flight::route('/supprAnnonceService/@id', function($id_annonce){
    include "service/supprAnnonceService.php";
    Flight::redirect('/annonces');
});

Flight::route('/deconnecterService', function(){
    include "service/deconnecterService.php";
});


Flight::start();
?>