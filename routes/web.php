<?php

$router->get('/', function () use ($router) {
    return date('Y-m-d H:i:s');
});

$router->group(['prefix' => '/seller'], function () use ($router) {
    // 注册
    $router->get('register', 'SellerController@register');
    $router->post('doRegister', 'SellerController@doRegister');
    $router->get('registerSuccess', 'SellerController@registerSuccess');
    
    // 登陆页面
    $router->get('login', 'SellerController@login');
    $router->post('doLogin', 'SellerController@doLogin');

    // 忘记密码
    $router->get('forget', 'SellerController@forget');
    $router->post('forget', 'SellerController@forget');
    
    // 退出登陆
    $router->get('logout', 'SellerController@logout');
});

//开店向导
$router->group(['prefix' => '/wizard'], function () use ($router) {
    $router->get('choose', 'WizardController@choose');
    $router->get('edition', 'WizardController@edition');
    $router->get('category', 'WizardController@category');
    $router->get('create', 'WizardController@create');
});

//店铺管理
$router->group(['prefix' => '/shop', 'middleware' => 'checkauth'], function () use ($router) {
    $router->get('dashboard', ['uses' => 'ShopController@dashboard']);
    $router->get('list', ['uses' => 'ShopController@lists']);
    $router->get('info', ['uses' => 'ShopController@info']);
    $router->get('infoedit', ['uses' => 'ShopController@infoEdit']);
    $router->get('wizard', ['uses' => 'ShopController@wizard']);
});

//商家地址库管理
$router->group(['prefix' => '/address', 'middleware' => 'checkauth'], function () use ($router) {
    $router->get('list', ['uses' => 'AddressController@lists']);
    $router->get('add', ['uses' => 'AddressController@add']);
});

//员工管理
$router->group(['prefix' => '/staff', 'middleware' => 'checkauth'], function () use ($router) {
    $router->get('list', ['uses' => 'StaffController@lists']);
    $router->get('add', ['uses' => 'StaffController@add']);
});

//门店管理
$router->group(['prefix' => '/store', 'middleware' => 'checkauth'], function () use ($router) {
    $router->get('list', ['uses' => 'StoreController@lists']);
    $router->get('add', ['uses' => 'StoreController@add']);
});



//分类
$router->group(['prefix' => '/category'], function () use ($router) {
    $router->get('list', ['uses' => 'CategoryController@list']);
    $router->post('list', ['uses' => 'CategoryController@list']);
});

//品牌
$router->group(['prefix' => '/brand'], function () use ($router) {
});

//商品
$router->group(['prefix' => '/product'], function () use ($router) {
    $router->get('list', ['uses' => 'ProductController@lists']);
    $router->get('detail', ['uses' => 'ProductController@detail']);
});