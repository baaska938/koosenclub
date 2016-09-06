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
    public function beforeFilter(Event $event){
        //$this->Auth->allow();
        $this->Auth->allow(['login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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

    public function login() {
        $this->viewBuilder()->layout('mylayout');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($this->request->data('remember_me')) {
                    $this->Cookie->configKey('CookieAuth', [
                        'expires' => '+1 second',
                        'httpOnly' => true
                    ]);
                    $this->Cookie->write('CookieAuth', [
                        'username' => $this->request->data('username'),
                        'password' => $this->request->data('password')
                    ]);
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Хэрэглэгчийн нэр, нууц үг буруу байна!'));
        }
    }

    public function logout() {
        $this->Flash->success(__('Баяртай!'));
        $this->redirect($this->Auth->logout());
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Educations', 'Events', 'Posts', 'Profiles', 'Works']
        ]);

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
                $this->Flash->success(__('Шинэ хэрэглэгч амжилттай хадгалагдлаа.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Амжилтгүй боллоо. Дахин оролдно уу!'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Өөрчлөлт амжилттай хадгалагдлаа.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Өөрчлөлт амжитгүй боллоо. Дахин оролдно уу!'));
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
            $this->Flash->success(__('Амжилттай усгагдлаа.'));
        } else {
            $this->Flash->error(__('Устгах үйлдэл амжитгүй боллоо. Дахин оролдно уу!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
