<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->addUnauthenticatedActions(['login']);

        $this->Model = $this->loadModel('Cars');
        $this->Model = $this->loadModel('CarReviews');
        $this->Model = $this->loadModel('Brands');
        $this->Model = $this->loadModel('Reaction');
        if ($this->Authentication->getIdentity()) {
            $user1 = $this->Authentication->getIdentity();
            $uid=$user1->id;
            $result = $this->Users->get($uid,[
                'contain'=>[],
            ]);
        } else {
            $auth = false;
            $user1 = null;
            $result = null;
        }
        $this->set(compact('user1','result'));
    }
    
    public function index()
   {

        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
           
        $this->viewBuilder()->setLayout('adminlayout');   

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
            
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Brands', 'CarReviews', 'Cars'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // echo "<pre>";
            // print_r($user);
            // die;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','usercarview']);
}

   public function login()
   {
    $this->viewBuilder()->setLayout('newlayout');   
    // $this->request->allowMethod(['get', 'post']);
    // $result = $this->Authentication->getResult();
    // // regardless of POST or GET, redirect if user is logged in
    // if ($result && $result->isValid()) {
    //     // redirect to /articles after login success
    //     $redirect = $this->request->getQuery('redirect', [
    //         'controller' => 'Users',
    //         'action' => 'index',
    //     ]);

    //     return $this->redirect($redirect);
    // }
    // // display error if user submitted and authentication failed
    // if ($this->request->is('post') && !$result->isValid()) {
    //     $this->Flash->error(__('Invalid username or password'));
    // }

    $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in

        if ($result && $result->isValid()) {
            // redirect to /articles after login success


            
            $result = $this->Authentication->getIdentity();
            // echo '<pre>';print_r($result->user_type);die;
            // $value = $result->name;
            // print_r($value); die

            if($result->role == 0){

            $this->Flash->success(__('The admin has been logged in successfully login.'));

            return $this->redirect(['controller'=>'Users', 'action' => 'admin']);

            }
            else if($result->role == 1){

                $this->Flash->success(__('The user has been logged in successfully.'));

                return $this->redirect(['controller'=>'Users', 'action' =>'home']);

            }

        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
   }
   public function usercarview($id = null){
           

    
    $car = $this->Cars->get($id, [
        'contain' => ['Brands','CarReviews'],
    ]);
  
    $sss = $this->CarReviews->find('all')->where(['car_id' => $id])->all();
    // dd($sss);
    // echo '<pre>';
    // foreach($sss as $sss){
    // print_r($sss->review);
    // }
    // die;

    $this->set(compact('car'));

    $this->paginate = [
        'contain' => ['Users', 'Cars'],
    ];
    $carReviews = $this->paginate($this->CarReviews);
   
    $this->set(compact('carReviews', 'sss'));

    
}

    public function home(){
        $this->viewBuilder()->setLayout('newlayout');   

        // $cars = $this->paginate($this->Cars->find('all')->where(['active' => 1]));
        // $this->set(compact('cars'));
     

        $cars = $this->paginate($this->Cars,[
            'contain' => ['Brands','Reaction'],
        ]);
        $this->set(compact('cars'));
        
        // $cars = $this->paginate($this->Cars->find('all')->where(['status' => 1]));
        // $this->set(compact('cars'));
    
    }
    public function ratedcar(){
      
        $this->viewBuilder()->setLayout('adminlayout');   

        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
     
         $this->paginate = [
                'contain' => ['Users', 'Cars'],
        ];
         $carReviews = $this->paginate($this->CarReviews);
    
         $this->set(compact('carReviews'));

    } else {
        return $this->redirect(['action' => 'home']);
    }

}

public function deleterate($id = null){

    $this->request->allowMethod(['post', 'delete']);
        $carReview = $this->CarReviews->get($id);
        if ($this->CarReviews->delete($carReview)) {
            $this->Flash->success(__('The car review has been successful deleted.'));
        } else {
            $this->Flash->error(__('The car review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'ratedcar']);

}
    public function admin(){
        $this->viewBuilder()->setLayout('adminlayout');   

        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
           

            $cars = $this->paginate($this->Cars,[
                'contain' => ['Brands'],
            ]);
        
            $this->set(compact('cars'));

            // $users = $this->paginate($this->Users);

            // $this->set(compact('users'));
        } else {
            return $this->redirect(['action' => 'home']);
        }

        // $this->paginate = [
        //     'contain' => ['Users','Cars', 'Brands'],
        // ];
        // $cars = $this->paginate($this->Users);

        // $this->set(compact('users'));
    }
    public function userstatus($id = null, $status){
           
        $this->request->allowMethod(['post']);
        $car = $this->Cars->get($id);
        
        if($status == 1)
        $car->status = 0;
        else
        $car->status = 1;

        if($this->Cars->save($car)){
            $this->Flash->success(__('The status has been changed.'));

        }
        return $this->redirect(['controller'=>'Users', 'action' => 'admin']);
    }

    public function addcar(){

        $this->viewBuilder()->setLayout('adminlayout');   
       
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
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
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

    public function carview($id = null){
    
        $this->viewBuilder()->setLayout('adminlayout');   

        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
      
            $car = $this->Cars->get($id, [
                'contain' => ['Users', 'Brands', 'CarReviews'],
            ]);
        
            $this->set(compact('car'));
            // $this->set(compact('rating'));
               
            $this->viewBuilder()->setLayout('adminlayout');   
        
            if ($this->Authentication->getIdentity()) {
                $user = $this->Authentication->getIdentity();
                $role = $user->role;
                $user_id = $user->id;
                $name = $user->name;
            } else {
                $role = 1;
            }
     
            $car = $this->Cars->get($id, [
                'contain' => ['Users', 'Brands','CarReviews'],
            ]);
    
            $revew = $this->CarReviews->find('all')->where(['car_id' => $id])->order(['id' => 'DESC'])->all();
    
            // echo '<pre>';
            // echo ($ratings->star);
            // die;
            $reviews = $this->CarReviews->newEmptyEntity();
            if ($this->request->is('post')) {
    
                $result = $this->CarReviews->find('all')->where(['car_id' => $id, 'user_id' => $user_id])->first();
                if ($result) {
                    $ratings = $this->request->getData('rating');
                    $reviewss = $this->request->getData('review');
                    $result->rating = $ratings;
                    $result->review = $reviewss;
                    if ($this->CarReviews->save($result)) {
                        return $this->redirect(['action' => 'carview', $id]);
                    }
                } else {
                    $reviews = $this->CarReviews->patchEntity($reviews, $this->request->getData());
                    $reviews['user_id'] = $user_id;
                    $reviews['car_id'] = $id;
                    // $rating['user_name'] = $name;
                    if ($this->CarReviews->save($reviews)) {
    
                        return $this->redirect(['action' => 'carview', $id]);
                    }
                }
            }
            $this->set(compact('car', 'role', 'reviews', 'revew'));

        } else {
            return $this->redirect(['action' => 'home']);
        }


    }

    public function caredit($id = null){

        $this->viewBuilder()->setLayout('adminlayout');   

        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $car = $this->Cars->get($id, [
                'contain' => [],
            ]);

        $fileName2 = $car["image"];


    if ($this->request->is(['patch', 'post', 'put'])) {

        $data = $this->request->getData();
        $productImage = $this->request->getData("image");
        $fileName = $productImage->getClientFilename();
        if ($fileName == '') {
            $fileName = $fileName2;
        }
        $fileSize = $productImage->getSize();
        $data["image"] = $fileName;
        $car = $this->Cars->patchEntity($car, $data);
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
            $this->Flash->success(__('The car has been saved.'));

            return $this->redirect(['action' => 'admin']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $users = $this->Cars->Users->find('list', ['limit' => 200])->all();
    $brands = $this->Cars->Brands->find('list', ['limit' => 200])->all();
    $this->set(compact('car', 'users', 'brands'));
    }
}   

    public function cardelete($id = null){

        $this->request->allowMethod(['post', 'delete']);

        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'admin']);
    }

    public function ratingadd($id = null){
        $user = $this->Authentication->getIdentity();
        $user_id = $user->id;
        // $user = $this->Authentication->getIdentity();
        // $uid = $user->id;
        // $username = $this->Users->get($uid);
        // $carReview = $this->CarReviews->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $carReview['name']=$username->name;
        //     // dd($this->request->getData());
        //     $carReview = $this->CarReviews->patchEntity($carReview, $this->request->getData());
        //     if ($this->CarReviews->save($carReview)) {
        //         $this->Flash->success(__('The car review has been saved.'));

        //         return $this->redirect(['controller'=>'users','action' => 'usercarview',$id]);
        //     }
        //     $this->Flash->error(__('The car review could not be saved. Please, try again.'));
        // }
        // $users = $this->CarReviews->Users->find('list', ['limit' => 200])->all();
        // $cars = $this->CarReviews->Cars->find('list', ['limit' => 200])->all();
        // $this->set(compact('carReview', 'users', 'cars'));

        $carReview = $this->CarReviews->newEmptyEntity();
        if ($this->request->is('post')) {
            $result = $this->CarReviews->find('all')->where(['car_id' => $id,'user_id'=>$user_id])->first();
            if ($result) {
                $rating = $this->request->getData('rating');
                $review = $this->request->getData('review');
                $result->rating = $rating;
                $result->review = $review;
                if ($this->CarReviews->save($result)) {
                    return $this->redirect(['action' => 'usercarview', $id]);
                }
            } else {
            $carReview = $this->CarReviews->patchEntity($carReview, $this->request->getData());
            $carReview['user_id']=$user->id;
            $carReview['name']=$user->name;
            $carReview['car_id']=$id;
            // dd($carReview['name']=$username->name);
            if ($this->CarReviews->save($carReview)) {

                $this->Flash->success(__('The car review has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'usercarview',$id]);
            }
            $this->Flash->error(__('The car review could not be saved. Please, try again.'));
            }
        }  
        $this->set(compact('carReview'));

    }

    public function logout()
   {
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $this->Authentication->logout();
        $this->Flash->success(__('sucessful logout'));

        return $this->redirect(['controller' => 'Users', 'action' => 'home']);
    }
   }
}
