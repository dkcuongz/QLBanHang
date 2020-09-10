<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */

use Cake\Routing\Router;
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
        <li <?php if (strpos(Router::url(null, false), "/home")) { ?> class="active" <?php } ?>><a href="/admin/home"><svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Tổng quan</a></li>
        <li <?php if (strpos(Router::url(null, false), "category")) { ?> class="active" <?php } ?>><a href="/admin/category"><svg class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
        <li <?php if (strpos(Router::url(null, false), "product")) { ?> class="active" <?php } ?>><a href="/admin/product"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg> Sản phẩm</a></li>
        <li <?php if (strpos(Router::url(null, false), "order")) { ?> class="active" <?php } ?>><a href="/admin/order"><svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
        <li role="presentation" class="divider"></li>
        <li <?php if (strpos(Router::url(null, false), "user")) { ?> class="active" <?php } ?>><a href="/admin/user"><svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg> Quản lý thành viên</a></li>

    </ul>

</div>