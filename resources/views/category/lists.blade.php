@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品分类管理</h5>
                    <button class="sf-btn sf-btn-primary" data-toggle="modal" data-target="#modalCreateCategory">新建分类</button>
                    <button class="sf-btn sf-btn-white sf-btn-create ml-2" data-toggle="modal" data-target="#modalMembers">批量导入</button>
                </div>
                <div class="card-body">
                    <form action="/setting/product/category/list" method="get">
                        <section class="sf-search">
                            <div class="sf-form-group-1">
                                <label class="sf-label">分类名称:</label>
                                <input class="sf-form-control" name="name" id="cat_name" placeholder="分类名称" value="<?php echo empty($_GET['name']) ? '' : $_GET['name']; ?>">
                            </div>
                            <div class="sf-form-group-1">
                                <label class="sf-label">&nbsp;</label>
                                <button class="sf-btn sf-btn-primary sf-btn-search mr-2" data-type="reload">搜索</button>
                                <a href="/setting/product/category/list" class="sf-btn sf-btn-white">重置</a>
                            </div>
                        </section>
                    </form>
                    <div class="mt-4"></div>
                    <div class="sf-alert-el"></div>
                    <table class="table table-hover table-sm" id="t1">
                        <thead>
                            <tr>
                                <th scope="col">分类名称</th>
                                <th scope="col">分类别名</th>
                                <th>是否显示</th>
                                <th>是否启用</th>
                                <th class="text-right" scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('category.modal.create')
<script src="/assets/dashkit/libs/jquery-confirm/dist/jquery-confirm.js"></script>
<script src="/assets/dashkit/js/tree/treetable.js"></script>
<script type="text/javascript">
    $(function() {
        var treeTable = $('#t1').treeTable({
            ajaxRequestUrl: '/product/category/sub',
            ajaxType: 'POST',
            ajaxDataType: 'JSON',
            ajaxReturnSuccCode: 200,
            initData: <?php echo json_encode($data); ?>,
        });
    });
</script>
<script src="/assets/dashkit/js/category/dist/sf.category.js"></script>
@endsection