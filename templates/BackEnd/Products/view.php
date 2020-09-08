<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Sửa sản phẩm'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Xóa sản phẩm'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Danh sách sản phẩm'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= __('Tên sản phẩm: ') ?><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tên sản phẩm') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Đơn giá') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mô tả') ?></th>
                    <td><?= h($product->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ảnh ') ?></th>
                    <td><img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?= h($product->img) ?>" alt="Áo đẹp" width="100px" class="thumbnail"></td>
                </tr>
                <tr>
                    <th><?= __('Mã sản phẩm') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Số lượng') ?></th>
                    <td><?= $this->Number->format($product->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ngày tạo') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ngày cập nhật') ?></th>
                    <td><?= h($product->updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>