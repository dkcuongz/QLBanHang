<?php

declare(strict_types=1);

namespace App\Controller\BackEnd;

use App\Controller\AppController;
use Cake\Http\Session;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'forgotPassword']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            if ($result = $this->Authentication->getResult()->getData()->id == 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Home',
                    'action' => 'index',
                ]);
            }
            if ($result = $this->Authentication->getResult()->getData()->id != 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'prefix' => 'FrontEnd',
                    'controller' => 'Home',
                    'action' => 'index',
                ]);
            }
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
        $this->viewBuilder()->disableAutoLayout();
        $this->set('title', 'Đăng nhập');
        return $this->render('login');
    }

    public function logout()
    {

        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if ($this->auth->role == 1) {
            $users = $this->paginate($this->Users);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Thành viên');
            $this->set(compact('users'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
        if ($this->auth->role == 1) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Chi tiết thành viên');
            $this->set(compact('user'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->auth->role == 1) {
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Thêm thành viên');
            $this->set(compact('user'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
        if ($this->auth->role == 1) {
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
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sửa thành viên');
            $this->set(compact('user'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
        if ($this->auth->role == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        $data = $this->request->getData();
        if ($this->request->is('post')) {
            if($data['password'] == $data['re_pass']){
                $user = $this->Users->patchEntity($user, $data, ['fieldList' => [ 'name', 'email', 'phone', 'address', 'password']]);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->viewBuilder()->disableAutoLayout();
        $this->set('title', 'Đăng kí thành viên');
        return $this->render('register');
    }
    public function forgotPassword()
    {
        // $user = $this->Users->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $user = $this->Users->patchEntity($user, $this->request->getData());
        //     if ($this->Users->save($user)) {
        //         $this->Flash->success(__('The user has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }
        $this->viewBuilder()->disableAutoLayout();
        $this->set('title', 'Lấy lại mật khẩu');
        return $this->render('forgotpassword');
    }
}
