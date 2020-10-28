@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/page/sf.page.css">
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" data-toggle="lists">
                <div class="card-header">
                    <h5 class="card-header-title">商品品牌列表</h5>
                    <button class="sf-btn sf-btn-primary" data-toggle="modal" data-target="#modalCreateBrand">
                        <i class="fe fe-plus"></i> 新建品牌
                    </button>
                </div>
                <div class="card-body">
                    <form>
                        <section class="sf-search">
                            <div class="sf-form-group-1">
                                <label class="sf-label">属性名称:</label>
                                <input class="sf-form-control" name="name" value="<?php echo empty($_GET['name']) ? '' :  $_GET['name']; ?>">
                            </div>
                            <div class="sf-form-group-1">
                                <label class="sf-label">&nbsp;</label>
                                <button class="sf-btn sf-btn-primary sf-btn-search mr-2" data-type="reload">搜索</button>
                                <a href="/setting/product/brand/list" class="sf-btn sf-btn-white">重置</a>
                            </div>
                        </section>
                    </form>
                    <div class="mt-4"></div>
                    <div class="sf-alert-el"></div>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">品牌LOGO</th>
                                <th scope="col">品牌名称</th>
                                <th scope="col">品牌（CN）</th>
                                <th scope="col">品牌（EN）</th>
                                <th scope="col">品牌主营类目</th>
                                <th scope="col">状态</th>
                                <th class="text-right" scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['list'])) { ?>
                                <?php foreach ($data['list'] as $v) { ?>
                                    <tr class="li-<?php echo $v['brand_id']; ?>" data-value="<?php echo $v['brand_id']; ?>">
                                        <td>
                                            <div class="avatar">
                                                <img src="<?php echo $v['brand_logo']; ?>" alt="..." class="avatar-img rounded">
                                            </div>
                                        </td>
                                        <td><?php echo $v['brand_name']; ?></td>
                                        <td><?php echo $v['cn_name']; ?></td>
                                        <td><?php echo $v['en_name']; ?></td>
                                        <td><?php echo $v['brand_name']; ?></td>
                                        <td><?php echo $v['brand_name']; ?></td>
                                        <td class="text-right">
                                            <a href="/setting/product/brand/edit?id=<?php echo $v['brand_id']; ?>" class="sf-btn-edit">编辑</a>
                                            |
                                            <a href="javascript:void(0);" class="sf-btn-del">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center" scope="col"> - 暂无数据 -</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div id="pagination" class="pagination text-right"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('brand.modal.create')
<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script type="text/javascript" src="/assets/dashkit/js/brand/sf.brand.js"></script>
<script type="text/javascript" src="/assets/dashkit/js/page/sf.page.js"></script>
<script>
    var dataTotal = <?php echo empty($data['total_count']) ? 0 : $data['total_count']; ?>;
    var pageAmount = <?php echo empty($data['current_page_size']) ? 1 : $data['current_page_size']; ?>;
    var pageSize = 10;
    window.onload = function() {
        new Page({
            id: 'pagination',
            pageTotal: Math.ceil(dataTotal / pageAmount),
            pageAmount: pageSize,
            dataTotal: dataTotal,
            curPage: <?php echo empty($_GET['page']) ? 1 : (int) $_GET['page']; ?>,
            showPageTotalFlag: true,
            showSkipInputFlag: true,
            getPage: function(page) {
                window.location.href = "/setting/product/brand/list?page=" + page;
            }
        })
    }
</script>
@endsection