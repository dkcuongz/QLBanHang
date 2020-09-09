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
                <div class="panel-heading">Sửa danh mục</div>
                <div class="panel-body">
                    <div>
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                        <div>
                            <aside class="column">
                                <div class="side-nav">
                                    <h4 class="heading"><?= __('Actions') ?></h4>
                                    <?= $this->Form->postLink(
                                        __('Xóa danh mục'),
                                        ['action' => 'delete', $category->id],
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']
                                    ) ?>
                                    <?= $this->Html->link(__('Danh sách danh mục'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                                </div>
                            </aside>
                            <div class="column-responsive">
                                <div class="categories form content">
                                    <?= $this->Form->create($category) ?>
                                    <fieldset>
                                        <legend><?= __('Sửa danh mục') ?></legend>
                                        <?php
                                        echo $this->Form->control('name');
                                        echo $this->Form->control('parent', $options);
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
</div>