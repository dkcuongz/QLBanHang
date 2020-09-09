<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $order
 */
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"><?= __('Đơn hàng') ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa đơn hàng</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                        <aside class="column">
                            <div class="side-nav">
                                <h4 class="heading"><?= __('Actions') ?></h4>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $order->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']
                                ) ?>
                                <?= $this->Html->link(__('Danh sách hóa đơn'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                            </div>
                        </aside>
                        <div class="column-responsive">
                            <div class="orders form content">
                                <?= $this->Form->create($order) ?>
                                <fieldset>
                                    <legend><?= __('Edit Order') ?></legend>
                                    <?php
                                    echo $this->Form->control('id_user');
                                    echo $this->Form->control('name');
                                    echo $this->Form->control('phone');
                                    echo $this->Form->control('address');
                                    echo $this->Form->control('total');
                                    echo $this->Form->control('state');
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class' => "btn btn-success"]) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>