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
			<div class="zent-loading-container zent-loading-container-static" style="height: initial;">
				<div class="team-content">
					<div>
						<div class="zent-steps zent-steps-breadcrumb step-block">
							<div class="zent-steps-item is-clicked" style="width: 33%;">
								<div class="zent-steps-step">1. 选择店铺类型</div>
							</div>
							<div class="zent-steps-item is-clicked" style="width: 33%;">
								<div class="zent-steps-step">2. 店铺信息</div>
							</div>
							<div class="zent-steps-item is-clicked is-finish" style="width: 33%;">
								<div class="zent-steps-step">3. 完成</div>
							</div>
						</div>
						<div class="create-shop">
							<div class="wizard">
								<div class="box">
									<div class="wizard-nav"></div>
									<div class="row align-items-center mt-6">
										<div class="col-12 mt-3">
											<div class="text-center">
												<h6 class="text-uppercase text-muted mb-4"></h6>
												<h1 class="display-5 mb-3">店铺已经创建完成</h1>
												<p class="text-muted mb-4">
													您的店铺已经初始化成功，赶紧进入吧 !~
												</p>
												<a href="javascript:void(0);" class="sf-btn btn-lg sf-btn-primary">快速进入店铺内，进行管理</a>
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