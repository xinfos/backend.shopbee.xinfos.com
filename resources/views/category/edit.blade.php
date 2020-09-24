@extends('layouts.dashkit.app')
@section('content')

<div class="row justify-content-center content" style="margin:0px;background-color:#f7f8fa;">
    <div class="sf-product-frm col-12 col-lg-10 col-xl-10">
        <!-- Form -->
        <form id="formEditCategory" method="">
            <div class="my-4"></div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">编辑分类：【<?php echo $data['name']; ?>】</h3>
                </div>
                <div class="card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>分类名称：</label>
                            <small class="form-text text-muted ml-3"></small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="cat_id" value="<?php echo $data['cat_id']; ?>" class="no-display">
                                <input type="text" name="cat_name" value="<?php echo $data['name']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
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
                            <label><em class="sf-required">*</em>分类别名：</label>
                            <small class="form-text text-muted ml-3">
                                用于品牌前台展示的中文名称
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="alias" value="<?php echo $data['alias']; ?>" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
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
                            <label><em class="sf-required">*</em>当前父类：</label>
                            <small class="form-text text-muted ml-3">当前品牌主营的商品分类</small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" name="pid" class="form-control sf-cascader" readonly="true" id="sf-category-pid" value="<?php echo $data['pid']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>分类描述：</label>
                            <small class="form-text text-muted ml-3">对当前的分类简单描述</small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <textarea class="ml-2" id="editor" name="desc"><?php echo $data['desc']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>是否启用</label>
                            <small class="form-text text-muted ml-3">
                                只有当启用后，该品类商品才能上架。
                            </small>
                            <div class="btn-group-toggle ml-3" data-toggle="buttons">
                                <label class="btn btn-white mr-2">
                                    <input type="radio" name="state" <?php echo ($data['state'] == 1) ? 'checked="checked"' : ''; ?> class="sf-attrgroup-sate" value="1"> <i class="fe fe-check-circle"></i> 启用
                                </label>
                                <label class="btn btn-white ml-2 active">
                                    <input type="radio" name="state" <?php echo ($data['state'] == 2) ? 'checked="checked"' : ''; ?> class="sf-attrgroup-sate" value="2"> <i class="fe fe-x-circle"></i> 停用
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
            <a href="javascript:void(0);" class="sf-btn sf-btn-primary sf-btn-save">保存</a>
            <a href="javascript:history.go(-1)" class="sf-btn">取消</a>
        </div>
    </div>
</div>

<script src="/assets/dashkit/js/ckeditor/classic/ckeditor.js"></script>
<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/category/sf.cascader.js"></script>
<script src="/assets/dashkit/js/category/sf.category.js"></script>
<script type="text/javascript">
    $(function() {
        $('#sf-category-pid').sFCascader();
    });
    var EditEditor = null;
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            EditEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection