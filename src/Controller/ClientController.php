<?php

namespace App\Controller;

class ClientController extends AppController
{
    public function view($data){
        if ($this->request->is('post')) {
            $answers = $this->request->getData();
            //$this->set('answers',$answers);
            var_dump($answers);
            var_dump($data);
            return $this->redirect(array(
                'controller' => 'Admin',
                'action' => 'results',
                //json_encode($data, JSON_UNESCAPED_UNICODE)
                serialize($answers)
            ));
        }

        $form = unserialize($data);
        $form['dservice'] = json_decode($form['dservice']);
        $form['dstaff'] = json_decode($form['dstaff']);
        $form['dopen'] = json_decode($form['dopen']);
        var_dump($form);
        $this->set('form', $form);

        

        $this->render('/Client/view');
    }
    
}
