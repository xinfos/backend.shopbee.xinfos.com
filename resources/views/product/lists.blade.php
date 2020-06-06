@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/category/dist/sort.css">
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品库管理</h5>
                    <button class="sf-btn sf-btn-primary sf-btn-create" data-toggle="modal" data-target="#modalMembers">新建商品</button>
                    
                </div>
                <div class="card-body">
                    <form>
                        <section class="sf-search" id="sf-search">
                            <div class="sf-form-group">
                                <div class="sf-form-group-f">
                                    <label class="sf-label">商品名称:</label>
                                    <input class="sf-form-control" name="name" id="s_name" placeholder="商品名称" value="">
                                </div>
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">商品SKU:</label>
                                <input class="sf-form-control" name="sku" id="s_sku" placeholder="商品SKU标识" value="">
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">商品类型:</label>
                                <select class="sf-form-control multiselect" name="type" id="s_type">
                                    <option value="0">全部</option>
                                    <option value="1">启用</option>
                                    <option value="2">停用</option>
                                </select>
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">商品分类:</label>
                                <select name="s_state" class="sf-form-control multiselect" id="s_state">
                                    <option value="0">全部</option>
                                    <option value="1">启用</option>
                                    <option value="2">停用</option>
                                </select>
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">库存数量:</label>
                                <input class="sf-form-control" name="stock" id="s_stock" placeholder="库存数量" value="">
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">&nbsp;</label>
                                <button class="sf-btn sf-btn-primary sf-btn-search mr-2" data-type="reload">搜索</button>
                                <button class="sf-btn sf-btn-white">重置</button>
                            </div>
                        </section>
                    <form>
                    <div class="ml-2">
                        <ul class="nav nav-tabs nav-tabs-sm mb-4">
                            <li class="nav-item">
                                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">全部</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">销售中</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">已售罄</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">已下架</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table" id="sf-brand-tb">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                                        <label class="custom-control-label" for="ordersSelectAll"></label>
                                    </div>
                                </th>
                                <th>品牌LOGO</th>
                                <th>品牌名称</th>
                                <th>归属分类名称</th>
                                <th>是否显示</th>
                                <th>创建时间</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect">
                                        <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
 <!-- Modal: Members -->
 <div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-card card">
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="card-header-title">发布新商品 > 请先选择商品所在分类</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-header">
                    <!-- Form -->
                    <form>
                        <div class="input-group input-group-flush input-group-merge">
                            <!-- Input -->
                            <input type="search" class="form-control form-control-prepended list-search" placeholder="输入关键词搜索分类">
                            <!-- Prepend -->
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fe fe-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body-no-height">
                    <div class="wareSort clearfix"> 
                        <ul id="sort1"></ul> 
                        <ul id="sort2" style="display: none;"></ul> 
                        <ul id="sort3" style="display: none;"></ul> 
                    </div>
                    <div class="selectedSort">
                        <b>您当前选择的商品类别是：</b>
                        <i id="selectedSort"></i>
                    </div>
                    <div class="wareSortBtn"> 
                        <input id="releaseBtn" type="button" value="下一步" disabled="disabled" /> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/assets/dashkit/js/category/dist/sort.js"></script>
@endsection