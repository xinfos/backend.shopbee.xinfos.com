@extends('layouts.base')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/yzw3.css">
<link rel="stylesheet" type="text/css" href="/assets/css/yzw1.css">

<link rel="stylesheet" type="text/css" href="/assets/css/sort.css">
<div class="team-content">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="zent-steps zent-steps-breadcrumb step-block">
                <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
                    <div class="zent-steps-step">1. 选择店铺类型</div>
                </div>
                <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
                    <div class="zent-steps-step">2. 选择版本</div>
                </div>
                <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
                    <div class="zent-steps-step">3. 经营信息</div>
                </div>
                <div class="zent-steps-item is-clicked" style="width: 25%;">
                    <div class="zent-steps-step">4. 店铺信息</div>
                </div>
                <div class="zent-steps-item is-clicked" style="width: 25%;">
                    <div class="zent-steps-step">5. 完成</div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="create">
        <h1>请选择你的主营商品</h1>
        <form class="zent-form zent-form--horizontal">
            <div>
                <div class="selectedSort solutions-block">
                    <p>您当前选择的商品类别是：<i id="selectedSort"></i></p>
                </div>
                <div class="wareSort clearfix solutions-block">
                    <ul id="sort1"></ul>
                    <ul id="sort2" style="display: none;"></ul>
                    <ul id="sort3" style="display: none;"></ul>
                </div>
            </div>
            <div>
                <div class="solutions-block">
                    <h1 class="case-title">请选择你的经营模式</h1>
                    <div class="zent-form__control-group solutions-list">
                        <div class="clearfix">
                            <div class="solutions-item">
                                <div class="solutions-title">品牌商</div>
                                <div class="solutions-content clearfix">
                                    <div class="solutions-detail pull-left">
                                        <p>我是品牌商，已有其他平台的销售渠道，想增加微信销售渠道。</p>
                                        <p></p>
                                    </div>
                                    <div class="solutions-shop pull-left">
                                        <div class="solutions-shop-title">
                                            <span>典型商家</span>
                                        </div>
                                        <div class="zent-popover-wrapper zent-pop-wrapper" style="display: inline-block;">
                                            <div class="shop-avatar" style="background-image: url(&quot;https://img.yzcdn.cn/upload_files/2017/07/15/FvFFnNdFfaqMiDDhAFnJeqgQOz4k.jpg&quot;);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="solutions-item">
                                <div class="solutions-title">电商</div>
                                <div class="solutions-content clearfix">
                                    <div class="solutions-detail pull-left">
                                        <p>我有优质货源，希望通过线上商城拓展销售渠道，找到更多客户。</p>
                                        <p></p>
                                    </div>
                                    <div class="solutions-shop pull-left">
                                        <div class="solutions-shop-title">
                                            <span>典型商家</span>
                                        </div>
                                        <div class="zent-popover-wrapper zent-pop-wrapper" style="display: inline-block;">
                                            <div class="shop-avatar" style="background-image: url(&quot;https://img.yzcdn.cn/upload_files/2017/11/03/FipIhPANAOukjI-2gTuRRyQaR_vE.jpg&quot;);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="solutions-item">
                                <div class="solutions-title">流量主</div>
                                <div class="solutions-content clearfix">
                                    <div class="solutions-detail pull-left">
                                        <p>我有大量粉丝，希望找到更多优质货源，实现流量变现。</p>
                                        <p></p>
                                    </div>
                                    <div class="solutions-shop pull-left">
                                        <div class="solutions-shop-title">
                                            <span>典型商家</span>
                                        </div>
                                        <div class="zent-popover-wrapper zent-pop-wrapper" style="display: inline-block;">
                                            <div class="shop-avatar" style="background-image: url(&quot;http://img.yzcdn.cn/upload_files/2016/05/06/36b2b50b1577c600a58653a1402e2993.jpeg&quot;);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="solutions-item">
                                <div class="solutions-title">其他</div>
                                <div class="solutions-content clearfix">
                                    <div class="default-solutions">
                                        <p>这些模式都不适合我？<br>选择其他试试吧</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="zent-btn btn-primary create-btn">
                    <span>下一步</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/js/jquery.sort.js"></script>
<script type="text/javascript">
    $('.create-btn').on('click', function(){
        window.location.href="/wizard/create";
    });
</script>
@endsection