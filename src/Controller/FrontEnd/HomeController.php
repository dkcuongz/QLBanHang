<?php
declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;

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
        $this->set('title','Home');
        $this->viewBuilder()->setLayout('frontend/master/master');
        $data = $this->getTableLocator()->get('Products')->find()->limit(10);
        $this->set(compact('data'));
        return $this->render('index');
    }
    public function getProfile($id = null){
        return $this->render('profile');
    }
}
