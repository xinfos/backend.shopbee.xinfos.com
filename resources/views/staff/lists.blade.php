@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/staff/add" class="btn btn-success btn-sm mb-2 mr-2 float-right">添加员工</a>
                <h4 class="header-title mt-1">员工管理</h4>
                <br>
                <div class="card" style="background:#EFF0F2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>状态</label>
                                    <select class="form-control">
                                        <option value="1">全部</option>
                                        <option value="1">启用</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>角色</label>
                                    <select class="form-control">
                                        <option value="1">全部</option>
                                        <option value="1">启用</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>员工姓名</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>员工手机号</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-lg-left">
                                    <button type="button" class="btn btn-primary mb-2 mr-2">
                                        <i class="dripicons-search mr-1"></i> 
                                        搜 索
                                    </button>
                                    <button type="button" class="btn btn-light mb-2">导 出</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>员工姓名</th>
                                <th>联系方式</th>
                                <th>角色</th>
                                <th>添加人</th>
                                <th>添加时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9703</a>
                                </td>
                                <td>
                                    13520928991
                                </td>
                                <td>
                                    普通员工
                                </td>
                                <td>
                                    Admin
                                </td>
                                <td>
                                    2020-02-02 20:20:20
                                </td>
                                <td>
                                    <h5><span class="badge badge-success-lighten"><i class="mdi mdi-check"></i> 启用</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">查看</a>
                                    <a href="javascript:void(0);">编辑</a>
                                    <a href="javascript:void(0);">更换</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
    </div> 
</div>
@endsection