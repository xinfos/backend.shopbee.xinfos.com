@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" href="/assets/dashkit/css/staff/app.css">
<div class="header"></div>
<div class="container-fluid" >
	<div class="row justify-content-center" style="margin:0px;">
		<div class="col-12" style="padding: 0px;">
			<div class="card">
				<div class="card-body">
					<h5 class="card-header-title">发布商品</h5>
					<div class="sf-row">
						<div class="sf-product-region-title">
							<div class="sf-product-title-inner">基本信息</div>
						</div>
						<div class="sf-row-product ">
							<div class="sf-form-group">
								<label class="sf-label"><em class="sf-required">*</em> 商品名称:</label>
								<input class="sf-form-control" name="name" id="s_name" placeholder="商品名称" value="">
								<p class="help-block"></p>
							</div>
							<div class="sf-form-group">
								<label class="sf-label">分享描述:</label>
								<input class="sf-form-control" name="name" id="s_name" placeholder="分享描述" value="">
								<p class="help-block">分享到其他的平台给好友时会显示，建议36个字以内 <a href="#">查看示例</a></p>
							</div>
							<div class="sf-form-group">
								<label class="sf-label">商品卖点:</label>
								<input class="sf-form-control" name="name" id="s_name" placeholder="商品卖点" value="">
								<p class="help-block">在商品详情页标题下面展示卖点信息，建议60字以内 <a href="#">查看示例</a></p>
							</div>
							<div class="sf-form-group">
								<label class="sf-label">商品属性:</label>
								<div class="sf-product-props">
									<?php foreach($item['attrs_template'] as $v) { ?>
										<?php foreach($v as $vv) { ?>
											<?php if(empty($vv['attrs'])) continue;?>
											<?php foreach($vv['attrs'] as $vvv) {?>
												<div class="sf-form-group">
													<label class="sf-label" style="margin-left: 15px;"><?php echo $vvv['attr_name']?>:</label>
													<?php if($vvv['fill_type'] == 1) { ?>
													<?php } elseif ($vvv['fill_type'] == 2) { ?>
														<input class="sf-form-control" name="name" id="s_name" placeholder="商品卖点" value="">
													<?php } else { ?>
													<?php }?>
													<p class="help-block">在商品详情页标题下面展示卖点信息，建议60字以内 <a href="#">查看示例</a></p>
												</div>
											<?php }?>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
							<div class="sf-form-group">
								<label class="sf-label"><em class="sf-required">*</em> 商品图:</label>
								<div class="sf-form-control">
									<span id="cupload-create"></span>
								</div>
							</div>
						</div>
						<div class="sf-product-region-title">
							<div class="sf-product-title-inner">价格库存</div>
						</div>
						<div class="sf-row-product ">
							<div class="sf-form-group">
								<label class="sf-label">商品规格:</label>
								<div class="sf-form-control">
									<div class="sf-product-region-title">
										<div class="sf-product-title-inner">规格名：</div>
									</div>
									<span>规格值:</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/assets/dashkit/libs/cupload/cupload.js"></script>
<script type="text/javascript">
			var cuploadCreate = new Cupload ({
			ele: '#cupload-create',
			num: 8,
		});
</script>
@endsection