<?php

$router->get('/', function () use ($router) {
    return date('Y-m-d H:i:s');
});

//店铺
$router->group(['prefix' => '/shop'], function () use ($router) {
    $router->get('dashboard', ['uses' => 'ShopController@dashboard']);
});


//分类
$router->group(['prefix' => '/category'], function () use ($router) {
    //分类列表
    $router->get('list', ['uses' => 'CategoryController@list']);
    $router->post('list', ['uses' => 'CategoryController@list']);
    //分类详情
    //分类详情
});

//品牌
$router->group(['prefix' => '/brand'], function () use ($router) {
});

//商品
$router->group(['prefix' => '/product'], function () use ($router) {
    // 商品详情, 整车使用
    $router->post('detail', ['uses' => 'ProductController@detail']);
    // 商品列表
    $router->post('list', ['uses' => 'ProductController@list']);
});