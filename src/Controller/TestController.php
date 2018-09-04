<?php

namespace App\Controller;

class TestController extends AppController {

    public function test() {
        $this->viewBuilder()->setLayout('admin');
        $this->render('/test');
    }
}
