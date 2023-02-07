<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarReviews Controller
 *
 * @property \App\Model\Table\CarReviewsTable $CarReviews
 * @method \App\Model\Entity\CarReview[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarReviewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Cars'],
        ];
        $carReviews = $this->paginate($this->CarReviews);

        $this->set(compact('carReviews'));
    }

    /**
     * View method
     *
     * @param string|null $id Car Review id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carReview = $this->CarReviews->get($id, [
            'contain' => ['Users', 'Cars'],
        ]);

        $this->set(compact('carReview'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carReview = $this->CarReviews->newEmptyEntity();
        if ($this->request->is('post')) {
            $carReview = $this->CarReviews->patchEntity($carReview, $this->request->getData());
            if ($this->CarReviews->save($carReview)) {
                $this->Flash->success(__('The car review has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'usercarview']);
            }
            $this->Flash->error(__('The car review could not be saved. Please, try again.'));
        }
        $users = $this->CarReviews->Users->find('list', ['limit' => 200])->all();
        $cars = $this->CarReviews->Cars->find('list', ['limit' => 200])->all();
        $this->set(compact('carReview', 'users', 'cars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car Review id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carReview = $this->CarReviews->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carReview = $this->CarReviews->patchEntity($carReview, $this->request->getData());
            if ($this->CarReviews->save($carReview)) {
                $this->Flash->success(__('The car review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car review could not be saved. Please, try again.'));
        }
        $users = $this->CarReviews->Users->find('list', ['limit' => 200])->all();
        $cars = $this->CarReviews->Cars->find('list', ['limit' => 200])->all();
        $this->set(compact('carReview', 'users', 'cars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car Review id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carReview = $this->CarReviews->get($id);
        if ($this->CarReviews->delete($carReview)) {
            $this->Flash->success(__('The car review has been deleted.'));
        } else {
            $this->Flash->error(__('The car review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
