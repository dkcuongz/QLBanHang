<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */

use Cake\Routing\Router;
?>
<?= $this->Flash->render() ?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <?php echo $this->Form->create(null, [
                        'url' => [
                            'controller' => 'Home',
                            'action' => 'search'
                        ]
                    ]); ?>
                    <input name="search" type="text" placeholder="Search products...">
                    <?= $this->Form->button(__('Search')) ?>
                    <?= $this->Form->end() ?>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php foreach ($prd_sell as $prd) : ?>
                        <div class="thubmnail-recent">
                            <img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?= h($prd->img) ?>" class="recent-thumb" alt="">
                            <h2><a href="<?php echo Router::url(['_name' => 'product_detail', h($prd->id)]); ?>"><?= h($prd->name) ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?= $this->Number->format($prd->price) ?> VNĐ</ins> <del>$800.00</del>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <?php foreach ($prd_ran as $prd) : ?>
                            <li><a href="<?php echo Router::url(['_name' => 'product_detail', h($prd->id)]); ?>"><?= h($prd->name) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <?php echo $this->Form->create(null, ['url' => ['controller' => 'Cart', 'action' => 'updateCart']]); ?>
                        <table cellspacing="0" class="shop_table cart">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($Cart)) {
                                    foreach ($Cart as $key => $value) : ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="<?php echo Router::url(['_name' => 'deleteCart', h($key)]); ?>">×</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $this->Url->webroot; ?>/frontend/img/<?php echo h($value['img']); ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo h($value['name']); ?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?= $this->Number->format($value['price']) ?> VNĐ</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <?php
                                                            echo $this->Form->control(
                                                                "",
                                                                [
                                                                    'value' => h($key),
                                                                    'type' => 'hidden',
                                                                    'name'   => 'id_prd[]'
                                                                ]
                                                            );
                                                            echo $this->Form->control(
                                                                "",
                                                                [
                                                                    'value' => h($value['quantity']),
                                                                    'class' => 'input-text qty text',
                                                                    'type' => 'number',
                                                                    'min' => "1",
                                                                    'step' => 1,
                                                                    'name'   => 'quantity[]'
                                                                ]
                                                            );
                                                            ?>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount"><?= $this->Number->format($value['quantity'] * $value['price']) ?>VNĐ</span>
                                            </td>
                                        </tr>
                                <?php endforeach;
                                } else {
                                    echo  h("Giỏ hàng trống!");
                                }
                                ?>
                                <tr>
                                    <td class="actions" colspan="6">
                                        <div class="coupon">
                                            <a class="btn btn-primary" href="<?php echo Router::url(['_name' => 'checkout']); ?>"> Checkout</a>
                                        </div>
                                        <?= $this->Form->button(__('Update'), ['class' => "btn-sm btn-primary"]) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?= $this->Form->end() ?>
                        <div class="cart-collaterals">
                            <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <?php foreach ($prd_new as $prd) : ?>
                                        <li class="product">
                                            <a href="<?php echo Router::url(['_name' => 'product_detail', h($prd->id)]); ?>">
                                                <img width="150px" height="150px" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->Url->webroot; ?>/frontend/img/<?= h($prd->img) ?>">
                                                <h3 style="padding-left: 10px;">Ship Your Idea</h3>
                                                <span style="padding-left: 30px;" class="price"><span class="amount"><?= $this->Number->format($prd->price) ?> VNĐ</span></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"><?= $this->Number->format($total); ?> VNĐ</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>