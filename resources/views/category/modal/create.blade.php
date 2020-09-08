<style>
    .sf-cascader-content {
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 10rem;
        padding: .5rem 0;
        margin: 0 0 0;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(18, 38, 63, .1);
        border-radius: .375rem
    }

    [class*=sf-cascader] {
        display: block
    }
    .sf-cascader-res__opts{
        padding-left: 0;
        margin-bottom: 0;
    }
    .sf-cascader-res__opt {
        padding: .375rem .75rem;
        color: #6e84a3;
        font-size:14px;
    }

    .sf-cascader-res__opt:not(.select2-results__message) {
        cursor: pointer
    }

    .sf-cascader-res__opt:not(.select2-results__message):focus,
    .sf-cascader-res__opt:not(.sf-cascader-active):hover {
        font-weight:600;
        color: #000;
        background-color: #e6f7ff;
    }

    .sf-cascader-res__opt--highlighted,
    .sf-cascader-res__opt[aria-selected=true] {
        color: #2c7be5
    }

    .sf-cascader-active {
        /* font-weight:600; */
        font-size:14px;
        color: white;
        background-color: #086aeef2;
    }


</style>
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
                            <div class="mt-4">
                                <form id="formCreateCategory" action="">
                                    <div class="row mt-2">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>分类名称：</label>
                                                <input type="text" name="name" class="form-control" id="sf-attr-name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>分类别名：</label>
                                                <input type="text" name="unit" class="form-control" id="sf-attr-unit">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="mb-1"><em class="sf-required">*</em>父级分类</label>
                                                <small class="form-text text-muted">分类层级关联，默认新建为顶级分类。</small>
                                                <input type="text" name="unit" class="form-control" readonly="true" id="sf-category-pid">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label><em class="sf-required">*</em>是否显示</label>
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
                                                <label><em class="sf-required">*</em>是否启用</label>
                                                <small class="form-text text-muted">开启后，可在当前分类下添加相关商品，默认关闭</small>
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
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-12">
                                            <button type="button" class="sf-btn sf-btn-primary sf-btn-saveAttrs mr-2">保 存</button>
                                            <button type="button" class="sf-btn btn-white">取 消</button>
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
<script src="/assets/dashkit/js/category/sf.cascader.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrsgroup.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrsvals.js"></script>
<script>
    $(function () {
        $('#sf-category-pid').on('click', function(){
            $(this).sFCascader();
        });
    });
</script>
