<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array(
        'Auth' => [
            'authenticate' => [
                'Form',
                'Xety/Cake3CookieAuth.Cookie'
            ]
        ],
        'Cookie',
        'Acl' => array('className' => 'Acl.Acl')
    );

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');


        //B* added
        //$this->loadComponent('Auth');
        
        /*$this->loadComponent('Auth',[
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ]
                    ]
                ],
                'loginAction' => [
                    'controller' => 'mylayout',
                    'action' => 'index'
                ]
            ]); */

        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'plugin' => false,
                'controller' => 'mylayout',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false
            ],
            'authError' => 'Энэ хэсэгт зөвхөн гишүүд нэвтрэх боломжтой!',
            'flash' => [
                'element' => 'error'
            ]
        ]);
        
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

    
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event){
        //$this->Auth->allow();

        //Automaticaly Login.
        if (!$this->Auth->user() && $this->Cookie->read('CookieAuth')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
            } else {
                $this->Cookie->delete('CookieAuth');
            }
        }

        //If you want to update some fields, like the last_login_date, or last_login_ip, just do :
        /*if (!$this->Auth->user() && $this->Cookie->read('CookieAuth')) {
            $this->loadModel('Users');

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                $user = $this->Users->newEntity($user);
                $user->isNew(false);

                //Last login date
                $user->last_login = new Time();
                //Last login IP
                $user->last_login_ip = $this->request->clientIp();
                //etc...

                $this->Users->save($user);
            } else {
                $this->Cookie->delete('CookieAuth');
            }
        }*/
    }

}
