<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */
use Cake\Routing\Router;

?>
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End header area -->
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href=""><img src="<?php echo $this->Url->webroot; ?>/frontend/img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.html">Cart - <span class="cart-amunt"><?= $this->Number->format($total) ?> VNĐ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo h($count) ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo Router::url(['_name' => 'home']); ?>">Home</a></li>
                    <li><a href="<?php echo Router::url(['_name' => 'product']); ?>">Shop page</a></li>
                    <li><a href="<?php echo Router::url(['_name' => 'cart']); ?>">Cart</a></li>
                    <li><a href="<?php echo Router::url(['_name' => 'checkout']); ?>">Checkout</a></li>
                    <li><a href="#">Category</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
