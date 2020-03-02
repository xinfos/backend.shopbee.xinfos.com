@extends('layouts.dashkit.app')

@section('content')
<div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar avatar-lg avatar-4by3">
                        <img src="/assets/dashkit/images/store/adidas.jpg" alt="..." class="avatar-img rounded">
                    </div>
                </div>
                <div class="col ml-n3 ml-md-n2">
                    <h6 class="header-pretitle"><span class="badge badge-pill badge-success">营业中</span></h6>
                    <h3 class="header-title">Homepage Redesign</h3>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">概述</a>
                        </li>
                        <li class="nav-item">
                            <a href="project-files.html" class="nav-link">Files</a>
                        </li>
                        <li class="nav-item">
                            <a href="project-reports.html" class="nav-link">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <a href="/shop/infoedit" class="btn btn-sm btn-link float-right mb-3"><i class="mdi mdi-circle-edit-outline ml-1"></i> 编辑</a>
                    <h4 class="header-title mt-1">店铺基本信息</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">店铺编号：</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">25699145</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">创建时间：</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">2020-01-18 16:01:51</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">店铺类型：</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂未订购服务</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">主营类目</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">男装</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">店铺简介：</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂无</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">联系电话：</h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂无</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-1">店铺授权认证信息</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">主体信息：<a href="#">去认证</a></h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂无</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">品牌认证：<a href="#">去认证</a></h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂无</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">跨境电商认证：<a href="#">去认证</a></h5>
                                    </td>
                                    <td style="border-top:none;">
                                        <h5 class="font-14 mb-1 font-weight-normal">暂无</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <p class="text-muted font-15 mb-0"><i class="dripicons-user-group text-muted" style="font-size: 24px;"></i> 已有员工</p>
                                    <h3><span>29</span></h3>
                                    <a href="#" class="font-10 mb-0">去添加</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <p class="text-muted font-15 mb-0"><i class="dripicons-network-3 text-muted" style="font-size: 24px;"></i> 开启的角色</p>
                                    <h3><span>10</span></h3>
                                    <a href="#" class="font-10 mb-0">去管理</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <p class="text-muted font-15 mb-0"><i class="dripicons-stopwatch text-muted" style="font-size: 24px;"></i> 停用员工</p>
                                    <h3><span>31</span></h3>
                                    <a href="#" class="font-10 mb-0">去开启</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/shop/infoedit" class="btn btn-sm btn-link float-right mb-3"> 查看更多</a>
                    <h4 class="header-title">最近员工操作</h4>
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table table-centered">
                            <thead class="thead-light">
                                <tr>
                                    <th>操作时间</th>
                                    <th>操作人</th>
                                    <th>操作模块</th>
                                    <th>具体操作事项</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2020-02-02 20:20:20</td>
                                    <td>管理员</td>
                                    <td>商品管理</td>
                                    <td>发布商品</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div> 
    </div>
</div>
@endsection