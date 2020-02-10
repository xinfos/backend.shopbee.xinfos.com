@extends('layouts.base')
@section('content')

<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">
<link rel="stylesheet" type="text/css" href="/assets/css/yzw3.css">

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
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
    </div>
    <div class="col-3"></div>
</div>
<div class="row" style="padding-top:40px;">
	<div class="col-3"></div>
	<div class="col-6">
		<div class="card" style="background-color: #fafbfe;box-shadow:none;">
			<!-- <h5 class="card-header">创建店铺</h5> -->
			<div class="card-body">
				<div class="row">
					<div class="col-1"></div>
					<div class="col-10" >
						<div class="wizard">
							<div class="box">
								<div class="wizard-nav">
									<h4>请选择需要创建的店铺类型</h4>
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
											<a href="/wizard/edition" class="btn btn-outline-primary btn-sm">立即开店</a>
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
											<a href="/wizard/edition" class="btn btn-outline-primary btn-sm">立即开店</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-3"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection