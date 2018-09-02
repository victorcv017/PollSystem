<?php

namespace App\Controller;

class ClientController extends AppController
{
    public function view($data){
        var_dump($data);
        //var_dump($this->request->getData());
        
        $this->render('/Client/view');
    }
    
}
