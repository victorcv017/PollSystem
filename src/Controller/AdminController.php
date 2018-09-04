<?php

namespace App\Controller;

class AdminController extends AppController {

    public function create() {
        $this->viewBuilder()->setLayout('admin');
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

    public function results($answers) {
       
        $form = unserialize($answers);
        $grades = json_decode($form['ansservice']);
        $gradeService = 0;
        foreach($grades as $grade){
            $gradeService += intval($grade);
        }
        $gradeService = $gradeService/sizeof($grades);
        
        $grades = json_decode($form['ansstaff']);
        $gradeStaff = 0;
        foreach($grades as $grade){
            $gradeStaff += intval($grade);
        }
        $gradeStaff = $gradeStaff/sizeof($grades);
        
        $open = json_decode($form['ansopen']);
        $gradeService *= .30;
        $gradeStaff *= .30;
        
        $this->set('ansopen',$open);
        $this->set('gradeService',$gradeService);
        $this->set('gradeStaff',$gradeStaff);
        $this->set('questions',unserialize($form['dopen']));
        
        //var_dump($form,$open,$gradeService,$gradeStaff,unserialize($form['dopen']));
        /*$form['ansservice'] = json_decode($answers['ansservice']);
        $form['ansstaff'] = json_decode($answers['ansstaff']);
        $form['ansopen'] = json_decode($answers['ansopen']);
        
        //$this->set('answers', $form);*/
        $this->render('/Admin/results');
    }

}
