<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $order
 */
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Sửa đơn hàng'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Xóa đơn hàng'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Danh sách đơn hàng'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tên khách hàng') ?></th>
                    <td><?= h($order->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Số điện thoại') ?></th>
                    <td><?= h($order->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Địa chỉ') ?></th>
                    <td><?= h($order->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mã hóa đơn') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Người xác nhận') ?></th>
                    <td><?= $this->Number->format($order->id_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tổng tiền ') ?></th>
                    <td><?= $this->Number->format($order->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trạng thái') ?></th>
                    <td><?php if($order->state == 1) echo "Chưa xác nhận"; else echo "Đã xác nhận";?></td>
                </tr>
                <tr>
                    <th><?= __('Ngày tạo') ?></th>
                    <td><?= h($order->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ngày cập nhật') ?></th>
                    <td><?= h($order->updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>