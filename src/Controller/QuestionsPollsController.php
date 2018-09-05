<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionsPolls Controller
 *
 * @property \App\Model\Table\QuestionsPollsTable $QuestionsPolls
 *
 * @method \App\Model\Entity\QuestionsPoll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsPollsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions', 'Polls']
        ];
        $questionsPolls = $this->paginate($this->QuestionsPolls);

        $this->set(compact('questionsPolls'));
    }

    /**
     * View method
     *
     * @param string|null $id Questions Poll id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionsPoll = $this->QuestionsPolls->get($id, [
            'contain' => ['Questions', 'Polls']
        ]);

        $this->set('questionsPoll', $questionsPoll);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionsPoll = $this->QuestionsPolls->newEntity();
        if ($this->request->is('post')) {
            $questionsPoll = $this->QuestionsPolls->patchEntity($questionsPoll, $this->request->getData());
            if ($this->QuestionsPolls->save($questionsPoll)) {
                $this->Flash->success(__('The questions poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questions poll could not be saved. Please, try again.'));
        }
        $questions = $this->QuestionsPolls->Questions->find('list', ['limit' => 200]);
        $polls = $this->QuestionsPolls->Polls->find('list', ['limit' => 200]);
        $this->set(compact('questionsPoll', 'questions', 'polls'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Questions Poll id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionsPoll = $this->QuestionsPolls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionsPoll = $this->QuestionsPolls->patchEntity($questionsPoll, $this->request->getData());
            if ($this->QuestionsPolls->save($questionsPoll)) {
                $this->Flash->success(__('The questions poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questions poll could not be saved. Please, try again.'));
        }
        $questions = $this->QuestionsPolls->Questions->find('list', ['limit' => 200]);
        $polls = $this->QuestionsPolls->Polls->find('list', ['limit' => 200]);
        $this->set(compact('questionsPoll', 'questions', 'polls'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Questions Poll id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionsPoll = $this->QuestionsPolls->get($id);
        if ($this->QuestionsPolls->delete($questionsPoll)) {
            $this->Flash->success(__('The questions poll has been deleted.'));
        } else {
            $this->Flash->error(__('The questions poll could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
