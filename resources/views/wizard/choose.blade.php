@extends('layouts.base')
@section('content')

<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">

<div data-reactroot="" class="team">
	<div class="head">
		<h2>创建微商城店铺</h2>
	</div>
	<div class="zent-loading-container zent-loading-container-static" style="height: initial;">
		<div class="team-content">
			<div>
				<div class="zent-steps zent-steps-breadcrumb step-block">
					<div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
						<div class="zent-steps-step">1. 选择店铺类型</div>
					</div>
					<div class="zent-steps-item is-clicked" style="width: 25%;">
						<div class="zent-steps-step">2. 选择版本</div>
					</div>
					<div class="zent-steps-item is-clicked" style="width: 25%;">
						<div class="zent-steps-step">3. 经营信息</div>
					</div>
					<div class="zent-steps-item is-clicked" style="width: 25%;">
						<div class="zent-steps-step">4. 店铺信息</div>
					</div>
					<div class="zent-steps-item is-clicked" style="width: 25%;">
						<div class="zent-steps-step">5. 完成</div>
					</div>
				</div>
				<div class="create-shop">
					<div class="wizard">
						<div class="box">
							<div class="wizard-nav">
								<h4 style="margin-top:55px;margin-bottom: 40px;">请选择需要创建的店铺类型</h4>
							</div>
							<div class="sep">
								<div class="item wsc_item">
									<div class="item-title clearfix wsc_bg">
										<h2 class="name" style="margin:0px auto;">微商城</h2>
										<h3 class="subtitle">解决网上开店的所有问题</h3>
									</div>
									<div class="desc">
										<div class="desc-content">
											<p>适用于</p>
											<p>需要搭建线上商城的商家</p>
										</div>
										<a href="/wizard/version?t=1" class="btn btn-outline-info btn-sm">立即开店</a>
									</div>
								</div>
								<div class="item linshou_item">
									<div class="item-title clearfix linshou_bg">
										<h2 class="name" style="margin:0px auto;">新零售</h2>
										<h3 class="subtitle">全渠道获取更多客户和订单</h3>
									</div>
									<div class="desc">
										<div class="desc-content">
											<p>适用于</p>
											<p>拥有门店的零售商家</p>
										</div>
										<a href="/wizard/version?t=2" class="btn btn-outline-info btn-sm">立即开店</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection