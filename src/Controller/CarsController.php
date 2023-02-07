<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Brands'],
        ];
        $cars = $this->paginate($this->Cars);

        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['Users', 'Brands', 'CarReviews'],
        ]);

        $this->set(compact('car'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $car = $this->Cars->newEmptyEntity();

        $fileName2 = $car["image"];


        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $productImage = $this->request->getData("image");

            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }

            $data["image"] = $fileName;
            
            $car = $this->Cars->patchEntity($car, $data);
            // echo '<pre>';
            // print_r($car);
            // die;
            if ($this->Cars->save($car)) {
                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }


        // if ($this->request->is('post')) {
        //     $car = $this->Cars->patchEntity($car, $this->request->getData());
        //     if ($this->Cars->save($car)) {
        //         $this->Flash->success(__('The car has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The car could not be saved. Please, try again.'));
        // }
        $users = $this->Cars->Users->find('list', ['limit' => 200])->all();
        $brands = $this->Cars->Brands->find('list', ['limit' => 200])->all();
        $this->set(compact('car', 'users', 'brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200])->all();
        $brands = $this->Cars->Brands->find('list', ['limit' => 200])->all();
        $this->set(compact('car', 'users', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
