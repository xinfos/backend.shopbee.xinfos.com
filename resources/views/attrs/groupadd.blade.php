@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品属性组</h5>
                    <button class="sf-btn sf-btn-primary sf-btn-create" data-toggle="modal" data-target="#modalCreateAttrs">新建分类属性模板</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>属性组</th>
                                <th>属性名</th>
                                <th>单位</th>
                                <th>表单方式</th>
                                <th>表单方式</th>
                                <th>必填</th>
                                <th>状态</th>
                                <th>属性值</th>
                                <th>属性操作</th>
                                <th>属性组操作</th>
                            </tr>
                        </thead>
                        <tbody class="list sf-tbody-attrs">
                            <tr>
                                <td rowspan="2">1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                                <td rowspan="2">
                                    <a href="#">添加属性 |</a>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('attrs.modal.create')

@endsection