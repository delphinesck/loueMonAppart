<?php
$paramserror = "";

if(empty($_POST["username"]) || empty($_POST["upassword"])){
        $paramserror .= "&incomplet=1";
}

$username = $_POST['username'];
$upassword = $_POST['upassword'];



if(!empty($paramserror)){
   Flight::redirect('/login?'.$paramserror); 
}


$bddmanager = new BddManager();
$user = $bddmanager->login($username, $upassword);
if(empty($user) == false){
    $_SESSION['user'] = $user;
}

?>