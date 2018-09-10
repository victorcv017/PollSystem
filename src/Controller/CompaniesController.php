<?php

namespace App\Controller;

use ___;
use App\Controller\AppController;
use App\Model\Entity\Company;
use App\Model\Table\CompaniesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Companies Controller
 *
 * @property CompaniesTable $Companies
 *
 * @method Company[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController {

    /**
     * Index method
     *
     * @return Response|void
     */
    public function index() {
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return Response|void
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $company = $this->Companies->get($id, [
            'contain' => ['Areas']
        ]);

        $this->set('company', $company);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('company'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('company'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return Response|null Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error('Tu usuario o contraseña son inválidos.');
        }
    }

    public function initialize() {
        parent::initialize();
        $this->Auth
        ->config('authenticate',
                ['Form' => [
                    'userModel' => 'Companies',
                    'fields' => [
                        'username' => 'RFC',
                        'password' => 'password'
                    ]
                ]],
                'loginAction',[
                'controller' => 'Companies',
                'action' => 'login'
                ],
                'authorize',['Controller']);
        $this->Auth->unauthorizedRedirect = false;


        
    }

    public function logout() {
        $this->Flash->success('Haz cerrado sesión');
        return $this->redirect($this->Auth->logout());
    }

    public function home() {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $areas = TableRegistry::get('Areas');   
        $query = $areas->find('all')
                ->where(['Areas.company_id ' => $user['id']])
                ->toList();
       
        $result = [];
        foreach($query as $q){
            $result[] = [$q->id,$q->name];
        }
        $this->set('areas', $result);
        //var_dump($result);
        $this->render('/test');
    }

    public function isAuthorized($user) {
        if ($user['id'])
            return true;
        // By default deny access.
        return false;
    }

}
