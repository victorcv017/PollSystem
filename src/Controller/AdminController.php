<?php

namespace App\Controller;

class AdminController extends AppController
{
    public function create(){
        $data = $this->request->getData();
        if($data){
            $this->redirect([
                'controller' => 'Client',
                'action' => 'view',
                serialize($data)
            ]);
        }
        $this->render('/Admin/create');
    }
    
}
