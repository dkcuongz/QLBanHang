<?php

declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;
use Cake\Http\Session;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

class CheckoutController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['getCheckout', 'postCheckout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $this->request->getSession();
        $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.qty_sold' => 'DESC']
        ])->limit(4);
        $prd_new = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.created' => 'DESC']
        ])->limit(4);
        $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.updated' => 'DESC']
        ])->limit(4);
        $this->set('Cart', $session->read('cart'));
        $this->set('title', 'Checkout');
        $this->set(compact('prd_sell', 'prd_new', 'prd_ran'));
        $this->viewBuilder()->setLayout('frontend/master/master');
        return $this->render('index');
    }

    public function postCheckout()
    {
        try {
            $connection = ConnectionManager::get('default');
            $connection->begin();
            $data = $this->request->getData();
            $session = $this->request->getSession();
            if ($session->check('cart')) {
                $ordersTable = $this->getTableLocator()->get('Orders');
                $order = $ordersTable->newEmptyEntity();
                $order->id_user = 1;
                $order->name = $data['name'];
                $order->email = $data['email'];
                $order->address = $data['address'];
                $order->phone = $data['phone'];
                $order->state = 1;
                $order->total = $this->Data->getTotal($session);
                $order->created = Time::now();
                $ordersTable->save($order);
                foreach ((array) $session->read('cart') as $key => $value) {
                    $orderdtailsTable = $this->getTableLocator()->get('OrderDetail');
                    $orderdtails = $orderdtailsTable->newEmptyEntity();
                    $orderdtails->id_order = $order->id;
                    $orderdtails->id_product = $key;
                    $orderdtails->quantity = $value['quantity'];
                    $orderdtails->price = $value['price'];
                    $orderdtailsTable->save($orderdtails);
                    $productTable = $this->getTableLocator()->get('Products');
                    $prd = $productTable->find()->where(['id' => $key])->first();
                    $prd->quantity = $prd->quantity - $value['quantity'];
                    $prd->qty_sold = $prd->qty_sold + $value['quantity'];
                    $productTable->save($prd);
                }
                $connection->commit();
                $session->destroy();
                $this->Flash->success(__('Checkout Successfull.'));
                return  $this->redirect(array("controller" => "Checkout", "action" => "index"));
            }
            $this->Flash->error(__('Nothing to checkout.'));
            return  $this->redirect(array("controller" => "Checkout", "action" => "index"));
        } catch (Exception $e) {
            $connection > rollback();
        }
    }
}
