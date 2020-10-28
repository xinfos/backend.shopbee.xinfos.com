@extends('layouts.dashkit.app')

@section('content')
<div class="row justify-content-center" style="margin:0px;margin-bottom: 100px;background-color:#f7f8fa;">
	<div class="col-12 col-lg-10 col-xl-10">
		<div class="header"></div>
		<div class="mt-4"></div>
		<form id="formEditAttrs">
			<!-- basic-info -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-header-title">基础信息</h3>
				</div>
				<div class="card-body">
					<div class="col-12">
						<div class="sf-alert-el"></div>
					</div>
					<div class="col-5">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性名称：</label>
							<div class="input-group input-group-merge ml-3 mb-3">
								<input type="hidden" name="attr_id" value="<?php echo $data['id']; ?>">
								<input type="text" maxlength="30" name="name" value="<?php echo $data['name']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
								<div class="input-group-append">
									<div class="input-group-text sf-text-13">
										<span class="input-word-length name-length">0</span><span>/30</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性值填充方式</label>
							<small class="form-text text-muted ml-3">
								启用模板后，可在添加商品中使用
							</small>
							<div class="col-md-6 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col mr-2">
									<input type="radio" name="fill_type" value="1" <?php echo ($data['fill_type'] == 1) ? 'checked' : ''; ?>>选项框
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="fill_type" value="2" <?php echo ($data['fill_type'] == 2) ? 'checked' : ''; ?>>文本框
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="fill_type" value="3" <?php echo ($data['fill_type'] == 3) ? 'checked' : ''; ?>>选择框
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="fill_type" value="4" <?php echo ($data['fill_type'] == 4) ? 'checked' : ''; ?>>单选框
								</label>
							</div>
						</div>
					</div>
					<div class="col-10">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性值是否为数字类型</label>
							<small class="form-text text-muted ml-3">
								启用模板后，可在添加商品中使用
							</small>
							<div class="col-md-4 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col mr-2">
									<input type="radio" name="is_numeric" value="1" <?php echo ($data['is_numeric'] == 1) ? 'checked' : ''; ?>>是
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="is_numeric" value="2" <?php echo ($data['is_numeric'] == 2) ? 'checked' : ''; ?>>否
								</label>
							</div>
						</div>
					</div>
					<div class="col-10">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性是否支持搜索</label>
							<small class="form-text text-muted ml-3">
								启用模板后，可在添加商品中使用
							</small>
							<div class="col-md-4 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col mr-2">
									<input type="radio" name="is_searching" value="1" <?php echo ($data['is_searching'] == 1) ? 'checked' : ''; ?>>需要搜索
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="is_searching" value="2" <?php echo ($data['is_searching'] == 2) ? 'checked' : ''; ?>>不需要搜索
								</label>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性单位：</label>
							<div class="input-group ml-3 mb-3">
								<input type="text" maxlength="5" name="unit" value="<?php echo $data['unit']; ?>" class="form-control form-control-appended" placeholder="最多允许输入3个汉字（6字符）">
								<div class="input-group-append">
									<div class="input-group-text sf-text-13">
										<span class="input-word-length name-length">0</span><span>/5</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-10">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性是否为必填属性</label>
							<small class="form-text text-muted ml-3">
								属性为【必填】时，商品配置的时候必须填写具体的信息
							</small>
							<div class="col-md-4 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col mr-2">
									<input type="radio" name="is_required" value="1" <?php echo ($data['is_required'] == 1) ? 'checked' : ''; ?>>是
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="is_required" value="2" <?php echo ($data['is_required'] == 2) ? 'checked' : ''; ?>>否
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="sf-push-footer">
	<div class="sf-push-content">
		<a href="javascript:void(0);" class="sf-btn sf-btn-primary sf-btn-save">保 存</a>
		<a href="/setting/product/attrs/list" class="sf-btn ml-3">取 消</a>
	</div>
</div>
<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrs.js"></script>
@endsection