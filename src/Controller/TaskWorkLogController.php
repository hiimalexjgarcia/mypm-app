<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TaskWorkLog Controller
 *
 * @property \App\Model\Table\TaskWorkLogTable $TaskWorkLog
 * @method \App\Model\Entity\TaskWorkLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TaskWorkLogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks'],
        ];
        $taskWorkLog = $this->paginate($this->TaskWorkLog);

        $this->set(compact('taskWorkLog'));
    }

    /**
     * View method
     *
     * @param string|null $id Task Work Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskWorkLog = $this->TaskWorkLog->get($id, [
            'contain' => ['Tasks'],
        ]);

        $this->set(compact('taskWorkLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskWorkLog = $this->TaskWorkLog->newEmptyEntity();
        if ($this->request->is('post')) {
            $taskWorkLog = $this->TaskWorkLog->patchEntity($taskWorkLog, $this->request->getData());
            if ($this->TaskWorkLog->save($taskWorkLog)) {
                $this->Flash->success(__('The task work log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task work log could not be saved. Please, try again.'));
        }
        $tasks = $this->TaskWorkLog->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('taskWorkLog', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Work Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskWorkLog = $this->TaskWorkLog->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskWorkLog = $this->TaskWorkLog->patchEntity($taskWorkLog, $this->request->getData());
            if ($this->TaskWorkLog->save($taskWorkLog)) {
                $this->Flash->success(__('The task work log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task work log could not be saved. Please, try again.'));
        }
        $tasks = $this->TaskWorkLog->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('taskWorkLog', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Work Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskWorkLog = $this->TaskWorkLog->get($id);
        if ($this->TaskWorkLog->delete($taskWorkLog)) {
            $this->Flash->success(__('The task work log has been deleted.'));
        } else {
            $this->Flash->error(__('The task work log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
