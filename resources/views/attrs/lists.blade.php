@extends('layouts.dashkit.app')

@section('content')
<?php //dd($data);?>
<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/page/sf.page.css">
<link rel="stylesheet" href="/assets/dashkit/libs/jquery-confirm/jquery-confirm.css">
<div class="header"></div>
<div class="container-fluid">
	<div class="row justify-content-center" style="margin:0px;">
		<div class="col-12" style="padding: 0px;">
			<div class="card">
				<div class="card-header">
					<h5 class="card-header-title">属性库管理</h5>
					<a href="/setting/product/attrs/add" class="sf-btn sf-btn-primary">新建属性</a>
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
								<a href="/setting/product/attrs/list" class="sf-btn sf-btn-white">重置</a>
							</div>
						</section>
					</form>
					<div class="mt-4"></div>
					<div class="sf-alert-el"></div>
					<table class="table table-hover table-sm">
						<thead>
							<tr class="text-center">
								<th class="text-left">属性名称</th>
								<th class="text-left">属性类型</th>
								<th  class="text-center">是否支持产品检索</th>
								<th class="text-center">是否为必填属性</th>
								<th class="text-right">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($data['list'])) { ?>
                                <?php foreach ($data['list'] as $v) { ?>
                                    <tr class="li-<?php echo $v['id']; ?>" data-value="<?php echo $v['id']; ?>">
                                        <td><?php echo $v['name']; ?></td>
                                        <td><?php echo $v['fill_type']; ?></td>
										<td class="text-center"><?php echo ($v['is_searching'] == 1) ? '<span class="badge badge-soft-primary">支持检索</span>' : '<span class="badge badge-soft-dark">不支持检索</span>'; ?></td>
                                        <td class="text-center"><?php echo ($v['is_required'] == 1) ? '<span class="badge badge-soft-danger">必填项</span>' : '<span class="badge badge-soft-dark">非必填项</span>'; ?></td>
                                        <td class="text-right">
                                            <a href="/setting/product/attrs/edit?id=<?php echo $v['id']; ?>" class="sf-btn-edit">编辑</a>
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
<script type="text/javascript" src="/assets/dashkit/js/page/sf.page.js"></script>
<script>
	var dataTotal = <?php echo empty($data['total_count']) ? 0 : $data['total_count']; ?>;
	var pageAmount = <?php echo empty($data['current_page_size']) ? 1 : $data['current_page_size']; ?>;
    window.onload = function() {
        new Page({
            id: 'pagination',
            pageTotal: ceil(dataTotal / pageAmount),
            pageAmount: pageSize,
            dataTotal: dataTotal,
            curPage: <?php echo empty($_GET['page']) ? 1 : (int) $_GET['page']; ?>,
            showPageTotalFlag: true,
            showSkipInputFlag: true,
            getPage: function(page) {
                window.location.href = "/setting/product/attrs/list?page=" + page;
            }
        })
    }
</script>
@endsection
