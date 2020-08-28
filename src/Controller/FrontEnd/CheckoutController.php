<?php
declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;
use Cake\Http\Session;

class CheckoutController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['getCheckout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
//        $session = $this->request->getSession();
//        $total = 0;
//        $count = count($session->read('cart'));
//        foreach ($session->read('cart') as $key => $value){
//            $total += $value['price'] * $value['quantity'];
//        }
//        $this->set('Cart', $session->read('cart'));
//        $this->set('total', $total);
//        $this->set('count', $count);
        $this->set('title','Checkout');
        $this->viewBuilder()->setLayout('frontend/master/master');
        return $this->render('index');
    }


}
