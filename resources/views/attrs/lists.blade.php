@extends('layouts.dashkit.app')

@section('content')
<style type="text/css">
.innerUl ul li {
	list-style-type: none;
}

.menuUl li {
	margin: 10px 0;
}

.menuUl li span:hover {
	text-decoration: underline;
	cursor: pointer;
}

.menuUl li i { margin-right: 10px; top: 0px; cursor: pointer; color: #161616; 			}
</style>

<link rel="stylesheet" href="/assets/dashkit/css/staff/app.css">
<div class="header"></div>
<div class="container-fluid" >
	<div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品属性</h5>
                    <a href="/product/attrs/create" class="sf-btn sf-btn-primary sf-btn-create">新建商品属性</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-4">
    		<div class="card card-fill">
    			<div class="card-header">
    				<h5 class="card-header-title">商品分类列表</h5>
    			</div>
    			<div class="card-body">
    				<div class="list-group list-group-flush my-n3">
    					<div class="innerUl"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-12 col-xl-8">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="card-header-title">属性列表</h5>
    			</div>
    			<div class="table-responsive mb-0">
    				<table class="table table-sm table-nowrap table-hover card-table">
    					<thead>
    						<tr>
    							<th>属性ID</th>
    							<th>属性名称</th>
    							<th>属性名称</th>
    							<th>属性名称</th>
    						</tr>
    					</thead>
                        <tbody class="list">
                        	<tr>
                        		<td>Homepage</td>
                        		<td>Homepage</td>
                        		<td>Homepage</td>
                        		<td class="text-right"></td>
                        	</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/dashkit/js/proTree.js"></script>
<script type="text/javascript">
		//后台传入的 标题列表
		var arr = [{
				id: 1,
				name: "一级标题",
				pid: 0
			}, {
				id: 2,
				name: "二级标题",
				pid: 0
			}, {
				id: 3,
				name: "2.1级标题",
				pid: 2
			}, {
				id: 4,
				name: "2.2级标题",
				pid: 2
			}, {
				id: 5,
				name: "1.1级标题",
				pid: 1
			}, {
				id: 6,
				name: "1.2级标题",
				pid: 1
			}, {
				id: 7,
				name: "1.21级标题",
				pid: 6
			}, {
				id: 8,
				name: "三级标题",
				pid: 0
			}, {
				id: 9,
				name: "1.22级标题",
				pid: 6
			}, {
				id: 10,
				name: "1.221级标题",
				pid: 9
			}, {
				id: 11,
				name: "1.2211级标题",
				pid: 10
			}, {
				id: 12,
				name: "1.2212级标题",
				pid: 10
			}

		];
        //标题的图标是集成bootstrap 的图标  更改 请参考bootstrap的字体图标替换自己想要的图标
		$(".innerUl").ProTree({
			arr: arr,
			close:true,
			simIcon: "fe fe-file",//单个标题字体图标 不传默认glyphicon-file
			mouIconOpen: "fe fe-folder-minus",//含多个标题的打开字体图标  不传默认glyphicon-folder-open
			mouIconClose:"fe fe-folder-plus",//含多个标题的关闭的字体图标  不传默认glyphicon-folder-close
			callback: function(id,name) {
	            $.ajax({
	                type: 'post',
	                url: '/product/attrs/list',
	                dataType: "json",
	                data: {
	                	"cat_id":id,
	                	"_token":'<?php echo csrf_token(); ?>'
	                },
	                success:function(resp) {
	                	console.log(resp);
	                },
	                error: function() {}
	            });
			}
		})
	</script>
@endsection