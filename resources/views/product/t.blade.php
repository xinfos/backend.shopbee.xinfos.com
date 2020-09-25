@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/category/dist/sort.css">

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
                    <div class="col-12">
                        <div class="sf-form-group">
                            <div class="input-group input-group-merge mb-3">
                                <input type="text" class="sf-form-control-sm col-6" placeholder="类目搜索：可输入产品名称">
                                <a href="javascript:void(0);" class="sf-btn sf-btn-white sf-btn-search ml-3" style="height:38px;line-height:36px;">搜 索</a>
                            </div>
                            <small class="form-text text-muted mb-3">选择历史：</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wareSort clearfix">
                            <div class="category-list">
                                <span class="search-input">
                                    <input placeholder="名称/拼音首字母" height="100%" value="">
                                </span>
                                <ul id="sort1"></ul>
                            </div>
                            <div class="category-list category-list-2">
                                <span class="search-input">
                                    <input placeholder="名称/拼音首字母" height="100%" value="">
                                </span>
                                <ul id="sort2"></ul>
                            </div>
                            <div class="category-list category-list-3">
                                <span class="search-input">
                                    <input placeholder="名称/拼音首字母" height="100%" value="">
                                </span>
                                <ul id="sort3"></ul>
                            </div>
                        </div>
                        <div class="selectedSort">
                            <b>您当前选择的商品类别是：</b>
                            <i id="selectedSort"></i>
                        </div>
                        <div class="wareSortBtn">
                            <input id="releaseBtn" type="button" value="下一步" disabled="disabled" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/dashkit/js/category/dist/sort.js"></script>

@endsection