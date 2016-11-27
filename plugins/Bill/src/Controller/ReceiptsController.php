<?php
namespace Bill\Controller;

use Bill\Controller\AppController;

/**
 * Receipts Controller
 *
 * @property \Bill\Model\Table\ReceiptsTable $Receipts
 */
class ReceiptsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $receipts = $this->paginate($this->Receipts);

        $this->set(compact('receipts'));
        $this->set('_serialize', ['receipts']);
    }

    /**
     * View method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receipt = $this->Receipts->get($id, [
            'contain' => []
        ]);

        $this->set('receipt', $receipt);
        $this->set('_serialize', ['receipt']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receipt = $this->Receipts->newEntity();
        if ($this->request->is('post')) {
            $receipt = $this->Receipts->patchEntity($receipt, $this->request->data);
            if ($this->Receipts->save($receipt)) {
                $this->Flash->success(__('The receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                dump($receipt->errors()); die();
                $this->Flash->error(__('The receipt could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('receipt'));
        $this->set('_serialize', ['receipt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receipt = $this->Receipts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receipt = $this->Receipts->patchEntity($receipt, $this->request->data);
            if ($this->Receipts->save($receipt)) {
                $this->Flash->success(__('The receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receipt could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('receipt'));
        $this->set('_serialize', ['receipt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receipt = $this->Receipts->get($id);
        if ($this->Receipts->delete($receipt)) {
            $this->Flash->success(__('The receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
