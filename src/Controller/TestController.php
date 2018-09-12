<?php

namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;

class TestController extends AppController {

    public function test() {
        /*$password = "uao";
        $hasher = new DefaultPasswordHasher();
        $hasher->hash($password);
        var_dump($hasher->hash($password));*/
        
        $this->viewBuilder()->setLayout('company');
        $this->render('/test');
    }
}
