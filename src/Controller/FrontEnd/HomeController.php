<?php

declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\Locator\LocatorAwareTrait;
use App\Model\Entity\User;

class HomeController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Data');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('title', 'Home');
        $this->viewBuilder()->setLayout('frontend/master/master');
        $data = $this->getTableLocator()->get('Products')->find()->limit(10);
        $this->set(compact('data'));
        return $this->render('index');
    }
    public function getProfile($id = null)
    {
        $this->set('title', 'Profile');
        $this->viewBuilder()->setLayout('frontend/master/master');
        return $this->render('profile');
    }
    public function postUser($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $data = $this->request->getData();
        $userTable = $this->getTableLocator()->get('Users');
        $user = $userTable->get($this->auth->id);
        $user->username = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        if ($data['password'] != "" && password_verify($data['password'], $user->password) && $data['newpassword'] != "" && $data['confirmpassword'] != "") {
            if ($data['newpassword'] == $data['confirmpassword']) {
                $user->password = $data['newpassword'];
            } else
                $this->Flash->error(__('Password confirm not correct wrong. Please, try again.'));
        } elseif ($data['password'] != "" && !password_verify($data['password'], $user->password)) {
            $this->Flash->error(__('Password not correct. Please, try again.'));
        }
        $userTable->save($user, ['checkRules' => false, 'atomic' => false]);
        return  $this->redirect(array("controller" => "Home", "action" => "getProfile"));
    }
}
