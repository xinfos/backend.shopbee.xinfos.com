@extends('layouts.dashkit.top_app')

@section('content')

<link rel="stylesheet" type="text/css" href="/assets/dashkit/js/wizard/dist/css/wizard.css">
<link rel="stylesheet" type="text/css" href="/assets/dashkit/libs/city/dist/css/picker.css">

<!--Js Lib -->
<script src="/assets/dashkit/libs/city/city-picker.data.js"></script>
<script src="/assets/dashkit/libs/city/city-picker.js"></script>
<script src="/assets/dashkit/libs/city/city.js"></script>

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
								<a href="/shop/wizard/choose?type=<?php echo !empty($data['type']) ? $data['type'] : 1; ?>">
									<div class="zent-steps-step">1. 选择店铺类型</div>
								</a>
							</div>
							<div class="zent-steps-item is-clicked is-finish" style="width: 33%;">
								<div class="zent-steps-step">2. 店铺信息</div>
							</div>
							<div class="zent-steps-item is-clicked" style="width: 33%;">
								<div class="zent-steps-step">3. 完成</div>
							</div>
						</div>
					</div>
					<div class="create-shop">
						<div class="create">
							<h1>请填写店铺基本信息</h1>
						</div>
						<div class="sf-alert-el mb-5"></div>
						<form id="formCreateShop" class="zent-form zent-form--horizontal" style="padding-left: 60px;">
							<div class="zent-form__control-group ">
								<label class="zent-form__control-label">
									店铺名称：
								</label>
								<div class="zent-form__controls">
									<div>
										<div class="zent-input-wrapper">
											<input type="text" class="zent-input" name="name" value="" placeholder="请输入店铺名称，建议15字以内">
											<input type="hidden" class="zent-input" name="type" value="<?php echo $data['type']; ?>" />
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
															<input id="city-picker3" class="form-control" name="city" readonly type="text" value="" data-toggle="city-picker" placeholder="请选择省 / 市 / 区">
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
											<input type="checkbox" name="is_agree" value="1">
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
								<a href="javascript:void(0);" class="sf-btn btn-outline-primary sf-create-shop" style="margin-left: 133px;">创建店铺</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/wizard/sf.wizard.js"></script>

@endsection