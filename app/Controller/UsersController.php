<?php
/*This controler contains functions for login, logout, edit, index, add, edit and delete*/
class UsersController extends AppController
{

    public $uses = array('Video','User');

    /*La fonction beforeFilter() est exécutée avant chaque action du controller. C’est un endroit pratique pour vérifier le statut d’une session ou les permissions d’un utilisateur.*/
    public function beforeFilter()
    {
        $this->Auth->allow('add', 'logout', 'login2');
        parent::beforeFilter();
    }

    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }



    /*public function login()
    {   //debug($this->Session->read());
        //if already logged-in, redirect²
        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'index'));
        }

        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, ' . $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }*/

    public function login() {
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                // did they select the remember me checkbox?
                if ($this->request->data['User']['remember_me'] == 1) {
                    // remove "remember me checkbox"
                    unset($this->request->data['User']['remember_me']);

                    // hash the user's password
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

                    // write the cookie
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }

                return $this->redirect($this->Auth->redirect());

            } else {
                $this->Session->setFlash(__('Username or password is incorrect.'));
            }
        }

        $this->set(array(
            'title_for_layout' => 'Login'
        ));
    }



    public function user() {
        $this->set('user',$this->Auth->user());
        $d['videos'] = $this->Video->find('all', array('conditions' => array("Video.users_id " => $this->Auth->User('id'))));
        $this->set($d);
    }

    public function logout() {
        // clear the cookie (if it exists) when logging out
        $this->Cookie->delete('remember_me_cookie');

        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $user = array('username'=>$this->request->data['User']['username'],
                    'password'=>$this->Auth->password($this->request->data['User']['password']),
                    'mail'=>$this->request->data['User']['mail']);
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($user)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit()
    {
        $this->User->id = $this->Auth->User('id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }

        $user = array('username'=>$this->request->data['User']['username'],
                    'password'=>$this->Auth->password($this->request->data['User']['password']),
                    'mail'=>$this->request->data['User']['mail']);

        if ($this->request->is('post') || $this->request->is('put')) {
            var_dump($this->request->data);
            if ($this->User->save($user)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                $this->Auth->logout();
                $this->Auth->login();
                return $this->redirect(array('action' => 'user'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null)
    {
        // Avant 2.5, utilisez
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }

}

?>