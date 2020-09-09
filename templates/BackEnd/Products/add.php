<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"><?= __('Sản phẩm') ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm sản phẩm</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                        <aside class="column">
                            <div class="side-nav">
                                <h4 class="heading"><?= __('Actions') ?></h4>
                                <?= $this->Html->link(__('Danh sách sản phẩm'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                            </div>
                        </aside>
                        <div class="column-responsive">
                            <div class="products form content">
                                <?= $this->Form->create($product, array('enctype' => 'multipart/form-data')) ?>
                                <fieldset>
                                    <legend><?= __('Thêm sản phẩm') ?></legend>
                                    <?php
                                    echo $this->Form->control('name', ['label' => 'Tên sản phẩm']);
                                    echo $this->Form->control('price', ['label' => 'Đơn giá']);
                                    echo $this->Form->control('description', ['label' => 'Mô tả']);
                                    echo $this->Form->label('Mô tả chi tiết');
                                    echo $this->Form->input('detail', array('type' => 'textarea', 'name' =>'detail'));
                                    echo $this->Form->label('Ảnh');
                                    echo $this->Form->input('img', array('type' => 'file'));
                                    echo $this->Form->control('quantity', ['label' => 'Số lượng']);
                                    ?>
                                    <script>
                                        CKEDITOR.replace('detail');
                                    </script>
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