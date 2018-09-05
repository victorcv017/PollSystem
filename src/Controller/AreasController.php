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
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $areas = $this->paginate($this->Areas);

        $this->set(compact('areas'));
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
        $area = $this->Areas->get($id, [
            'contain' => ['Companies', 'Employees', 'Polls', 'Services']
        ]);

        $this->set('area', $area);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $companies = $this->Areas->Companies->find('list', ['limit' => 200]);
        $this->set(compact('area', 'companies'));
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
}
