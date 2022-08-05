<?php
namespace App\Controller;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        $this->Security->setConfig('unlockedActions', [
            'login',
        ]);
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['signup']);
    }


    public function index() {
    }

    public function login() {
        // echo "loin";
        // die;

        if($this->Auth->user()) {
            return $this->redirect('/');
        }

        if($this->request->is('post')) {
            $postData = $this->request->getData();
            if($postData['email'] != '' && $postData['password'] != '') {
                $this->loadModel('Users');
                $user = $this->Auth->identify();
                if($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect('/');
                } else {
                    $this->Flash->error(__("Invalid email or password. Try again!!"));
                }
            } else {
                $this->Flash->error("Required fields are missing!");
            }
        } 
    }

    public function logout() {
        $this->Flash->success(__("Logged out successfully"));
        $this->Auth->logout();
        return $this->redirect('/');
    }

    public function signup() {
        if($this->request->is('post')) {
            $postData = $this->request->getData();
            // echo "<pre>";
            // print_r($postData);
            // die;

            if($postData['email'] != '' && $postData['name'] != '' && $postData['password'] != '') {
                $this->loadModel('Users');
                $emailExist = $this->Users->find('all', [
                    'conditions' => [
                        'email' => $postData['email']
                    ]
                ])->hydrate(false)->first();

                if(empty($emailExist)) {

                    $userTblData = [
                        'name' => $postData['name'],
                        'username' => $postData['email'],
                        'email' => $postData['email'],
                        'password' => $postData['password'],
                    ];
                    $userTblEnt = $this->Users->newEntity($userTblData);
                    $this->Users->save($userTblEnt);
                    // echo ""; die;
                    $this->Flash->success("Signup successful!");
                    return $this->redirect('/');

                } else {
                    $this->Flash->error("Email already exists!");
                }

            } else {
                $this->Flash->error("Required fields are missing!");
            }
        }
    }
}
