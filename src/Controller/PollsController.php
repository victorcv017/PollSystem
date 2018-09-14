<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Polls Controller
 *
 * @property \App\Model\Table\PollsTable $Polls
 *
 * @method \App\Model\Entity\Poll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $this->paginate = [
            'contain' => ['Areas']
        ];
        $polls = $this->paginate($this->Polls);

        $this->set(compact('polls'));
        //var_dump($user['id']);
        $this->set('areas', parent::getAreas($user['id']));
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $poll = $this->Polls->get($id, [
            'contain' => ['Areas', 'Questions', 'Respondents', 'Settings']
        ]);

        $this->set('poll', $poll);
        $this->set('areas', parent::getAreas($user['id']));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($type = null) {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $poll = $this->Polls->newEntity();
        $areas = parent::getAreas($user['id']);
        $this->set('areas', $areas);
        switch ($type) {
            case "employee":
                $values = [];
                foreach ($areas as $key => $value) {
                    $values[] = $key;
                }
                //var_dump($values);
                $query = TableRegistry::get('Employees')->find('all', array(
                    'conditions' => array('Employees.area_id IN' => $values)
                ));
                $result = array();
                foreach ($query as $employee) {
                    $result[] = $employee;
                }
                $this->set('employees', $result);
                $this->render('add_employee');
                break;
            case "area":
                $this->render('add_area');
                break;
            case "service":
                $query = $this->Polls->Areas->find('all')->where(['company_id ' => $user['id']])->contain('Services');
                $result = array();
                foreach ($query as $area) {
                    if ($area->services) {
                        //var_dump($area->services);
                        $result = array_merge($result, $area->services);
                    }
                }
                $this->set('services', $result);
                $this->render('add_service');
                break;
            default :
                return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post')) {
            $request = $this->request->getData();
            $data = [
                'name' => $request['name'],
                'area_id' => $request['area'],
                'created_at' => new \DateTime('now'),
                'service_id' => isset($request['service']) ? $request['service'] : null
            ];
            //var_dump($request,$data);die;
            $dservice = json_decode($request['dservice'], true);
            $dstaff = json_decode($request['dstaff'], true);
            $dopen = json_decode($request['dopen'], true);
            $questions = [];
            foreach ($dservice as $q) {
                if (empty($q)) {
                    $question = $this->Polls->Questions->newEntity([
                        'content' => $q,
                        'type' => 'service'
                    ]);
                    $this->Polls->Questions->save($question);
                    $questions[] = ['id' => $question->id];
                }
            }
            foreach ($dstaff as $q) {
                if (empty($q)) {
                    $question = $this->Polls->Questions->newEntity([
                        'content' => $q,
                        'type' => 'staff'
                    ]);
                    $this->Polls->Questions->save($question);
                    $questions[] = ['id' => $question->id];
                }
            }
            foreach ($dopen as $q) {
                if (empty($q)) {

                    $question = $this->Polls->Questions->newEntity([
                        'content' => $q,
                        'type' => "open"
                    ]);
                    $this->Polls->Questions->save($question);
                    $questions[] = ['id' => $question->id];
                }
            }

            $data['questions'] = $questions;
            $this->Polls->patchEntity($poll, $data, [
                'associated' => ['Questions']
            ]);
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('Encuesta Guardada'));
                return $this->redirect(['action' => 'index']);
            } else
                $this->Flash->error(__('La encuesta no se pudo guardad,intente de nuevo.'));
            //var_dump($poll, $dservice, $dstaff, $dopen, $questions);
            //die;
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $poll = $this->Polls->get($id, [
            'contain' => ['Questions', 'Respondents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poll = $this->Polls->patchEntity($poll, $this->request->getData());
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('The poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll could not be saved. Please, try again.'));
        }
        $areas = $this->Polls->Areas->find('list', ['limit' => 200]);
        $questions = $this->Polls->Questions->find('list', ['limit' => 200]);
        $respondents = $this->Polls->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('poll', 'areasp', 'questions', 'respondents'));
        $this->set('areas', parent::getAreas($user['id']));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $poll = $this->Polls->get($id);
        if ($this->Polls->delete($poll)) {
            $this->Flash->success(__('The poll has been deleted.'));
        } else {
            $this->Flash->error(__('The poll could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function initialize() {
        parent::initialize();
    }

}
