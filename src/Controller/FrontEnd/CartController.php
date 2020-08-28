<?php
declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;
use Cake\Http\Session;

class CartController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['addToCart', 'deleteCart', 'updateCart']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $this->request->getSession();
        $total = 0;
        $count = count($session->read('cart'));
        foreach ($session->read('cart') as $key => $value){
            $total += $value['price'] * $value['quantity'];
        }
        $this->set('title','Cart');
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('Cart', $session->read('cart'));
        $this->set('total', $total);
        $this->set('count', $count);
        return $this->render('index');
    }

    public  function deleteCart($id = null){
        $session = $this->request->getSession();
        $session->delete("cart.$id");
        $this->redirect(array("controller" => "Cart", "action" => "index"));
    }

    public function addToCart($id = null){
        $session = $this->request->getSession();
        $prd = $this->getTableLocator()->get('Products')->find()->where(['id'=> $id])->first();
        $session = $this->request->getSession();
        if($session->check("cart.$id")) {
            $quantity = $session->read("cart.$id.quantity") + 1;
            $session->write([
                "cart.$id.quantity"=> $quantity,
            ]);
        } else {
                $session->write([
                    "cart.$id" => $id,
                    "cart.$id.name" => $prd->name,
                    "cart.$id.quantity" => "1",
                    "cart.$id.price" => $prd->price,
                    "cart.$id.img" =>$prd->img
                ]);
        }
            $this->redirect(array("controller" => "Cart", "action" => "index"));
    }
    public function updateCart($id = null){
        $session = $this->request->getSession();
        $data = $this->request->getData();
        foreach ($data['id_prd'] as $key => $value) {
            $session->write([
                "cart.$value.quantity"=> $data['quantity'][$key],
            ]);
        }
        $this->redirect(array("controller" => "Cart", "action" => "index"));
    }
}
