<?php

require 'model/loginService.php';

use PHPUnit\Framework\TestCase;

class testLoginService extends TestCase {
    public function testPushAndPop(){
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    // Ici on commence à tester notre service.
    // On teste si notre username est vide ou pas
    public function testNoUsername(){
        $array = array(
            'username' => '',
            'upassword'=> 'monPasswordTabernacle'
        );
        $service = new loginService();
        $service->launchControls($array);
        // La méthode suivante vérifie que notre array 'erreur' a l'index 'username'.
        $this->assertArrayHasKey('username', $service->getError());
    }

    public function testNoPassword(){
        $array = array(
            'username' => 'Apocalypse',
            'upassword'=> ''
        );
        $service = new loginService();
        $service->setParams($array);
        $service->launchControls($array);
        // La méthode suivante vérifie que notre array 'erreur' a l'index 'username'.
        $this->assertArrayHasKey('upassword', $service->getError());
    }

    public function testCredentialsBadPassword(){
        $service = new loginService();
        $array = array(
            'username' => 'apocalypse',
            'upassword' => 'guimau'
        );
        $service->setParams($array);
        $service->launchControls($array);
        $this->assertEquals(false, $service->getUser());
    }

    public function testCredentialsBadUsername(){
        $service = new loginService();
        $array = array(
            'username' => 'apocalyp',
            'upassword' => 'guimauve'
        );
        $service->setParams($array);
        $service->launchControls($array);
        $this->assertEquals(false, $service->getUser());
    }

    public function testCredentials(){
        // Avec les bons identifiants
        $service = new loginService();
        $array = array(
            'username' => 'apocalypse',
            'upassword' => 'guimauve'
        );
        $service->setParams($array);
        var_dump($service->getUser());
        $service->launchControls($array);
        $this->assertEquals(true, is_array($service->getUser()));
        $this->assertArrayHasKey('id', $service->getUser()[0]);
    }
}

?>