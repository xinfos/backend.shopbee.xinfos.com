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
                    <table class="table table-sm table-nowrap card-table"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection