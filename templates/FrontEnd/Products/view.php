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
                    <?php foreach ($prd as $value): ?>
                    <div class="thubmnail-recent">
                        <img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?php echo h($value->img) ?>" class="recent-thumb" alt="">
                        <h2><a href="<?php echo Router::url(['_name' => 'product_detail',h($value->id)]); ?>"><?php echo h($value->name) ?></a></h2>
                        <div class="product-sidebar-price">
                            <ins><?= $this->Number->format($value->price) ?> VNĐ</ins> <del>$100.00</del>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Home</a>
                        <a href="">Category Name</a>
                        <a href=""><?php echo h($product->name) ?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo $this->Url->webroot; ?>/frontend/img/<?php echo h($product->img) ?>" alt="">
                                </div>

                                <div class="product-gallery">
                                    <img src="<?php echo $this->Url->webroot; ?>/frontend/img/product-thumb-1.jpg" alt="">
                                    <img src="<?php echo $this->Url->webroot; ?>/frontend/img/product-thumb-2.jpg" alt="">
                                    <img src="<?php echo $this->Url->webroot; ?>/frontend/img/product-thumb-3.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo h($product->name) ?></h2>
                                <div class="product-inner-price">
                                    <ins><?= $this->Number->format($product->price) ?> VNĐ</ins> <del>$100.00</del>
                                </div>

                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p><?php echo h($product->description) ?></p>
                                       </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            <?php foreach ($prd_relate as $prd): ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo $this->Url->webroot; ?>/frontend/img/product-1.jpg" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="<?php echo Router::url(['_name' => 'product_detail',h($prd->id)]); ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo h($prd->name)?>

                                <div class="product-carousel-price">
                                    <ins><?= $this->Number->format($product->price) ?> VNĐ</ins> <del>$100.00</del>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

