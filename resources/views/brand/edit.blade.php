@extends('layouts.dashkit.app')
@section('content')

<div class="row justify-content-center content" style="margin:0px;background-color:#f7f8fa;">
    <div class="sf-product-frm col-12 col-lg-10 col-xl-10">
        <!-- Form -->
        <form id="formEditBrand" method="">
            <div class="my-4"></div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">编辑品牌：【<?php echo $data['brand_name']; ?>】</h3>
                </div>
                <div class="card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <input style="display:none;" name="id" value="<?php echo $data['brand_id']; ?>">
                            <label><em class="sf-required">*</em>品牌LOGO：</label>
                            <small class="form-text text-muted ml-3">
                                标识区分属性之间的模板。
                            </small>
                            <div class="input-group ml-3" id="cupload-edit"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌全名称：</label>
                            <small class="form-text text-muted ml-3">
                                标识区分属性之间的模板。
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="name" value="<?php echo $data['brand_name']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                <div class="input-group-append">
                                    <div class="input-group-text sf-text-13">
                                        <span class="input-word-length">0</span><span>/30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌中文简称（CN）：</label>
                            <small class="form-text text-muted ml-3">
                                用于品牌前台展示的中文名称
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="cn_name" value="<?php echo $data['cn_name']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                <div class="input-group-append">
                                    <div class="input-group-text sf-text-13">
                                        <span class="input-word-length">0</span><span>/30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌英文简称（EN）：</label>
                            <small class="form-text text-muted ml-3">
                                用于品牌前台展示的英文简称
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="en_name" value="<?php echo $data['en_name']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                <div class="input-group-append">
                                    <div class="input-group-text sf-text-13">
                                        <span class="input-word-length">0</span><span>/30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌主营分类：</label>
                            <small class="form-text text-muted ml-3">
                                当前品牌主营的商品分类
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="cat_id" class="form-control sf-cascader" readonly="true" id="sf-category-pid" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌简介：</label>
                            <small class="form-text text-muted ml-3">
                                标识区分属性之间的模板。
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <div class="ml-2" id="editor" name="desc">
                                    <p><?php echo $data['brand_desc']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>是否启用</label>
                                <small class="form-text text-muted ml-3">
                                    只有当启用后，该品类商品才能上架。
                                </small>
                                <div class="btn-group-toggle ml-3" data-toggle="buttons">
                                    <label class="btn btn-white mr-2">
                                        <input type="radio" name="state" <?php echo ($data['is_show'] == 1) ? 'checked="checked"' : ''; ?> class="sf-attrgroup-sate" value="1"> <i class="fe fe-check-circle"></i> 启用
                                    </label>
                                    <label class="btn btn-white ml-2 active">
                                        <input type="radio" name="state" <?php echo ($data['is_show'] == 2) ? 'checked="checked"' : ''; ?> class="sf-attrgroup-sate" value="2"> <i class="fe fe-x-circle"></i> 停用
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="sf-product-push">
        <div class="sf-product-push-body">
            <a href="#" class="sf-btn sf-btn-primary sf-btn-edit">保存</a>
            <a href="#" class="sf-btn btn-info sf-btn-create">取消</a>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/ckeditor/classic/ckeditor.js"></script>
<script src="/assets/dashkit/libs/cupload/cupload.js"></script>
<script src="/assets/dashkit/js/category/sf.cascader.js"></script>
<script src="/assets/dashkit/js/brand/sf.brand.js"></script>
<script>
    $(function() {
        var cuploadEdit = new Cupload({
            ele: '#cupload-edit',
            name: 'brand_logo',
            num: 1,
            data: ['https://dss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1051202618,2738087073&fm=26&gp=0.jpg'],
        });
    });
</script>
@endsection