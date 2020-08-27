<?php
declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;
use Cake\Http\Session;
/**
 * Products Controller
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['addToCart']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('title','Cart');
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set(compact('data'));
        return $this->render('index');
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->getTableLocator()->get('Products')->find()->where(['id'=> $id])->first();
        $prd_relate = $this ->getTableLocator()->get('Products')->find()->where(['id_cate'=> $product->id])->limit(5);
        $cate = $this ->getTableLocator()->get('Categories')->find()->where(['id'=> $product->id_cate])->limit(5);
        $prd = $this->getTableLocator()->get('Products')->find()->limit(5);
        $this->set(compact('product', 'prd_relate', 'prd', 'cate'));
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Chi tiết sản phẩm');
    }
    public function addToCart($id = null){
        $session = $this->request->getSession();
        $prd = $this->getTableLocator()->get('Products')->find()->where(['id'=> $id])->first();
        $session = $this->request->getSession();
        if($session->check("cart.$id")) {
            $session->write([
                "cart.$id.quantity"=> $session->read("cart.$id.quantity") + 1,
            ]);
        }
        $session->write([
            'cart' => $id,
            "cart.$id.quantity"=> "1",
            "cart.$id.price"=> $prd->price
        ]);
            $this->redirect(array("controller" => "Cart",
            "action" => "index"));
    }
}
