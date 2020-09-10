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
        $data = $this->getTableLocator()->get('Products')->find()->where(['quantity >' => 0])->limit(10);
        $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.qty_sold' => 'DESC']
        ])->limit(4);
        $prd_new = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.created' => 'DESC']
        ])->limit(4);
        $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.updated' => 'DESC']
        ])->limit(4);
        $this->set(compact('data', 'prd_sell', 'prd_new', 'prd_ran'));
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

    public function search()
    {
        $data = $this->request->getData();
        if (!empty($data['search'])) {
            $products = $this->getTableLocator()->get('Products')->find('all', [
                'conditions' => [['name LIKE' => '%' . $data['search'] . '%']]
            ])->all();
            $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
                'order' => ['Products.qty_sold' => 'DESC']
            ])->limit(4);
            $prd_new = $this->getTableLocator()->get('Products')->find('all', [
                'order' => ['Products.created' => 'DESC']
            ])->limit(4);
            $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
                'order' => ['Products.updated' => 'DESC']
            ])->limit(4);
            $this->viewBuilder()->setLayout('frontend/master/master');
            $this->set('title', 'Sản phẩm');
            $this->set('page', 'Shop');
            $this->set(compact('products', 'prd_sell', 'prd_new', 'prd_ran'));
            return $this->render('search');
            $this->Flash->error(__('Data not found!'));
            return  $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Nothing to search.'));
            return  $this->redirect($this->referer());
        }
    }
}
