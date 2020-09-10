@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" href="/assets/dashkit/libs/jquery-confirm/jquery-confirm.css">
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品属性模板管理</h5>
                    <a href="/setting/product/attrsgroup/add" class="sf-btn sf-btn-primary">新建标准模板</a>
                </div>
                <div class="card-body">
                    <form>
                        <section class="sf-search">
                            <div class="sf-form-group-1">
                                <label class="sf-label">分类名称:</label>
                                <input class="sf-form-control" name="name" id="cat_name" value="" readonly>
                            </div>
                            <div class="sf-form-group-1">
                                <label class="sf-label">&nbsp;</label>
                                <button class="sf-btn sf-btn-primary sf-btn-search mr-2" data-type="reload">搜索</button>
                                <button class="sf-btn sf-btn-white">重置</button>
                            </div>
                        </section>
                        <div class="mt-4"></div>
                        <div class="sf-alert-el"></div>
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-left" scope="col">模板名称</th>
                                    <th class="text-left" scope="col">所属分类</th>
                                    <th class="text-center" scope="col">模板完成度</th>
                                    <th class="text-center" scope="col">是否启用</th>
                                    <th class="text-right" scope="col">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center sf-tr-1" tr-data="1">
                                    <td class="text-left" scope="col">模板名称</td>
                                    <td class="text-left" scope="col">所属分类</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td class="text-right" scope="col">
                                        <a href="/setting/product/attrsgroup/edit">编辑</a> | 
                                        <a href="javascript:void(0)" class="sf-btn-del">删除</a>
                                    </td>
                                </tr>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/jquery-confirm/dist/jquery-confirm.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrstemplate.js"></script>

@endsection
