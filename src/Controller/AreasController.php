<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 *
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $areasp = $this->paginate($this->Areas);
        $this->set(compact('areasp'));
        $this->set('areas', $this->getAreas($user['id']));
        //var_dump($areas);
        //var_dump(compact($areas));
        
        
        
    }

     /**
     * Show method
     *
     * @return \Cake\Http\Response|void
     */
    public function show()
    {
        $this->viewBuilder()->setLayout('company');
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $areas = $this->paginate($this->Areas);
    

        $this->set(compact('area'));
        //$this->render('index');
    }
    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $this->viewBuilder()->setLayout('company');
        $area = $this->Areas->get($id, [
            'contain' => ['Companies', 'Employees', 'Polls', 'Services']
        ]);

        $this->set('area', $area);
        $this->set('areas', 
        
        parent::getAreas($user['id']));
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
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            $area->company_id = $this->Auth->user('id');
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $companies = $this->Areas->Companies->find('list', ['limit' => 200]);
        $this->set(compact('area', 'companies'));
        $this->set('areas', $this->getAreas($user['id']));
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        //var_dump($user);
        $this->viewBuilder()->setLayout('company');
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $companies = $this->Areas->Companies->find('list', ['limit' => 200]);
        $this->set(compact('area', 'companies'));
        //var_dump($user['id']);
        $this->set('areas',  parent::getAreas($user['id']));
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($this->Areas->delete($area)) {
            $this->Flash->success(__('The area has been deleted.'));
        } else {
            $this->Flash->error(__('The area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add','view'])) {
            return true;
        }

        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // Check that the article belongs to the current user.
        $area = $this->Areas->findBySlug($slug)->first();

        return $area->company_id === $user['id'];
    }

    public function initialize()
    {
        parent::initialize();
    }
    

}
