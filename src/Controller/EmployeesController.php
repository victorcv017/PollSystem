<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();
        //var_dump($user);
        $this->viewBuilder()->setLayout('company');
        $this->set('areas', parent::getAreas($user['id']));
        $this->paginate = [
            'contain' => ['Areas', 'Services']
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        //var_dump($user);
        $this->viewBuilder()->setLayout('company');
        $this->set('areas', parent::getAreas($user['id']));
        $employee = $this->Employees->get($id, [
            'contain' => ['Areas', 'Services']
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        //var_dump($user);
        $this->viewBuilder()->setLayout('company');
        $this->set('areas', parent::getAreas($user['id']));
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $areas = $this->Employees->Areas->find('list', ['limit' => 200]);
        $services = $this->Employees->Services->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'areas', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        //var_dump($user);
        $this->viewBuilder()->setLayout('company');
        $this->set('areas', parent::getAreas($user['id']));
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $areas = $this->Employees->Areas->find('list', ['limit' => 200]);
        $services = $this->Employees->Services->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'areas', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function home() {
        var_dump($user = $this->Auth->user());
    }
    
    
    public function login() {
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error('Tu usuario o contraseña son inválidos.');
        }
    }
    
    public function logout() {
        $this->Flash->success('Haz cerrado sesión');
        return $this->redirect($this->Auth->logout());
    }
    
    public function isAuthorized($user = null) {
        if ($user['email'])
            return true;
        return false;
    }
}
