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
					<form class="zent-form zent-form--horizontal">
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
								店铺名称：
							</label>
							<div class="zent-form__controls">
								<div>
									<div class="zent-input-wrapper">
										<input type="text" class="zent-input" name="team_name" value="" placeholder="请输入店铺名称，建议15字以内">
									</div>
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
											<div class="zent-region-select__text is-placeholder">
												请选择省 / 市 / 区
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
							</label>
							<div class="zent-form__controls">
								<div class="address-field">
									<div class="address-input-wrap">
										<div class="zent-input-wrapper">
											<input type="text" class="zent-input" name="address" value="" placeholder="请填写详细地址">
										</div>
									</div>
									<button type="button" class="zent-btn search-map-btn">
										<span>
											搜索地图
										</span>
									</button>
								</div>
							</div>
						</div>
						<div class="zent-form__control-group ">
							<label class="zent-form__control-label">
								店铺地址：
							</label>
							<div class="zent-form__controls">
								<div class="map-field">
									<div class="map-wrapper">
										<div id="amap" style="width: 490px; height: 315px; position: relative; background: rgb(252, 249, 242);"
										class="amap-container">
											<object style="display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; pointer-events: none; z-index: -1;"
											type="text/html" data="about:blank">
											</object>
											<div class="amap-maps">
												<div class="amap-drags" style="">
													<div class="amap-layers" style="transform: translateZ(0px);">
														<div class="amap-markers" style="position: absolute; z-index: 120; top: 157px; left: 245px;">
															<div class="amap-marker" style="top: -31px; left: -9px; z-index: 100; transform: rotate(0deg); transform-origin: 9px 31px; display: none;">
																<div class="amap-icon" style="position: absolute; overflow: inherit; opacity: 1;">
																	<img src="http://webapi.amap.com/theme/v1.3/markers/n/mark_b.png" style="top: 0px; left: 0px;">
																</div>
															</div>
														</div>
														<canvas class="amap-layer" width="490" height="315" style="position: absolute; z-index: 0; top: 0px; left: 0px; height: 315px; width: 490px;">
														</canvas>
														<canvas class="amap-labels" draggable="false" width="490" height="315"
														style="position: absolute; z-index: 99; height: 315px; width: 490px; top: 0px; left: 0px;">
														</canvas>
													</div>
													<div class="amap-overlays" style="">
													</div>
												</div>
											</div>
											<div style="display: none;">
											</div>
											<div class="amap-controls">
												<div class="amap-toolbar" style="left: 10px; top: 10px; visibility: visible;">
													<div class="amap-pancontrol" style="position: relative; display: block;">
														<div class="amap-pan-left">
														</div>
														<div class="amap-pan-top">
														</div>
														<div class="amap-pan-right">
														</div>
														<div class="amap-pan-bottom">
														</div>
													</div>
													<div class="amap-locate" style="position: relative; left: 17px; display: block;">
													</div>
													<div class="amap-zoomcontrol" style="position: relative; left: 14px;">
														<div class="amap-zoom-plus">
														</div>
														<div class="amap-zoom-ruler" style="display: block;">
															<div class="amap-zoom-mask" style="height: 54px;">
															</div>
															<div class="amap-zoom-cursor" style="top: 54px;">
															</div>
															<div class="amap-zoom-labels">
																<div class="amap-zoom-label-street">
																</div>
																<div class="amap-zoom-label-city">
																</div>
																<div class="amap-zoom-label-province">
																</div>
																<div class="amap-zoom-label-country">
																</div>
															</div>
														</div>
														<div class="amap-zoom-minus">
														</div>
													</div>
												</div>
												<div class="amap-scalecontrol" style="left: 2px; bottom: 20px; visibility: visible;">
													<div class="amap-scale-text" style="width: 76.218px;">
														2 公里
													</div>
													<div class="amap-scale-line">
														<div class="amap-scale-edgeleft">
														</div>
														<div class="amap-scale-edgeright" style="left: 69.218px;">
														</div>
														<div class="amap-scale-middle" style="width: 68.218px;">
														</div>
													</div>
												</div>
											</div>
											<a class="amap-logo" href="http://gaode.com" target="_blank" style="display: block;">
												<img src="https://webapi.amap.com/theme/v1.3/logo@1x.png">
											</a>
											<div class="amap-copyright" style="display: none; visibility: visible;">
												<!--v1.4.3-->
												© 2020 AutoNavi
												<span class="amap-mcode">
													- GS(2018)1709号
												</span>
											</div>
										</div>
										<div id="map-search-result">
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
										<a href="//www.youzan.com/intro/rule/detail?alias=8r720e20&amp;pageType=rules "
										target="_blank" rel="noopener noreferrer">
											《有赞微商城连锁订购及服务协议》
										</a>
										<!-- react-text: 77 -->
										和
										<!-- /react-text -->
										<a href="https://bbs.youzan.com/forum.php?mod=viewthread&amp;tid=674132&amp;highlight="
										target="_blank" rel="noopener noreferrer">
											《有赞支付开户及服务协议》
										</a>
									</span>
								</label>
							</div>
						</div>
						<div>
							<button type="submit" class="zent-btn-primary zent-btn-large zent-btn create-shop-btn">
								<span>
									创建店铺
								</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection