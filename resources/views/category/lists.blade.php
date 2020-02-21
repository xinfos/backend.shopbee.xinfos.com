@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/sort.css">
<link rel="stylesheet" type="text/css" href="/assets/dashkit/libs/spop/dist/spop.min.css">

<nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">商品库</li>
                <li class="breadcrumb-item active">商品分类</li>
            </ol>
        </nav>
    </div>
</nav>

<div class="header">
</div>

<div class="container-fluid">
    <div class="alert alert-light" role="alert" style="margin-bottom: 3px;">查看分类详情，请双击需要查看的分类名称!~ </div>
    <div class="row justify-content-center" style="min-height: calc(100vh - 120px);">
        <div class="col-12">
            <!-- Header -->
            <div class="header" style="margin-bottom:10px;"></div>
            <!-- <div class="alert alert-secondary" role="alert" style="margin-bottom:10px;">
                双击分类名称，编辑分类数据
            </div> -->
            <div class="card">
                <div class="card-header">
                    <form>
                        <button type="button" class="btn btn-sm btn-primary mb-2" onclick="cateFrm._renderAdd(this);">+ 新建分类</button>
                    </form>
                </div>
                <div class="wareSort clearfix" style="border:none;">
                    <ul class="cat-1"></ul>
                    <ul class="cat-2" style="display: none;"></ul>
                    <ul class="cat-3" style="display: none;"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="categoryModal" csrf_token="{{ csrf_token() }}"></div>
</div>

<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/dashkit/libs/selectcats/dist/selectcats.js"></script>
<script src="/assets/dashkit/libs/spop/dist/spop.min.js"></script>
@endsection

