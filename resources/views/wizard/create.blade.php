@extends('layouts.base')

@section('content')

<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">
<link rel="stylesheet" type="text/css" href="/assets/css/city/picker.css">

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
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">2. 选择版本</div>
		            </div>
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">3. 经营信息</div>
		            </div>
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">4. 店铺信息</div>
		            </div>
		            <div class="zent-steps-item is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">5. 完成</div>
		            </div>
		        </div>
				<div class="create-shop">
					<div class="create">
                        <h1 style="padding-top: 0px;">请填写店铺基本信息</h1>
					</div>
					<form class="zent-form zent-form--horizontal" style="padding-left: 60px;">
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
								店铺名称：
							</label>
							<div class="zent-form__controls has-error">
								<div>
									<div class="zent-input-wrapper">
										<input type="text" class="zent-input" name="name" value="" placeholder="请输入店铺名称，建议15字以内">
									</div>
									<p class="zent-form__error-desc"></p>
								</div>
							</div>
						</div>
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
								店铺地址：
							</label>
							<div class="zent-form__controls">
								<div class="zent-region-select-wrap ">
									<div class="zent-popover-wrapper" style="display: block;">
										<div class="zent-region-select">
											<div id="distpicker">
												<div class="form-group">
													<div style="position: relative;">
														<input id="city-picker3" class="form-control" name="city" readonly type="text" value="请选择省 / 市 / 区" data-toggle="city-picker" placeholder="请选择省 / 市 / 区">
													</div>
												</div>
											</div>
										</div>
										<p class="zent-form__error-desc"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
								详细地址：
							</label>
							<div class="zent-form__controls">
								<div class="address-field">
									<div class="address-input-wrap">
										<div class="zent-input-wrapper">
											<input type="text" class="zent-input" name="address" value="" placeholder="请填写详细地址" has-error>
											<p class="zent-form__error-desc"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="zent-form__control-group">
							<label class="zent-form__control-label">
							</label>
							<div class="zent-form__controls">
								<label class="zent-form__checkbox zent-checkbox-wrap zent-checkbox-checked">
									<span class="zent-checkbox">
										<span class="zent-checkbox-inner">
										</span>
										<input type="checkbox" value="on">
									</span>
									<span>
										我已阅读并同意
										<a href="#" target="_blank" rel="noopener noreferrer">《订购及服务协议》 </a>
										和
										<a href="#" target="_blank" rel="noopener noreferrer"> 《支付开户及服务协议》</a>
									</span>
								</label>
							</div>
						</div>
						<div>
							<a href="/wizard/success" class="btn btn-info create-shop-btn" style="margin-left: 133px;">创建店铺</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/jquery-1.9.1.min.js"></script>
<script src="/assets/js/city/city-picker.data.js"></script>
<script src="/assets/js/city/city-picker.js"></script>
<script src="/assets/js/city/city.js"></script>
<script type="text/javascript">
	var wizardCreatFrm = {
		errmsg: {
			errAddress: "请填写店铺详细地址",
			errCity: "省 / 市 / 区不能为空",
			errShop: "店铺名称不能为空",
		},
		verify: function() {
			
		}
	}
	wizardCreatFrm.verify();
</script>
@endsection