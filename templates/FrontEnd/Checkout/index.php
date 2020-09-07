<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */

use Cake\Routing\Router;
?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
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
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$100.00</del>
                        </div>
                    </div>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <div class="woocommerce-info">Returning customer?
                            <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                        </div>

                        <form id="login-form-wrap" class="login collapse" method="post">


                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                            <p class="form-row form-row-first">
                                <label for="username">Username or email <span class="required">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="password">Password <span class="required">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="input-text">
                            </p>
                            <div class="clear"></div>


                            <p class="form-row">
                                <input type="submit" value="Login" name="login" class="button">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                            </p>
                            <p class="lost_password">
                                <a href="#">Lost your password?</a>
                            </p>

                            <div class="clear"></div>
                        </form>
                    </div>
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Checkout', 'action' => 'postCheckout']]); ?>

                    <div id="customer_details" class="col2-set">
                        <div class="col-1">
                            <div class="woocommerce-billing-fields">
                                <h3>Billing Details</h3>
                                <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                    <label class="" for="billing_first_name">Name <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="text" class="input-text form-control" name="name" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                                            echo h($auth->username);
                                                                                                                                        } ?>" />
                                </p>
                                <div class="clear"></div>

                                <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                    <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="text" class="input-text form-control" name="address" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                                                echo h($auth->address);
                                                                                                                                            } ?>" />
                                </p>
                                <div class="clear"></div>

                                <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                    <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="email" class="input-text form-control" name="email" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                                            echo h($auth->email);
                                                                                                                                        } ?>" />
                                </p>

                                <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                    <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="text" class="input-text form-control" name="phone" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                                            echo h($auth->phone);
                                                                                                                                        } ?>" />
                                </p>
                                <div class="clear"></div>

                            </div>
                        </div>

                        <div class="col-2">
                            <br>
                            <br>
                            <p id="order_comments_field" class="form-row notes">
                                <label class="" for="order_comments">Order Notes</label>
                                <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="order_comments"></textarea>
                            </p>
                        </div>

                    </div>

                </div>

                <h3 id="order_review_heading">Your order</h3>

                <div id="order_review" style="position: relative;">
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($Cart)) {
                                foreach ($Cart as $key => $value) : ?>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <?php echo h($value['name']) ?> <strong class="product-quantity">× <?php echo h($value['quantity']) ?></strong> </td>
                                        <td class="product-total">
                                            <span class="amount"><?= $this->Number->format($value['price']) ?> VNĐ</span> </td>
                                    </tr>
                            <?php endforeach;
                            } else {
                                echo  h("Giỏ hàng trống!");
                            } ?>
                        </tbody>
                        <tfoot>

                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td>

                                    Free Shipping
                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                </td>
                            </tr>


                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><strong><span class="amount"><?= $this->Number->format($total) ?> VNĐ</span></strong> </td>
                            </tr>

                        </tfoot>
                    </table>


                    <div id="payment">
                        <div class="form-row place-order">

                            <?= $this->Form->button(__('Place Order')) ?>


                        </div>

                        <div class="clear"></div>

                    </div>
                </div>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>