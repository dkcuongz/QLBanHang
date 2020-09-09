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
        $this->set('Cart', $session->read('cart'));
        $this->set('title', 'Checkout');
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
                }
                $this->Flash->error(__('Checkout Successfull.'));
                $connection->commit();
                $session->destroy();
                return  $this->redirect(array("controller" => "Checkout", "action" => "index"));
            }
            $this->Flash->error(__('Nothing to checkout.'));
            return  $this->redirect(array("controller" => "Checkout", "action" => "index"));
        } catch (Exception $e) {
            $connection > rollback();
        }
    }
}
