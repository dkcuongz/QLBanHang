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
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
            return $this->redirect('/');
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
            $cate = $this->getTableLocator()->get('Categories')->find()->where(['parent >' => 0])->all();
            if ($this->request->is('post')) {
                $files =  $this->request->getUploadedFiles();
                $filename = $files['img']->getClientFileName();
                // Read the file data.
                $files['img']->getStream();
                $files['img']->getSize();
                $file_path =   WWW_ROOT . "frontend\img\\$filename";
                // Move the file.
                $files['img']->moveTo($file_path);
                $data = $this->request->getData();
                $data['img'] =  $filename;
                $product = $this->Products->patchEntity($product, $data);
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Thêm sản phẩm');
            $this->set(compact('product', 'cate'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
            $cate = $this->getTableLocator()->get('Categories')->find()->where(['parent >' => 0])->all();
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                if (!empty($this->request->getUploadedFiles()['img']->getClientFileName())) {
                    $files =  $this->request->getUploadedFiles();
                    $filename = $files['img']->getClientFileName();
                    // Read the file data.
                    $files['img']->getStream();
                    $files['img']->getSize();
                    $file_path =   WWW_ROOT . "frontend\img\\$filename";
                    // Move the file.
                    $files['img']->moveTo($file_path);
                    $data['img'] =  $filename;
                } else $data['img'] =  $product->img;
                $product = $this->Products->patchEntity($product, $data);
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sửa sản phẩm');
            $this->set(compact('product', 'cate'));
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
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
        }
        if ($this->auth->role == 2)
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }
}
