<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $products
 */
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">

                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                            <table  class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th><?= $this->Paginator->sort('id', 'Mã sản phẩm') ?></th>
                                        <th><?= $this->Paginator->sort('name', 'Tên sản phẩm') ?></th>
                                        <th><?= $this->Paginator->sort('price', 'Đơn giá') ?></th>
                                        <th><?= $this->Paginator->sort('description', 'Mô tả') ?></th>
                                        <th><?= $this->Paginator->sort('img', 'Ảnh sản phẩm') ?></th>
                                        <th><?= $this->Paginator->sort('quantity', 'Số lượng') ?></th>
                                        <th><?= $this->Paginator->sort('created', 'Ngày tạo') ?></th>
                                        <th><?= $this->Paginator->sort('updated', 'Ngày cập nhật') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $this->Number->format($product->id) ?></td>
                                            <td><?= h($product->name) ?></td>
                                            <td><?= $this->Number->format($product->price) ?></td>
                                            <td><?= h($product->description) ?></td>
                                            <td><img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?= h($product->img) ?>" alt="<?= h($product->description) ?>" width="100px" class="thumbnail"></td>
                                            <td><?= $this->Number->format($product->quantity) ?></td>
                                            <td><?= h($product->created) ?></td>
                                            <td><?= h($product->updated) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view', $product->id]) ?>
                                                <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $product->id]) ?>
                                                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <!--/.row-->
        </div>