<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */
use Cake\Routing\Router;
?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $prd): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?php echo h($prd->img) ?>" alt="">
                        </div>
                        <h2><a href="<?php echo Router::url(['_name' => 'product_detail',h($prd->id)]); ?>"><?php echo h($prd->name) ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?= $this->Number->format($prd->price) ?> VNĐ</ins> <del>$999.00</del>
                        </div>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" quantity="1" id="<?php echo h($prd->id) ?>" href="<?php echo Router::url(['_name' => 'quick_add_cart',h($prd->id)]); ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                              <?= $this->Paginator->first('<< ' . __('first')) ?>
                              <?= $this->Paginator->prev('< ' . __('previous')) ?>
                              <?= $this->Paginator->numbers() ?>
                              <?= $this->Paginator->next(__('next') . ' >') ?>
                              <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </li>
                          </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


