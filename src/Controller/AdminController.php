<?php

namespace App\Controller;

class AdminController extends AppController {

    public function create() {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->set('data',$data);
            return $this->redirect(array(
                'controller' => 'Client',
                'action' => 'view',
                //json_encode($data, JSON_UNESCAPED_UNICODE)
                serialize($data)
            ));
        }

        $this->render('/Admin/create');
    }

    public function results() {
        $this->render('/Admin/results');
    }

}
