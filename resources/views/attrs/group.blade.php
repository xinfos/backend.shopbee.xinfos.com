@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品标准属性模板管理</h5>
                    <button class="sf-btn sf-btn-primary sf-btn-create">新建标准模板</button>
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
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">模板名称</th>
                                <th scope="col">所属分类</th>
                                <th scope="col">模板完成度</th>
                                <th scope="col">是否启用</th>
                                <th class="text-right" scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </form></div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/select2/select2.full.min.js"></script>
@endsection
