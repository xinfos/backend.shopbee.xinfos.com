<div class="modal fade fixed-right" id="modalCreateBrand" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">商品品牌管理</h4>
                <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab">新建品牌</a>
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
                                            <h1 class="header-title">新建品牌</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sf-alert-el mt-4">
                                <div class="alert alert-dismissible" style="display:none;">
                                    <span class="alert-content"></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <form id="formCreateBrand" action="">
                                    <div class="row mt-2">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>品牌LOGO：</label>
                                                <div class="ml-3" id="cupload-create"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>品牌全称：</label>
                                                <input type="text" name="brand_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>品牌中文简称（CN）：</label>
                                                <input type="text" name="cn_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>品牌英文简称（EN）：</label>
                                                <input type="text" name="en_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>品牌首字母：</label>
                                                <input type="text" name="first_word" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="mb-1"><em class="sf-required">*</em>品牌主营分类</label>
                                                <small class="form-text text-muted">分类层级关联，默认新建为顶级分类。</small>
                                                <input type="text" name="cat_id" class="form-control sf-cascader" readonly="true" id="sf-category-pid" value="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="mb-1"><em class="sf-required">*</em>品牌简介</label>
                                                <small class="form-text text-muted">分类层级关联，默认新建为顶级分类。</small>
                                                <textarea type="text" name="brand_desc" class="form-control"></textarea>
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
                                            <button type="button" class="sf-btn sf-btn-primary sf-btn-create">保 存</button>
                                            <button type="button" class="sf-btn btn-white ml-2" data-dismiss="modal" aria-label="Close">取 消</button>
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
<script src="/assets/dashkit/libs/cupload/cupload.js"></script>
<script src="/assets/dashkit/js/category/sf.cascader.js"></script>
<script>
    $(function() {
        var cuploadCreate = new Cupload({
            ele: '#cupload-create',
            url: '/attachment/upload/image',
            maxSize: 1024,
            num: 1,
        });
    });
</script>