@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" data-toggle="lists">
                <div class="card-header">
                    <h5 class="card-header-title">线下门店管理</h5>
                    <a href="/shop/store/add" class="btn btn-sm btn-primary sf-btn-create">新建门店</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table" id="sf-brand-tb"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sf-modal csrf_token" csrf_token="{{ csrf_token() }}"></div>

<script src="/assets/dashkit/js/list.js"></script>
<script type="text/javascript">
$(function() {
    $('#sf-brand-tb').DataList({
        thead: [
            {tag: 'brand_logo', name:'门店名', sort: 0},
            {tag: 'brand_name', name:'联系地址', sort: 0},
            {tag: 'cat_name', name:'联系电话', sort: 0},
            {tag: 'is_show', name:'营业时间', sort: 0},
        ],
        action: [
        ],
        url: "/brand/list"
    });
});
</script>
@endsection