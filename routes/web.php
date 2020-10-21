<?php

$router->group(['prefix' => '/'], function () use ($router) {
    $router->any('/', 'ShopController@lists');
    $router->any('login', 'SiteController@login');
    $router->any('register', 'SiteController@register');
    $router->any('forget', 'SellerController@forget');
    $router->get('logout', 'SiteController@logout');
    $router->any('menu', 'MenuController@get');
});

//店铺管理
$router->group(['prefix' => '/shop', 'middleware' => 'checkauth'], function () use ($router) {

    $router->get('dashboard', ['uses' => 'ShopController@dashboard']);  //[Page] - 店铺管理首页
    $router->get('list', ['uses' => 'ShopController@lists']);           //[Page] - 卖家店铺列表页
    $router->get('info', ['uses' => 'ShopController@info']);            //[Page] - 店铺详情页
    $router->get('edit', ['uses' => 'ShopController@edit']);            //[Api]  - 编辑店铺接口
    $router->post('create', ['uses' => 'ShopController@create']);          //[Api]  - 创建店铺接口

    //店铺创建向导
    $router->group(['prefix' => '/wizard'], function () use ($router) {
        $router->get('choose', 'WizardController@choose');      //[Page] - 选择店铺类型页
        $router->get('info', 'WizardController@info');          //[Page] - 填写店铺基本信息表单页
        $router->get('success', 'WizardController@success');    //[Page] - 店铺创建成功页面
    });

    //店铺发货地址库管理
    $router->group(['prefix' => '/address'], function () use ($router) {
        $router->get('list', ['uses' => 'AddressController@lists']);
        $router->get('add', ['uses' => 'AddressController@add']);
    });

    //店铺员工管理
    $router->group(['prefix' => '/staff'], function () use ($router) {
        $router->any('list', ['uses' => 'StaffController@lists']);
        $router->get('getlist', ['uses' => 'StaffController@getStaffList']);
        $router->get('add', ['uses' => 'StaffController@add']);
    });

    //店铺关联线下门店管理
    $router->group(['prefix' => '/store', 'middleware' => 'checkauth'], function () use ($router) {
        $router->get('list', ['uses' => 'StoreController@lists']);
        $router->get('add', ['uses' => 'StoreController@add']);
    });
});

$router->group(['prefix' => '/setting/product'], function () use ($router) {
    //分类
    $router->group(['prefix' => '/category'], function () use ($router) {
        $router->get('list', ['uses' => 'CategoryController@lists']);
        $router->post('add', ['uses' => 'CategoryController@add']);
        $router->post('subadd', ['uses' => 'CategoryController@subadd']);
        $router->post('del', ['uses' => 'CategoryController@del']);
        $router->get('edit', ['uses' => 'CategoryController@edit']);
        $router->post('get', ['uses' => 'CategoryController@get']);
        $router->post('sub', ['uses' => 'CategoryController@sub']);
        $router->post('attrs', ['uses' => 'CategoryController@attrs']);
        $router->get('select', ['uses' => 'CategoryController@select']);
    });

    //品牌
    $router->group(['prefix' => '/brand'], function () use ($router) {
        $router->any('list', ['uses' => 'BrandController@lists']);
        $router->post('add', ['uses' => 'BrandController@add']);
        $router->post('subadd', ['uses' => 'BrandController@subadd']);
        $router->post('del', ['uses' => 'BrandController@del']);
        $router->get('edit', ['uses' => 'BrandController@edit']);
        $router->post('get', ['uses' => 'BrandController@get']);
    });
    //商品属性
    $router->group(['prefix' => '/attrs'], function () use ($router) {
        $router->any('list', ['uses' => 'AttrsController@lists']);
        $router->any('add', ['uses' => 'AttrsController@create']);
        $router->any('edit', ['uses' => 'AttrsController@edit']);
        $router->any('get', ['uses' => 'AttrsController@get']);
    });

    //商品属性组
    $router->group(['prefix' => '/attrsgroup'], function () use ($router) {
        $router->any('list', ['uses' => 'AttrsGroupController@lists']);
        $router->any('add', ['uses' => 'AttrsGroupController@add']);
        $router->any('edit', ['uses' => 'AttrsGroupController@edit']);
    });

    //商品属性值
    $router->group(['prefix' => '/attrs/value'], function () use ($router) {
        $router->post('create', ['uses' => 'AttrsValueController@create']);
    });
});

//商品管理中心
$router->group(['prefix' => '/product'], function () use ($router) {
    //商品
    $router->get('list', ['uses' => 'ProductController@lists']);
    $router->get('detail', ['uses' => 'ProductController@detail']);
    $router->get('publish', ['uses' => 'ProductController@publish']);
    $router->get('create', ['uses' => 'ProductController@create']);
    $router->get('add', ['uses' => 'ProductController@add']);
    $router->get('push', ['uses' => 'ProductController@push']);

    //分类
    $router->group(['prefix' => '/category'], function () use ($router) {
        $router->post('add', ['uses' => 'CategoryController@add']);
        $router->post('subadd', ['uses' => 'CategoryController@subadd']);
        $router->post('del', ['uses' => 'CategoryController@del']);
        $router->post('edit', ['uses' => 'CategoryController@edit']);
        $router->post('get', ['uses' => 'CategoryController@get']);
        $router->post('sub', ['uses' => 'CategoryController@sub']);
        $router->post('attrs', ['uses' => 'CategoryController@attrs']);
        $router->post('search', ['uses' => 'CategoryController@search']);
    });

    //品牌
    $router->group(['prefix' => '/brand'], function () use ($router) {
        $router->any('list', ['uses' => 'BrandController@lists']);
        $router->post('add', ['uses' => 'BrandController@add']);
        $router->post('subadd', ['uses' => 'BrandController@subadd']);
        $router->post('del', ['uses' => 'BrandController@del']);
        $router->post('edit', ['uses' => 'BrandController@edit']);
        $router->post('get', ['uses' => 'BrandController@get']);
    });
    //商品属性
    $router->group(['prefix' => '/attrs'], function () use ($router) {
        $router->any('list', ['uses' => 'AttrsController@lists']);
        $router->any('query', ['uses' => 'AttrsController@query']);
        $router->any('create', ['uses' => 'AttrsController@create']);
        $router->any('get', ['uses' => 'AttrsController@get']);
        $router->post('add', ['uses' => 'AttrsController@add']);
    });

    //商品属性组
    $router->group(['prefix' => '/attrsgroup'], function () use ($router) {
        $router->any('list', ['uses' => 'AttrsGroupController@lists']);
        $router->any('add', ['uses' => 'AttrsGroupController@add']);
        $router->any('edit', ['uses' => 'AttrsGroupController@edit']);
        $router->post('del', ['uses' => 'AttrsGroupController@del']);
    });

    //商品属性值
    $router->group(['prefix' => '/attrs/value'], function () use ($router) {
        $router->post('create', ['uses' => 'AttrsValueController@create']);
    });

    //商品属性模板
    $router->group(['prefix' => '/attrs/template'], function () use ($router) {
        $router->post('add', ['uses' => 'AttrTemplateController@add']);
    });
});
