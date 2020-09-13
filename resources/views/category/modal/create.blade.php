<div class="modal fade fixed-right" id="modalCreateCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">商品分类管理</h4>
                <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab">新建</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-10">
                            <div class="header">
                                <div class="header-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h1 class="header-title">新建商品分类</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sf-alert-el mt-4">
                                <div class="alert alert-dismissible" style="display:none;">
                                    <span class="alert-content">111</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <form id="formCreateCategory" action="">
                                    <div class="row mt-2">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>分类名称：</label>
                                                <input type="text" name="cat_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>分类别名：</label>
                                                <input type="text" name="cat_alias" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="mb-1"><em class="sf-required">*</em>父级分类</label>
                                                <small class="form-text text-muted">分类层级关联，默认新建为顶级分类。</small>
                                                <input type="text" name="pid" class="form-control sf-cascader" readonly="true" id="sf-category-pid" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>是否显示</label>
                                                <small class="form-text text-muted">维护商品信息的时该属性是否必填。</small>
                                                <div class="btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-white active">
                                                        <input type="radio" name="is_show" value="1" checked="checked"> <i class="fe fe-check-circle"></i> 必填
                                                    </label>
                                                    <label class="btn btn-white ml-3">
                                                        <input type="radio" name="is_show" value="2"> <i class="fe fe-x-circle"></i> 非必填
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>是否启用</label>
                                                <small class="form-text text-muted">开启后，可在当前分类下添加相关商品，默认关闭</small>
                                                <div class="btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-white active">
                                                        <input type="radio" name="state" value="1"> <i class="fe fe-check-circle"></i> 开启
                                                    </label>
                                                    <label class="btn btn-white ml-2">
                                                        <input type="radio" name="state" value="2" checked="checked"> <i class="fe fe-x-circle"></i> 关闭
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-12">
                                            <button type="button" class="sf-btn sf-btn-primary sf-category-add mr-2">保 存</button>
                                            <button type="button" class="sf-btn btn-white" data-dismiss="modal" aria-label="Close">取 消</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/category/sf.category.js"></script>
<script src="/assets/dashkit/js/category/sf.cascader.js"></script>
<script type="text/javascript">
    $(function () {
        $('#sf-category-pid').sFCascader();
    });
</script>
