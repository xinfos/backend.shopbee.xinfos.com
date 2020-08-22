@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品属性组</h5>
                    <button class="sf-btn sf-btn-primary sf-btn-create" data-toggle="modal" data-target="#modalVerticalRight">新建分类属性模板</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap table-hover card-table">
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
                        <tbody class="list"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade fixed-right" id="modalVerticalRight" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">模板</h4>
                <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#modalActivityAction">新增模板</a>
                    </li>
                </ul>
            </div>
    </div>
  </div>
</div>
@endsection