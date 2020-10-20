@extends('layouts.dashkit.top_app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">

<div data-reactroot="" class="team">
    <div class="head">
        <h2>创建店铺</h2>
    </div>
    <div class="zent-loading-container zent-loading-container-static" style="height: initial;">
        <div class="team-content">
            <div>
                <div class="zent-steps zent-steps-breadcrumb step-block">
                    <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
                        <div class="zent-steps-step">1. 选择店铺类型</div>
                    </div>
                    <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
                        <div class="zent-steps-step">2. 选择版本</div>
                    </div>
                    <div class="zent-steps-item is-clicked" style="width: 25%;">
                        <div class="zent-steps-step">3. 店铺信息</div>
                    </div>
                    <div class="zent-steps-item is-clicked" style="width: 25%;">
                        <div class="zent-steps-step">4. 完成</div>
                    </div>
                </div>
                <div class="create-shop">
                    <div class="choose-version-wrap">
                        <div class="create">
                            <h1 style="padding-top: 0px;">请选择你的主营商品</h1>
                        </div>
                        <div class="choose-version-list">
                            <div class="version-item">
                                <h2 class="version-item__title">单店版</h2>
                                <h3 class="version-item__sub-title">适用单个网店的商家</h3>
                                <p class="version-item__desc">单个线上网店，可一站式管理网店的店铺装修、商品、订单、营销、会员、资金等数据。</p>
                                <div class="zent-btn">
                                    <a href="/wizard/category?t=<?php echo $shopType; ?>&v=1" class="btn btn-outline-info">立即开店</a>
                                </div>
                            </div>
                            <div class="version-item is-recommend">
                                <h2 class="version-item__title">连锁版</h2>
                                <h3 class="version-item__sub-title">适用多家网店的连锁商家</h3>
                                <p class="version-item__desc">总部可针对店铺经营模式（直营/加盟）灵活配置管理方式， 资金、商品、会员可交由店铺独立管理，营销活动和网店可由总部统一维护或由店铺自己经营。</p>
                                <div class="zent-btn">
                                    <a href="#" class="btn btn-outline-info">立即开店</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection