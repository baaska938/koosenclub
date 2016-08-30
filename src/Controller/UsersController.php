<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	/*
	public function add(){
		//$this->autoRender = false;
		if($this->request->is('post')){
			$user = $this->Users->newEntity();
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)){
				return $this->redirect(array('controller' => 'mylayout', 'action' => 'index'));
			}
		}
	}

	public function read(){
		$this->autoRender = false;
		if($this->request->is('post')){
			$user = $this->Users->newEntity();
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)){
				return $this->redirect(array('controller' => 'mylayout', 'action' => 'index'));
			}
		}
	}*/

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('mylayout');
    }
    
    public function index()
    {
        $this->viewBuilder()->layout('default');

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('default');
    	/*
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Educations', 'Events', 'Posts', 'Profiles', 'Works']
        ]);*/

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(array('controller' => 'mylayout', 'action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        //$this->set(compact('user'));
        //$this->set('_serialize', ['user']);
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('default');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
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

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user); 
                return $this->redirect(['controller' => 'mylayout','action' => 'question']);
            }
            //Bad login
            $this->Flash->error('Incorrect login');
        }
    }

    public function register(){

    }

    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }

    public function beforeFilter(Event $event){
        //$this->Auth->allow('login');
        $this->Auth->allow();
    }
}
