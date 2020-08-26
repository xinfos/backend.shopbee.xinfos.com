<div class="modal fade fixed-right" id="modalCreateAttrs" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">模板</h4>
                <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab">新增模板</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-10">
                        <form id="fromCreateAttrs" action="">
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label><em class="sf-required">*</em>属性名称：</label>
                                        <input type="text" name="name" class="form-control" id="sf-attr-name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>属性单位</label>
                                        <input type="text" name="unit" class="form-control" id="sf-attr-unit">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-1"><em class="sf-required">*</em>属性表单展示方式</label>
                                        <small class="form-text text-muted">主要用于配置商品信息时候，属性按照指定表单形式展现。</small>
                                        <select class="custom-select" name="fill_type" data-toggle="select" id="sf-attr-fillType" >
                                            <option value="1" selected="selected">输入框</option>
                                            <option value="2">单选框</option>
                                            <option value="3">多选框</option>
                                            <option value="4">选择框</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label><em class="sf-required">*</em>是否为必填项</label>
                                        <small class="form-text text-muted">维护商品信息的时该属性是否必填。</small>
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-white active">
                                                <input type="radio" name="is_required" id="sf-attr-required" value="1" checked="checked"> <i class="fe fe-check-circle"></i> 必填
                                            </label>
                                            <label class="btn btn-white ml-3">
                                                <input type="radio" name="is_required" id="sf-attr-required" value="2"> <i class="fe fe-x-circle"></i> 非必填
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label><em class="sf-required">*</em>是否开启搜索</label>
                                        <small class="form-text text-muted">开启后当前属性将参与商品搜索。</small>
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-white active">
                                                <input type="radio" name="is_search" id="sf-attr-search" value="1"> <i class="fe fe-check-circle"></i> 开启
                                            </label>
                                            <label class="btn btn-white ml-2">
                                                <input type="radio" name="is_search" id="sf-attr-search" value="2" checked="checked"> <i class="fe fe-x-circle"></i> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>状态</label>
                                        <small class="form-text text-muted">主要用于配置商品信息时候，属性按照指定表单形式展现。</small>
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-white active">
                                                <input type="radio" name="state" value="1"> <i class="fe fe-check-circle"></i> 正常
                                            </label>
                                            <label class="btn btn-white ml-2">
                                                <input type="radio" name="state" value="2" checked="checked"> <i class="fe fe-x-circle"></i> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="mt-3">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-header-title">属性值</h4>
                                                <button type="button" class="sf-btn sf-btn-primary">添加属性值</button>
                                            </div>
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
                                                            <td class="1">1</td>
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
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 col-md-6">
                                    <button type="button" class="sf-btn sf-btn-primary sf-btn-saveAttrs mr-2">保存</button>
                                    <button type="button" class="sf-btn btn-white">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/dashkit/libs/select2/select2.full.min.js"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrsgroup.js"></script>