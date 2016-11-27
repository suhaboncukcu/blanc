<?php
namespace Emissions\Controller;

use Emissions\Controller\AppController;

/**
 * Meals Controller
 *
 * @property \Emissions\Model\Table\MealsTable $Meals
 */
class MealsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $meals = $this->paginate($this->Meals);

        $this->set(compact('meals'));
        $this->set('_serialize', ['meals']);
    }

    /**
     * View method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meal = $this->Meals->get($id, [
            'contain' => []
        ]);

        $this->set('meal', $meal);
        $this->set('_serialize', ['meal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        header("Access-Control-Allow-Origin: *");
        $meal = $this->Meals->newEntity();
        if ($this->request->is('post')) {
            $meal = $this->Meals->patchEntity($meal, $this->request->data);
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meal could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('meal'));
        $this->set('_serialize', ['meal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meal = $this->Meals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meal = $this->Meals->patchEntity($meal, $this->request->data);
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meal could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('meal'));
        $this->set('_serialize', ['meal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meal = $this->Meals->get($id);
        if ($this->Meals->delete($meal)) {
            $this->Flash->success(__('The meal has been deleted.'));
        } else {
            $this->Flash->error(__('The meal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
