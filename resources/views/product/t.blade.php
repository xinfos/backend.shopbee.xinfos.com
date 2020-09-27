@extends('layouts.dashkit.app')

@section('content')
<!-- <link rel="stylesheet" type="text/css" href="/assets/dashkit/js/category/dist/sort.css"> -->
<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/category/dist/sf.sort.css">

<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center" style="margin:0px;background-color:#f7f8fa;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">
                        <div class="crumbNav">
                            <a href="demo.html">首页</a>
                            <font>&gt;</font>发布商品
                            <font>&gt;</font>选择商品所在分类
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <div class="sf-form-group">
                            <div class="input-group input-group-merge">
                                <input type="text" name="cat_name" class="sf-form-control-sm sf-search-name col-6" value="" placeholder="类目搜索：可输入产品名称">
                                <a href="javascript:void(0);" class="sf-btn sf-btn-white sf-btn-search ml-3" style="height:38px;line-height:36px;">搜 索</a>
                            </div>
                            <div class="sf-search-content">
                                <!-- <ul>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                    <li>分1 > 分类2 > 分类2 </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="sf-form-group">
                            <small class="form-text text-muted mb-3">选择历史：</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="sf-category-contains">
                            <div class="sf-category-list">
                                <div class="sf-category-list-search">
                                    <input type="text" name="cat_name" class="" placeholder="名称/拼音首字母" value="">
                                    <!-- <i class="next-icon search-icon fe fe-search"></i> -->
                                </div>
                                <div class="category-list-content">
                                    <ul id="sort1"></ul>
                                </div>
                            </div>
                            <div class="sf-category-list clear-border">
                                <div class="sf-category-list-search">
                                    <input placeholder="名称/拼音首字母" value="">
                                </div>

                                <div class="category-list-content">
                                    <ul id="sort2"></ul>
                                </div>
                            </div>
                            <div class="sf-category-list clear-border ">
                                <div class="sf-category-list-search">
                                    <input placeholder="名称/拼音首字母" value="">
                                </div>
                                <div class="category-list-content">
                                    <ul id="sort3"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="selected-category">
                            <b>您当前选择的商品类别是：</b>
                            <i id="selectedSort"></i>
                        </div>
                        <div class="selected-category-confirm">
                            <input id="releaseBtn" type="button" value="下一步" disabled="disabled" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/dashkit/js/category/dist/sort.js"></script>
<script type="text/javascript">
    $(function() {

    });
</script>
@endsection