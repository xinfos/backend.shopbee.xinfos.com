@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" data-toggle="lists">
                <div class="card-header">
                    <h5 class="card-header-title">商家地址库</h5>
                    <a href="/shop/address/add" class="btn btn-sm btn-primary sf-btn-create">新建地址</a>
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
            {tag: 'brand_logo', name:'联系人', sort: 0},
            {tag: 'brand_name', name:'联系方式', sort: 0},
            {tag: 'cat_name', name:'地址', sort: 0},
            {tag: 'is_show', name:'地址类型', sort: 0},
        ],
        action: [
        ],
        url: "/brand/list"
    });
});
</script>
@endsection