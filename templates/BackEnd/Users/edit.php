<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"><?= __('Thành viên') ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa thành viên</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                        <aside class="column">
                            <div class="side-nav">
                                <h4 class="heading"><?= __('Actions') ?></h4>
                                <?= $this->Form->postLink(
                                    __('Xóa'),
                                    ['action' => 'delete', $user->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
                                ) ?>
                                <?= $this->Html->link(__('Danh sách thành viên'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                            </div>
                        </aside>
                        <div class="column-responsive">
                            <div class="users form content">
                                <?= $this->Form->create($user) ?>
                                <fieldset>
                                    <legend><?= __('Sửa thành viên') ?></legend>
                                    <?php
                                    echo $this->Form->control('username', ['label' => 'Tên']);
                                    echo $this->Form->control('email', ['label' => 'Email']);
                                    echo $this->Form->control('password', ['label' => 'Mật Khẩu']);
                                    echo $this->Form->label('Chức năng');
                                    $role = ['1' => 'Admin', '2' => 'Nhân viên', '3' => 'Khách hàng'];
                                    echo $this->Form->select('role', $role, ['default' => "$user->role"]);
                                    echo $this->Form->control('phone', ['label' => 'Số điện thoại']);
                                    echo $this->Form->control('address', ['label' => 'Địa chỉ']);
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