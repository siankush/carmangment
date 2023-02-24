<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reaction Controller
 *
 * @property \App\Model\Table\ReactionTable $Reaction
 * @method \App\Model\Entity\Reaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReactionController extends AppController
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
        $reaction = $this->paginate($this->Reaction);

        $this->set(compact('reaction'));
    }

    /**
     * View method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reaction = $this->Reaction->get($id, [
            'contain' => ['Users', 'Cars'],
        ]);

        $this->set(compact('reaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function like($id = null)
    {
        $user = $this->Authentication->getIdentity();

        $like = $this->Reaction->find('all')->where(['user_id'=>$user->id,'car_id'=>$id])->toarray();
  
      
        if(!empty($like)){
            $upvote=$this->Reaction->find('all')->where(['user_id'=>$user->id,'car_id'=>$id])->first();
            
          

            if($upvote->upvote == 1){

                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote=0;
                $upvote->downvote=0;

                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'home']);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'home']);
            }
            else{
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote=1;
                $upvote->downvote=0;

                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'home']);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'home']);

            }
            
         }


         $reaction = $this->Reaction->newEmptyEntity();

         $reaction->user_id=$user->id;
         $reaction->car_id=$id;
         $reaction->upvote=1;
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'home']);
                }
            else{

                
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));

                return $this->redirect(['controller'=>'users','action' => 'home']);
            }
    }

    /**
     * Edit method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function dislike($id = null)
    {
        $user = $this->Authentication->getIdentity();

        $like = $this->Reaction->find('all')->where(['user_id'=>$user->id,'car_id'=>$id])->toarray();
  

        if(!empty($like)){
            $upvote=$this->Reaction->find('all')->where(['user_id'=>$user->id,'car_id'=>$id])->first();
            
          

            if($upvote->downvote == 1){

                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote=0;
                $upvote->downvote=0;

                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'home']);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'home']);
            }
            else{
                $upvote = $this->Reaction->patchEntity($upvote, $this->request->getData());
                $upvote->upvote=0;
                $upvote->downvote=1;

                if ($this->Reaction->save($upvote)) {
                    $this->Flash->success(__('The reaction has been saved.'));
    
                    return $this->redirect(['controller'=>'users','action' => 'home']);
                }
                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                return $this->redirect(['controller'=>'users','action' => 'home']);

            }
            
        }

        $reaction = $this->Reaction->newEmptyEntity();

        $reaction->user_id=$user->id;
        $reaction->car_id=$id;
        $reaction->downvote=1;
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'home']);
                }

            else{

                $this->Flash->error(__('The reaction could not be saved. Please, try again.'));

                return $this->redirect(['controller'=>'users','action' => 'home']);
            }
    }

    /**
     * Delete method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reaction = $this->Reaction->get($id);
        if ($this->Reaction->delete($reaction)) {
            $this->Flash->success(__('The reaction has been deleted.'));
        } else {
            $this->Flash->error(__('The reaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
