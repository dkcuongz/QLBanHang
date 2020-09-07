<?php

declare(strict_types=1);

namespace App\Controller\BackEnd;

use App\Controller\AppController;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if ($this->auth->role == 1 || $this->auth->role == 2) {
            $this->set('title', 'Home');
            $this->viewBuilder()->setLayout('backend/master/master');
            return $this->render('index');
        } else
            return $this->redirect('/');
    }
}
