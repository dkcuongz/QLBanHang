<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $orders
 */
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"><?= __('Orders') ?></li>
        </ol>
    </div>
    <h3><?= __('Orders') ?></h3>
    <!--/.row-->
    <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th><?= $this->Paginator->sort('id', 'Mã đơn hàng') ?></th>
                                        <th><?= $this->Paginator->sort('id_user', 'Mã khách hàng') ?></th>
                                        <th><?= $this->Paginator->sort('name', 'Tên khách hàng') ?></th>
                                        <th><?= $this->Paginator->sort('phone', 'Mã đơn hàng') ?></th>
                                        <th><?= $this->Paginator->sort('address', 'Địa chỉ ') ?></th>
                                        <th><?= $this->Paginator->sort('total', 'Tổng tiền') ?></th>
                                        <th><?= $this->Paginator->sort('state', 'Trạng thái') ?></th>
                                        <th><?= $this->Paginator->sort('created', 'Ngày tạo') ?></th>
                                        <th><?= $this->Paginator->sort('updated', 'Ngày cập nhật') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><?= $this->Number->format($order->id) ?></td>
                                            <td><?= $this->Number->format($order->id_user) ?></td>
                                            <td><?= h($order->name) ?></td>
                                            <td><?= h($order->phone) ?></td>
                                            <td><?= h($order->address) ?></td>
                                            <td><?= $this->Number->format($order->total) ?></td>
                                            <td><?php if ($order->state == 1) echo "Chưa xác nhận";
                                                    else echo "Đã xác nhận"; ?></td>
                                            <td><?= h($order->created) ?></td>
                                            <td><?= h($order->updated) ?></td>
                                            <td class="actions">
                                                <?php if ($order->state == 1)  echo $this->Html->link(__('Duyệt đơn'), ['action' => 'approvalOrder', $order->id]); ?>
                                                <?= $this->Html->link(__('Xem'), ['action' => 'view', $order->id]) ?>
                                                <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'viewDetail', $order->id]) ?>
                                                <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $order->id]) ?>
                                                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!-- a -->