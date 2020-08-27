<?php
declare(strict_types=1);

namespace App\Controller\BackEnd;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
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
            $orders = $this->paginate($this->Orders);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Hóa đơn');
            $this->set(compact('orders'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->auth->role == 1 || $this->auth->role == 2) {
            $order = $this->Orders->get($id, [
                'contain' => [],
            ]);
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Chi tiết hóa đơn');
            $this->set(compact('order'));
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
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->viewBuilder()->setLayout('backend/master/master');
        $this->set('title','Thêm hóa đơn');
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->auth->role == 1) {
            $order = $this->Orders->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $order = $this->Orders->patchEntity($order, $this->request->getData());
                if ($this->Orders->save($order)) {
                    $this->Flash->success(__('The order has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
            $this->viewBuilder()->setLayout('backend/master/master');
            $this->set('title', 'Sửa hóa đơn');
            $this->set(compact('order'));
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->auth->role == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $order = $this->Orders->get($id);
            if ($this->Orders->delete($order)) {
                $this->Flash->success(__('The order has been deleted.'));
            } else {
                $this->Flash->error(__('The order could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        } else
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }
}
