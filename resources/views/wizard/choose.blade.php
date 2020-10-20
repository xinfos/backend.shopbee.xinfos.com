@extends('layouts.dashkit.top_app')

@section('content')

<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/wizard/dist/css/wizard.css">

<div class="header"></div>
<div class="container-fluid">
	<div class="row">
		<div class="team mt-4">
			<div class="head">
				<h2>创建店铺</h2>
			</div>
			<div class="zent-loading-container zent-loading-container-static">
				<div class="team-content">
					<div>
						<div class="zent-steps zent-steps-breadcrumb step-block">
							<div class="zent-steps-item is-finish is-clicked" style="width: 33%;">
								<div class="zent-steps-step">1. 选择店铺类型</div>
							</div>
							<div class="zent-steps-item is-clicked" style="width: 33%;">
								<div class="zent-steps-step">2. 店铺信息</div>
							</div>
							<div class="zent-steps-item is-clicked" style="width: 33%;">
								<div class="zent-steps-step">3. 完成</div>
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
												<h2 class="name" style="margin:0px auto;">个人店铺</h2>
												<h3 class="subtitle">解决网上个人开店问题</h3>
											</div>
											<div class="desc">
												<div class="desc-content">
													<p>适用于</p>
													<p>需要搭建线上商城的个人</p>
												</div>
												<a href="/wizard/info?type=1" class="sf-btn btn-outline-primary btn-sm">立即开店</a>
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
	</div>
</div>

@endsection