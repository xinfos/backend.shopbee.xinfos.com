@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" data-toggle="lists">
                <div class="card-header">
                    <h5 class="card-header-title">商家地址库</h5>
                    <a class="btn btn-sm btn-primary">新建地址</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection