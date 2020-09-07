<?php

declare(strict_types=1);

namespace App\Controller\FrontEnd;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
{
    protected $name = "Products";
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
        $products = $this->paginate($this->Products);
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Sản phẩm');
        $this->set(compact('products'));
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
        //        $prd = $this->Data->getLst('Products');
        //        dd($prd);
        $product = $this->getTableLocator()->get('Products')->find()->where(['id' => $id])->first();
        $prd_relate = $this->getTableLocator()->get('Products')->find()->where(['id_cate' => $product->id])->limit(5);
        $cate = $this->getTableLocator()->get('Categories')->find()->where(['id' => $product->id_cate])->limit(5);
        $prd = $this->getTableLocator()->get('Products')->find()->limit(5);
        $this->set(compact('product', 'prd_relate', 'prd', 'cate'));
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Chi tiết sản phẩm');
    }
}
