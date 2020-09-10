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
        $this->Authentication->allowUnauthenticated(['getCate']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->paginate($this->Products, ['limit' => 8, 'conditions' => ['quantity >' => 0]]);
        $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.qty_sold' => 'DESC']
        ])->all();
        $prd_new = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.created' => 'DESC']
        ])->all();
        $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.updated' => 'DESC']
        ])->all();
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Sản phẩm');
        $this->set('page', 'Shop');
        $this->set(compact('products', 'prd_sell', 'prd_new', 'prd_ran'));
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
        $product = $this->getTableLocator()->get('Products')->find()->where(['id' => $id])->first();
        $prd_relate = $this->getTableLocator()->get('Products')->find()->where(['id' => $product->id])->limit(5);
        $prd = $this->getTableLocator()->get('Products')->find()->limit(5);
        $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.qty_sold' => 'DESC']
        ])->all();
        $prd_new = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.created' => 'DESC']
        ])->all();
        $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.updated' => 'DESC']
        ])->all();
        $this->set(compact('product', 'prd_relate', 'prd', 'prd_sell', 'prd_new', 'prd_ran'));
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Chi tiết sản phẩm');
    }

    /**
     * getCate method
     *
     * @param string|null $id Cate id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getCate($id = null)
    {
        $cate = $this->getTableLocator()->get('Categories')->find()->where(['id' => $id])->first();
        $array_cate = $this->getTableLocator()->get('Categories')->find()->where(['parent' => $id]);
        $array[] = $id;
        foreach ($array_cate as $value) {
            array_push($array, $value->id);
        }
        $products = $this->paginate($this->Products, ['limit' => 8, 'conditions' => ['quantity >' => 0, 'id_cate IN' => $array]]);
        $prd_sell = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.qty_sold' => 'DESC']
        ])->all();
        $prd_new = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.created' => 'DESC']
        ])->all();
        $prd_ran = $this->getTableLocator()->get('Products')->find('all', [
            'order' => ['Products.updated' => 'DESC']
        ])->all();
        $this->viewBuilder()->setLayout('frontend/master/master');
        $this->set('title', 'Sản phẩm');
        $this->set('page', $cate->name);
        $this->set(compact('products', 'prd_sell', 'prd_new', 'prd_ran'));
        $this->render('index');
    }
}
