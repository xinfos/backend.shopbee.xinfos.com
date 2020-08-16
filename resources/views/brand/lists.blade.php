@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/css/1.css">

<div class="header"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" data-toggle="lists">
                <div class="card-header">
                    <h5 class="card-header-title">商品品牌列表</h5>
                    <a href="#!" class="btn btn-sm btn-primary sf-btn-create">新建品牌</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="sf-modal csrf_token" csrf_token="{{ csrf_token() }}"></div>


<script src="/assets/dashkit/js/list.js"></script>
<script src="/assets/dashkit/js/brand.js"></script>
<script src="/assets/dashkit/js/attachment.js"></script>

<script type="text/javascript">
$(function() {
    $('#sf-brand-tb').DataList({
        thead: [
            {tag: 'brand_logo', name:'品牌LOGO', sort: 0},
            {tag: 'brand_name', name:'品牌名称', sort: 0},
            {tag: 'cat_name', name:'归属分类名称', sort: 0},
            {tag: 'is_show', name:'是否显示', sort: 0},
            {tag: 'created_at', name: '创建时间', sort: 0},
        ],
        action: [
        ],
        url: "/product/brand/list"
    });
});
</script>

@endsection