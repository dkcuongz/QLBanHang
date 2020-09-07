<?php

declare(strict_types=1);

namespace App\Controller\BackEnd;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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
            $products = $this->paginate($this->Products);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sản phẩm');
            $this->set(compact('products'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
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
        if ($this->auth->role == 1 || $this->auth->role == 2) {
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Chi tiết sản phẩm');
            $this->set(compact('product'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->auth->role == 1) {
            $product = $this->Products->newEmptyEntity();
            if ($this->request->is('post')) {
                $product = $this->Products->patchEntity($product, $this->request->getData());
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Thêm sản phẩm');
            $this->set(compact('product'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->auth->role == 1) {
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $product = $this->Products->patchEntity($product, $this->request->getData());
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sửa sản phẩm');
            $this->set(compact('product'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->auth->role == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $product = $this->Products->get($id);
            if ($this->Products->delete($product)) {
                $this->Flash->success(__('The product has been deleted.'));
            } else {
                $this->Flash->error(__('The product could not be deleted. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            return $this->redirect(['action' => 'index']);
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }
}
