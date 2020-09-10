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
                <div class="panel-heading">Thêm danh mục</div>
                <div class="panel-body">
                    <div>
                        <?= $this->Flash->render() ?>
                        <div>
                            <aside class="column ">
                                <div class="side-nav">
                                    <h4 class="heading"><?= __('Actions') ?></h4>
                                    <?= $this->Html->link(__('Danh sách danh mục'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                                </div>
                            </aside>
                            <div class="column-responsive ">
                                <div class="categories form content col-80">
                                    <?= $this->Form->create($category) ?>
                                    <fieldset>
                                        <legend><?= __('Add Category') ?></legend>
                                        <?php
                                        echo $this->Form->control('name');
                                        echo $this->Form->control('parent');
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