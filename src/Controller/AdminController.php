<?php

namespace App\Controller;

class AdminController extends AppController
{
    public function create(){
        $data = $this->request->getData();
        if($data){
            $this->redirect('/Client/view', array(
                'data' => $data
            ));
        }
        $this->render('/Admin/create');
    }
    
    public function results(){
        $this->render('/Admin/results');
    }
}
