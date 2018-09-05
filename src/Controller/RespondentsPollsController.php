<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RespondentsPolls Controller
 *
 * @property \App\Model\Table\RespondentsPollsTable $RespondentsPolls
 *
 * @method \App\Model\Entity\RespondentsPoll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RespondentsPollsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Polls', 'Respondents']
        ];
        $respondentsPolls = $this->paginate($this->RespondentsPolls);

        $this->set(compact('respondentsPolls'));
    }

    /**
     * View method
     *
     * @param string|null $id Respondents Poll id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respondentsPoll = $this->RespondentsPolls->get($id, [
            'contain' => ['Polls', 'Respondents']
        ]);

        $this->set('respondentsPoll', $respondentsPoll);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $respondentsPoll = $this->RespondentsPolls->newEntity();
        if ($this->request->is('post')) {
            $respondentsPoll = $this->RespondentsPolls->patchEntity($respondentsPoll, $this->request->getData());
            if ($this->RespondentsPolls->save($respondentsPoll)) {
                $this->Flash->success(__('The respondents poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respondents poll could not be saved. Please, try again.'));
        }
        $polls = $this->RespondentsPolls->Polls->find('list', ['limit' => 200]);
        $respondents = $this->RespondentsPolls->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('respondentsPoll', 'polls', 'respondents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Respondents Poll id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respondentsPoll = $this->RespondentsPolls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respondentsPoll = $this->RespondentsPolls->patchEntity($respondentsPoll, $this->request->getData());
            if ($this->RespondentsPolls->save($respondentsPoll)) {
                $this->Flash->success(__('The respondents poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respondents poll could not be saved. Please, try again.'));
        }
        $polls = $this->RespondentsPolls->Polls->find('list', ['limit' => 200]);
        $respondents = $this->RespondentsPolls->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('respondentsPoll', 'polls', 'respondents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Respondents Poll id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respondentsPoll = $this->RespondentsPolls->get($id);
        if ($this->RespondentsPolls->delete($respondentsPoll)) {
            $this->Flash->success(__('The respondents poll has been deleted.'));
        } else {
            $this->Flash->error(__('The respondents poll could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
