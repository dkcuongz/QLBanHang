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
            <?= $this->Form->postLink(
                __('Xóa'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Danh sách sản phẩm'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product,array('enctype'=>'multipart/form-data')) ?>
            <fieldset>
                <legend><?= __('Sửa sản phẩm') ?></legend>
                <?php
                echo $this->Form->control('name', ['label' => 'Tên sản phẩm']);
                echo $this->Form->control('price', ['label' => 'Đơn giá']);
                echo $this->Form->control('description', ['label' => 'Mô tả']);
                echo $this->Form->label('Ảnh');
                echo $this->Form->input('img', array('type'=>'file')); ?>
                <img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?= h($product->img) ?>" alt="<?= h($product->description) ?>" width="200px" class="thumbnail">
                <?php echo $this->Form->control('quantity', ['label' => 'Số lượng']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => "btn btn-success"]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>