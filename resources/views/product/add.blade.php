@extends('layouts.dashkit.app')

@section('content')

<style type="text/css">
.sf-product-push {
	margin:0 auto;
	text-align:center;
	left: 0;
	position: fixed;
	bottom: 0;
	width: 100%;
	height: 80px;
	z-index: 100;
	background-color: #ffffff;
	border-top: 1px solid #e3ebf6;
}
.sf-product-push-body{
	margin-top: 30px;
}
input::placeholder{
	font-size:13px;
}
</style>

<div class="row justify-content-center content" style="background-color:#f7f8fa;">
	<div class="sf-product-frm col-12 col-lg-10 col-xl-10">
		<!-- Header -->
		<div class="header mt-md-5">
			<div class="header-body">
				<div class="row align-items-center">
					<div class="col">
						<!-- Pretitle -->
						<!-- <h6 class="header-pretitle">概述</h6> -->
						<!-- Title -->
						<h1 class="header-title">商品发布</h1>
					</div>
				</div><!-- / .row -->
				<div class="row align-items-center el-header">
					<div class="col">
						<!-- Nav -->
						<ul class="nav nav-tabs nav-overflow header-tabs">
							<li class="nav-item">
								<a href="#basic-info" class="nav-link active">基础信息</a>
							</li>
							<li class="nav-item">
								<a href="#sale-info" class="nav-link">销售信息</a>
							</li>
							<li class="nav-item">
								<a href="#spec-info" class="nav-link">商品规格</a>
							</li>
							<li class="nav-item">
								<a href="#image-info" class="nav-link">图文描述</a>
							</li>
							<li class="nav-item">
								<a href="#pay-info" class="nav-link">支付信息</a>
							</li>
							<li class="nav-item">
								<a href="#logistics-info" class="nav-link">物流信息</a>
							</li>
							<li class="nav-item">
								<a href="#after-sale-info" class="nav-link">售后服务</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Form -->
		<form class="sf-product-frm">
			<div class="row align-items-center mt-4 ml-1">
				<div class="col-auto">
					<div class="row align-items-center">
						<div class="col mt-2">
							<h5 class="mb-1">当前类目：手机</h5>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<a href="#" class="sf-btn sf-btn-primary sf-btn-create">切换类目</a>
				</div>
			</div>

			<!-- basic-info -->
			<hr class="my-4" id="basic-info">
			<div class="card">
				<div class="card-header">
					<h3 class="card-header-title">基础信息</h3>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label><em class="sf-required">*</em>宝贝类型：</label>
							<div class="col-md-8 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col">
									<input type="radio" name="navPosition" id="navPositionSidenav" value="1"> 全新
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 二手
								</label>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label><em class="sf-required">*</em>宝贝标题：</label>
							<small class="form-text text-muted ml-3">
								标题和描述关键词是否违规自检工具：商品合规工具。
							</small>
							<div class="input-group input-group-merge  ml-3 mb-3">
								<input type="text" id="product_name"class="form-control form-control-appended" placeholder="最多允许输入30个汉字（60字符）">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="input-word-length">0</span><span>/60</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label><em class="sf-required">*</em>品牌：</label>
							<div class="input-group input-group-merge  ml-3 mb-3">
								<select id="product_brand" class="custom-select" data-toggle="select">
								</select>
							</div>
							<small class="form-text text-muted ml-3">
								标题和描述关键词是否违规自检工具：商品合规工具。
							</small>
						</div>
					</div>
					<div class="col-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">&nbsp;&nbsp;</em>类目属性：</label>
							<!--  Radio -->
							<small class="form-text text-muted ml-3">
								错误填写宝贝属性，可能会引起宝贝下架或搜索流量减少，影响您的正常销售，请认真准确填写！。
							</small>
							<div class="row col-12" style="border: 0.5px solid #d2ddec;border-radius: .375rem;margin-left:1px;background-color:#f8f8f8;">
								<div class="row col-12 mt-4 props"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- spec-info -->
			<hr class="my-4" id="spec-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h3 class="card-header-title">商品规格</h3>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>一口价：</label>
							<small class="form-text text-muted ml-3">
								本类目下，宝贝价格必须在100.00元-999999.00元之间。
							</small>
							<!--  Radio -->
							<div class="input-group input-group-merge  ml-3 mb-3">
								<input type="number" class="form-control form-control-appended" placeholder="">
								<div class="input-group-append">
									<div class="input-group-text">
										<span>元</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- sale-info -->
			<hr class="my-4" id="sale-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">销售信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>一口价：</label>
							<small class="form-text text-muted ml-3">
								本类目下，宝贝价格必须在100.00元-999999.00元之间。
							</small>
							<!--  Radio -->
							<div class="input-group input-group-merge  ml-3 mb-3">
								<input type="number" class="form-control form-control-appended" placeholder="">
								<div class="input-group-append">
									<div class="input-group-text">
										<span>元</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>商品条形码：</label>
							<small class="form-text text-muted ml-3">
							</small>
							<!--  Radio -->
							<div class="input-group input-group-merge  ml-3 mb-3">
								<input type="text" class="form-control form-control-appended" placeholder="">
								<div class="input-group-append">
									<div class="input-group-text">
										<i class="bx bx-barcode"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- image-info -->
			<hr class="my-4" id="image-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">图文描述</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>电脑端宝贝图片：</label>
							<small class="form-text text-muted ml-3">
							宝贝主图大小不能超过3MB；700*700 以上图片上传后宝贝详情页自动提供放大镜功能。第5张图为白底图会大大增加手淘曝光机会 查看规范
							</small>
							<!--  Radio -->
							<div class="ml-3" id="cupload-create"></div>
						</div>
					</div>
					<div class="col-12 col-md-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>电脑端描述：</label>
							<small class="form-text text-muted"></small>
							<!--  Radio -->
							<!-- <div id="cupload-create"></div> -->

						</div>
					</div>
				</div>
			</div>

			<!-- pay-info -->
			<hr class="my-4" id="pay-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">支付信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>付款方式：</label>
							<!--  Radio -->
							<div class="col-md-6 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col">
									<input type="radio" name="navPosition" id="navPositionSidenav" value="1"> 一口价(普通交易模式)
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 预售模式
								</label>
							</div>
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>库存计数：</label>
							<!--  Radio -->
							<div class="col-md-6 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col">
									<input type="radio" name="navPosition" id="navPositionSidenav" value="1"> 买家拍下减库存
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 买家付款减库存
								</label>
							</div>
							<small class="form-text text-muted"></small>
						</div>
					</div>
				</div>
			</div>

			<!-- logistics-info -->
			<hr class="my-4" id="logistics-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">物流信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>提取方式：</label>
							<!--  Radio -->
							<small class="form-text text-muted"></small>
						</div>
					</div>
				</div>
			</div>

			<!-- Divider -->
			<hr class="my-4" id="after-sale-info">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">售后服务</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>售后服务：</label>
							<!--  Radio -->
							<div class="ml-3">
								<div class="custom-control custom-checkbox mt-3">
									<input type="checkbox" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">提供发票</label>
								</div>
								<div class="custom-control custom-checkbox mt-3">
									<input type="checkbox" class="custom-control-input" id="customCheck2">
									<label class="custom-control-label" for="customCheck2">保修服务</label>
								</div>
								<div class="custom-control custom-checkbox mt-3">
									<input type="checkbox" class="custom-control-input" id="customCheck2">
									<label class="custom-control-label" for="customCheck2">保修服务</label>
								</div>
								<div class="custom-control custom-checkbox mt-3">
									<input type="checkbox" class="custom-control-input" id="customCheck2">
									<label class="custom-control-label" for="customCheck2">服务承诺：该类商品，必须支持【七天退货】服务</label>
								</div>
							</div>
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<!-- Label -->
							<label><em class="sf-required">*</em>上架时间：</label>
							<small class="form-text text-muted ml-3">定时上架的商品在上架前请到“仓库中的宝贝”里编辑商品。</small>
							<!--  Radio -->
							<div class="col-md-6 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col">
									<input type="radio" name="navPosition" id="navPositionSidenav" value="1"> 立刻上架
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 定时上架
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 放入仓库
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

		<div class="sf-product-push">
			<div class="sf-product-push-body">
				<a href="#" class="sf-btn sf-btn-primary sf-btn-create">保存</a>
				<a href="#" class="sf-btn btn-info sf-btn-create">取消</a>
			</div>
		</div>
	</div>
</div>
<script src="/assets/dashkit/libs/select2/select2.full.min.js"></script>
<script src="/assets/dashkit/libs/cupload/cupload.js"></script>
<script src="/assets/js/product.js"></script>
<script type="text/javascript">
	$(function(){
		var cuploadCreate = new Cupload ({
			ele: '#cupload-create',
			num: 8,
		});
		$('sf-product-frm').Product();
	});
</script>

@endsection
