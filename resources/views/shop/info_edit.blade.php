@extends('layouts.dashkit.app')

@section('content')

<nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" style="color:black;">店铺基本信息编辑</li>
            </ol>
        </nav>
    </div>
</nav>

<div class="header"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="header-title">店铺基本信息编辑</h4>
                            <br>
                            <div class="form-group mb-3">
                                <label for="example-email"><em class="form-required">*</em>店铺Logo:</label>
                                <span class="m-2 mr-4">
                                    <img src="/assets/images/users/avatar-2.jpg" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
                                    <a class="m-2 mr-4" href="#">修改</a>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email"><em class="form-required">*</em>店铺名称:</label>
                                <input type="email" id="example-email" name="example-email" class="form-control" value="peacone1234">
                            </div>
                            <div class="form-group mb-3">
                                <label for="shop-category">主营类目:</label>
                                <input type="email" id="shop-category" name="shop-category" class="form-control" placeholder="男装" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">创建日期:</label>
                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="2020-02-02 20:20:20" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">店铺简介:</label>
                                <textarea type="email" id="example-email" name="example-email" class="form-control" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">保 存</button>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection