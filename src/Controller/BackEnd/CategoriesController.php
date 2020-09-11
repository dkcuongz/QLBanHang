<?php

declare(strict_types=1);

namespace App\Controller\BackEnd;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
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
        if ($this->auth->role == 1) {
            $categories = $this->paginate($this->Categories, [
                'contain' => ['ParentCategories'],
            ]);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Danh mục');
            $this->set(compact('categories'));
        }
        if ($this->auth->role == 2) {
            $this->Flash->error(__('You do not permission.'));
            return $this->redirect($this->referer());
        }
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->auth->role == 1) {
            $category = $this->Categories->get($id, [
                'contain' => ['ParentCategories'],
            ]);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Chi tiết danh mục');
            $this->set(compact('category'));
        }
        if ($this->auth->role == 2) {
            $this->Flash->error(__('You do not permission.'));
            return $this->redirect($this->referer());
        }
        if ($this->auth->role != 1 && $this->auth->role != 2)
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
            $category = $this->Categories->newEmptyEntity();
            if ($this->request->is('post')) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Thêm danh mục');
            $this->set(compact('category'));
        }
        if ($this->auth->role == 2) {
            $this->Flash->error(__('You do not permission.'));
            return $this->redirect($this->referer());
        }
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->auth->role == 1) {
            $category = $this->Categories->get($id, [
                'contain' => ['ParentCategories'],
            ]);
            $categories = $this->Categories->find()->all();
            $options = array(
                'options' =>
                array()
            );
            foreach ($categories as $value) {
                $options['options'][$value->id] = $value->name;
            }
            if ($this->request->is(['patch', 'post', 'put'])) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sửa danh mục');
            $this->set(compact('category', 'options'));
        }
        if ($this->auth->role == 2) {
            $this->Flash->error(__('You do not permission.'));
            return $this->redirect($this->referer());
        }
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->auth->role == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $category = $this->Categories->get($id);
            if ($this->Categories->delete($category)) {
                $this->Flash->success(__('The category has been deleted.'));
            } else {
                $this->Flash->error(__('The category could not be deleted. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            return $this->redirect(['action' => 'index']);
        }
        if ($this->auth->role == 2) {
            $this->Flash->error(__('You do not permission.'));
            return $this->redirect($this->referer());
        }
        if ($this->auth->role != 1 && $this->auth->role != 2)
            return $this->redirect('/');
    }
}
