@extends('layouts.dashkit.app')

@section('content')
<style type="text/css">
    .RadioStyle input {
        display: none
    }

    .RadioStyle label {
        border: 1px solid #e3ebf6;
        color: #13273f;
        line-height: 35px;
        min-width: 80px;
        text-align: center;
        float: left;
        margin: 3px;
        font-size: 13px;
        border-radius: 2px
    }

    .RadioStyle input:checked+label {
        /* background: url(/assets/images/ico_checkon.svg) no-repeat right bottom; */
        border: 1px solid #0767e8;
        background-size: 21px 21px;
        color: #0767e8
    }

    .RadioStyle input:disabled+label {
        opacity: 0.7;
    }
</style>
<div class="row justify-content-center" style="margin:0px;margin-bottom: 100px;background-color:#f7f8fa;">
    <div class="col-12 col-lg-10 col-xl-10">
        <div class="header mt-md-5">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="header-title">新建 - 属性模板</h1>
                    </div>
                </div>
            </div>
        </div>
        <form id="formAttrsTemplate">
            <div class="row align-items-center mt-4">
                <div class="col-auto">
                    <div class="row align-items-center">
                        <div class="col mt-2">
                            <h5 class="mb-1">商品类目：<?php echo $category['name']; ?></h5>
                            <input type="hidden" class="sf-attrgroup-cate" name="cat_id" value="<?php echo $category['cat_id']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="/setting/product/category/select" class="sf-btn sf-btn-primary">切换类目</a>
                </div>
            </div>

            <hr class="my-4" id="basic-info">

            <!-- basic-info -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">基础信息</h3>
                </div>
                <div class="card-body">
                    <div class="col-5">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>属性模板名称：</label>
                            <small class="form-text text-muted ml-3">
                                标识区分属性之间的模板。
                            </small>
                            <div class="input-group input-group-merge ml-3 mb-3">
                                <input type="text" maxlength="30" name="name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                <div class="input-group-append">
                                    <div class="input-group-text sf-text-13">
                                        <span class="input-word-length name-length">0</span><span>/30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>是否启用模板</label>
                            <small class="form-text text-muted ml-3">
                                启用模板后，可在添加商品中使用
                            </small>
                            <div class="col-md-8 btn-group-toggle d-flex" data-toggle="buttons">
                                <label class="btn btn-white col mr-2">
                                    <input type="radio" name="state" class="sf-attrgroup-sate" value="1"> <i class="fe fe-check-circle"></i> 启用
                                </label>
                                <label class="btn btn-white col ml-2 active">
                                    <input type="radio" name="state" class="sf-attrgroup-sate" value="2" checked="checked"> <i class="fe fe-x-circle"></i> 停用
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- spec-info -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">模板 - 规格信息</h3>
                </div>
                <div class="card-body">
                    <div class="col-5">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>规格属性：</label>
                            <div class="input-group ml-3 mb-3">
                                <input type="text" name="spec_attr_name" class="form-control sf-attrgroup-spec-search" placeholder="搜索相关规格属性">
                                <a href="javascript:void(0);" class="sf-btn sf-btn-primary sf-attrgroup-spec-search" style="height:calc(1.5em + 1.3rem + 2px);line-height:calc(1.5em + 1.2rem + 2px);"><i class="fe fe-search"></i></a>
                            </div>
                            <small class="form-text text-muted ml-3">
                                标题和描述关键词是否违规自检工具：商品合规工具。
                            </small>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group">
                            <div class="RadioStyle ml-3">
                                <div class="Block PaddingL sf-spec-attr-checklist"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- common-info -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">模板 - 公共信息</h3>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>属性组：</label>
                            <small class="form-text text-muted ml-3">
                                点击 <a href="javascript:void(0);" class="sf-attrgroup-add"> 添加属性组</a>， 创建相应的属性组名称
                            </small>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mb-0">

                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>属性组名称</th>
                                                    <th class="text-center">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
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
        <a href="javascript:void(0);" class="sf-btn sf-btn-primary sf-btn-create">保 存</a>
        <a href="javascript:void(0);" class="sf-btn ml-3">取 消</a>
    </div>
</div>
<script src="/assets/dashkit/libs/bootstrapvalidator/dist/frm.js"></script>
<script src="/assets/dashkit/js/attrs/sf.attrsgroup.js"></script>
@endsection