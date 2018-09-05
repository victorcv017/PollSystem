<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Respondents Controller
 *
 * @property \App\Model\Table\RespondentsTable $Respondents
 *
 * @method \App\Model\Entity\Respondent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RespondentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $respondents = $this->paginate($this->Respondents);

        $this->set(compact('respondents'));
    }

    /**
     * View method
     *
     * @param string|null $id Respondent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respondent = $this->Respondents->get($id, [
            'contain' => ['Polls']
        ]);

        $this->set('respondent', $respondent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $respondent = $this->Respondents->newEntity();
        if ($this->request->is('post')) {
            $respondent = $this->Respondents->patchEntity($respondent, $this->request->getData());
            if ($this->Respondents->save($respondent)) {
                $this->Flash->success(__('The respondent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respondent could not be saved. Please, try again.'));
        }
        $polls = $this->Respondents->Polls->find('list', ['limit' => 200]);
        $this->set(compact('respondent', 'polls'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Respondent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respondent = $this->Respondents->get($id, [
            'contain' => ['Polls']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respondent = $this->Respondents->patchEntity($respondent, $this->request->getData());
            if ($this->Respondents->save($respondent)) {
                $this->Flash->success(__('The respondent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respondent could not be saved. Please, try again.'));
        }
        $polls = $this->Respondents->Polls->find('list', ['limit' => 200]);
        $this->set(compact('respondent', 'polls'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Respondent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respondent = $this->Respondents->get($id);
        if ($this->Respondents->delete($respondent)) {
            $this->Flash->success(__('The respondent has been deleted.'));
        } else {
            $this->Flash->error(__('The respondent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
