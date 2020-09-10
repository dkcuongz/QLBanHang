<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $category
 */
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"><?= __('Danh mục') ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách mục</div>
                <div class="panel-body">
                    <div>
                        <?= $this->Flash->render() ?>
                        <div class="categories index content">
                            <aside class="column">
                                <div class="side-nav">
                                    <h4 class="heading"><?= __('Actions') ?></h4>
                                    <?= $this->Html->link(__('Sửa danh mục'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
                                    <?= $this->Form->postLink(__('Xóa danh mục'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
                                    <?= $this->Html->link(__('Danh sách danh mục'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                                    <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
                                </div>
                            </aside>
                            <div class="column-responsive">
                                <div class="categories view content">
                                    <h3><?= h($category->name) ?></h3>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th><?= __('Tên danh mục') ?></th>
                                            <td><?= h($category->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Mã danh mục') ?></th>
                                            <td><?= $this->Number->format($category->id) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Danh mục cha') ?></th>
                                            <td><?= h($category->parent_category->name) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>