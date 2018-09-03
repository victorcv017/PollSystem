<?php

namespace App\Controller;

class ClientController extends AppController
{
    public function view($data){
        $form = unserialize($data);
        $form['dservice'] = json_decode($form['dservice']);
        $form['dstaff'] = json_decode($form['dstaff']);
        $form['dopen'] = json_decode($form['dopen']);
        var_dump($form);
        $this->set('form', $form);
        $this->render('/Client/view');
    }
    
}
