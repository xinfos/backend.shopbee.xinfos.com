@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">商品属性组</h5>
                    <button class="sf-btn sf-btn-primary sf-btn-create" data-toggle="modal" data-target="#modalVerticalRight">新建分类属性模板</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>属性组</th>
                                <th>属性名</th>
                                <th>单位</th>
                                <th>表单方式</th>
                                <th>表单方式</th>
                                <th>必填</th>
                                <th>状态</th>
                                <th>属性值</th>
                                <th>属性操作</th>
                                <th>属性组操作</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <td rowspan="2">1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                                <td rowspan="2">
                                    <a href="#">添加属性 |</a>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#">上移 |</a>
                                    <a href="#">下移 |</a>
                                    <a href="#">编辑 |</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade fixed-right" id="modalVerticalRight" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">模板</h4>
                <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#modalActivityAction">新增模板</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-10">
                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>属性名称：</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>属性单位</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mb-1">属性表单展示方式</label>
                                <small class="form-text text-muted">
                                    主要用于配置商品信息时候，属性按照指定表单形式展现。
                                </small>
                                <select id="product_brand" class="custom-select" data-toggle="select">
                                    <option value="">输入框</option>
                                    <option value="">单选框</option>
                                    <option value="">多选框</option>
                                    <option value="">选择框</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>是否为必填项</label>
                                <small class="form-text text-muted">
                                    维护商品信息的时该属性是否必填。
                                </small>
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-white active">
                                        <input type="radio" name="options" id="option1" checked=""> <i class="fe fe-check-circle"></i> 必填
                                    </label>
                                    <label class="btn btn-white ml-3">
                                        <input type="radio" name="options" id="option2"> <i class="fe fe-x-circle"></i> 非必填
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>是否开启搜索</label>
                                <small class="form-text text-muted">
                                   开启后当前属性将参与商品搜索。
                                </small>
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-white active">
                                        <input type="radio" name="options" id="option1" checked=""> <i class="fe fe-check-circle"></i> 开启
                                    </label>
                                    <label class="btn btn-white ml-2">
                                        <input type="radio" name="options" id="option2"> <i class="fe fe-x-circle"></i> 关闭
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>状态</label>
                                <small class="form-text text-muted">
                                    主要用于配置商品信息时候，属性按照指定表单形式展现。
                                </small>
                                <div class="row">
							<div class="col-auto">
								<!-- Switch -->
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="switchOne">
									<label class="custom-control-label" for="switchOne">
									</label>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="mt-3">
			<div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <label>属性值</label>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>属性值</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <a href="#">上移 |</a>
                                            <a href="#">下移 |</a>
                                            <a href="#">编辑 |</a>
                                            <a href="#">删除</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <a href="#">上移 |</a>
                                            <a href="#">下移 |</a>
                                            <a href="#">编辑 |</a>
                                            <a href="#">删除</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3">
			<div class="row mt-5">
				<div class="col-12 col-md-6">
                    <button class="sf-btn sf-btn-primary mr-2">保存</button>
                    <button class="sf-btn btn-white">保存</button>
				</div>
			</div>
		</form>
		<br>
		<br>
	</div>
</div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/select2/select2.full.min.js"></script>
@endsection
