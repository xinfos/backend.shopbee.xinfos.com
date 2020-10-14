<?php

$router->group(['prefix' => '/'], function () use ($router) {
    $router->any('/', 'ShopController@lists');
    $router->any('login', 'SiteController@login');
    $router->any('register', 'SiteController@register');
    $router->any('forget', 'SellerController@forget');
    $router->get('logout', 'SiteController@logout');
    $router->any('menu', 'MenuController@get');
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
$router->group(['prefix' => '/wizard', 'middleware' => ['checkauth']], function () use ($router) {
    $router->get('choose', 'WizardController@choose');
    $router->get('version', 'WizardController@version');
    $router->get('category', 'WizardController@category');
    $router->get('create', 'WizardController@create');
    $router->get('success', 'WizardController@success');
});

//店铺管理
$router->group(['prefix' => '/shop', 'middleware' => 'CheckAuth'], function () use ($router) {

    $router->get('dashboard', ['uses' => 'ShopController@dashboard']);
    $router->get('list', ['uses' => 'ShopController@lists']);
    $router->get('info', ['uses' => 'ShopController@info']);
    $router->get('infoedit', ['uses' => 'ShopController@infoEdit']);
    $router->get('wizard', ['uses' => 'ShopController@wizard']);

    //商家地址库管理
    $router->group(['prefix' => '/address'], function () use ($router) {
        $router->get('list', ['uses' => 'AddressController@lists']);
        $router->get('add', ['uses' => 'AddressController@add']);
    });

    //员工管理
    $router->group(['prefix' => '/staff'], function () use ($router) {
        $router->any('list', ['uses' => 'StaffController@lists']);
        $router->get('getlist', ['uses' => 'StaffController@getStaffList']);
        $router->get('add', ['uses' => 'StaffController@add']);
    });

    //门店管理
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
        $router->any('create', ['uses' => 'AttrsController@create']);
        $router->any('get', ['uses' => 'AttrsController@get']);
        $router->post('add', ['uses' => 'AttrsController@add']);
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
