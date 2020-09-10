<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
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
                <div class="panel-heading">Danh sách thành viên</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                    <?= $this->Flash->render() ?>
                            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th><?= $this->Paginator->sort('id', 'Mã') ?></th>
                                        <th><?= $this->Paginator->sort('username', 'Tên') ?></th>
                                        <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                                        <th><?= $this->Paginator->sort('password', 'Mật khẩu') ?></th>
                                        <th><?= $this->Paginator->sort('role', 'Chức năng') ?></th>
                                        <th><?= $this->Paginator->sort('phone', 'Số điện thoại') ?></th>
                                        <th><?= $this->Paginator->sort('address', 'Địa chỉ') ?></th>
                                        <th><?= $this->Paginator->sort('created', 'Ngày tạo') ?></th>
                                        <th><?= $this->Paginator->sort('modified', 'Ngày cập nhật') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $this->Number->format($user->id) ?></td>
                                            <td><?= h($user->username) ?></td>
                                            <td><?= h($user->email) ?></td>
                                            <td><?php echo str_replace($user->password, $user->password, "************");  ?></td>
                                            <td><?php if ($user->role == 1) echo "Admin";
                                                    if ($user->role == 2) echo "Nhân viên";
                                                    if ($user->role == 3) echo "Khách hàng"; ?></td>
                                            <td><?= h($user->phone) ?></td>
                                            <td><?= h($user->address) ?></td>
                                            <td><?= h($user->created) ?></td>
                                            <td><?= h($user->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view', $user->id]) ?>
                                                <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $user->id]) ?>
                                                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
        </div>
    </div>
</div>