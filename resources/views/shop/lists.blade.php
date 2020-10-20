@extends('layouts.dashkit.top_app')

@section('content')
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-xl-8 mt-4">
            <div class="card d-block">
                <div class="card-header card-shop-list-header">
                    <h4 class="card-title">店铺列表</h4>
                    <a href="/wizard/choose" class="sf-btn sf-btn-primary">创建店铺</a>
                </div>
                <div class="card-body card-shop-list">
                    <div class="col-12 col-md-4 col-xl-4 mt-3 ml-3 mr-3">
                        <?php if (!empty($lists['list'])) { ?>
                            <?php foreach ($lists['list'] as $v) { ?>
                                <div class="card">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/dashkit/images/store/project-4.jpg" alt="..." class="card-img-top">
                                    </a>
                                    <div class="card-body" style="border: 1px solid #eee;">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="mt-2 mb-2 name">
                                                    <?php echo $v['name']; ?>
                                                </h4>
                                                <p class="text-muted font-3 mb-2"><?php echo $v['desc']; ?></p>
                                                <p class="card-text small text-muted">
                                                    <div class="badge badge-sm badge-success mb-2">营业中</div>
                                                    <div class="badge badge-sm badge-danger ml-1 mb-2">商城</div>
                                                </p>
                                            </div>
                                            <div class="col">
                                                <a href="/shop/dashboard" class="card-link text-custom">管理</a>
                                                <a href="javascript: void(0);" class="card-link text-custom">删除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection