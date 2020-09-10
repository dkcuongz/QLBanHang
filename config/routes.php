<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', ['prefix' => 'FrontEnd'], function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Home', 'action' => 'index', 'index'], ['_name' => 'home']);
    $builder->connect('procduct/detail/*', ['controller' => 'Product', 'action' => 'view'], ['_name' => 'product_detail']);
    $builder->connect('procduct', ['controller' => 'Product', 'action' => 'index'], ['_name' => 'product']);
    $builder->connect('add_cart/*', ['controller' => 'Cart', 'action' => 'addToCart'], ['_name' => 'quick_add_cart']);
    $builder->connect('del_cart/*', ['controller' => 'Cart', 'action' => 'deleteCart'], ['_name' => 'deleteCart']);
    $builder->connect('cart', ['controller' => 'Cart', 'action' => 'index'], ['_name' => 'cart']);
    $builder->connect('users/profile', ['controller' => 'Home', 'action' => 'getProfile'], ['_name' => 'profile']);
    $builder->connect('checkout', ['controller' => 'Checkout', 'action' => 'index'], ['_name' => 'checkout']);
    $builder->connect('postcheckout', ['controller' => 'Checkout', 'action' => 'postCheckout'], ['_name' => 'postCheckout']);
    $builder->connect('getCate/*', ['controller' => 'Product', 'action' => 'getCate'], ['_name' => 'getCate']);
    $builder->fallbacks();
});

$routes->scope('/admin', ['prefix' => 'BackEnd'], function (RouteBuilder $builder) {
    $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout'], ['_name' => 'logout']);
    $builder->connect('/home', ['controller' => 'Home', 'action' => 'index', 'index']);
    $builder->connect('/user', ['controller' => 'Users', 'action' => 'index', 'index']);
    $builder->connect('/category', ['controller' => 'Categories', 'action' => 'index', 'index']);
    $builder->connect('/product', ['controller' => 'Products', 'action' => 'index', 'index']);
    $builder->connect('/order', ['controller' => 'Orders', 'action' => 'index', 'index']);
    $builder->connect('/order/view-detail/*', ['controller' => 'Orders', 'action' => 'viewDetail', 'index']);
    $builder->connect('/orders/approval-order/{id}', ['controller' => 'Orders', 'action' => 'approvalOrder', ['_name' => 'approvalOrder']]);
    $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login', 'login'], ['_name' => 'login']);
    $builder->fallbacks();
});
