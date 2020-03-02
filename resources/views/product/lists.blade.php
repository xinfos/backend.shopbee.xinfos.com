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
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table" id="sf-brand-tb"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sf-modal csrf_token" csrf_token="{{ csrf_token() }}"></div>
@endsection