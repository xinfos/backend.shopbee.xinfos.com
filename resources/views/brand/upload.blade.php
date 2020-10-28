@extends('layouts.dashkit.app')
@section('content')

<div class="row justify-content-center content" style="margin:0px;background-color:#f7f8fa;">
    <div class="sf-product-frm col-12 col-lg-10 col-xl-10">
        <!-- Form -->
        <form id="formEditBrand" method="">
            <div class="my-4"></div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">TEST</h3>
                </div>
                <div class="card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>品牌LOGO：</label>
                            <small class="form-text text-muted ml-3">
                                标识区分属性之间的模板。
                            </small>
                            <div class="input-group ml-3" id="cupload-edit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="sf-product-push">
            <div class="sf-product-push-body">
                <button class="sf-btn sf-btn-primary" data-toggle="modal" data-target="#modalCreateCategory">新建分类</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalCreateCategory" role="dialog" aria-hidden="true" style="width: 900px; max-width: 1000px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">图片空间
                    <small class="text-muted">（图片要求：宽高比为1:1，宽高大于480px，单张图片小于3MB）</small>
                    <small><a href="#">示例图片</a></small>
                </h4>
            </div>
            <div class="MDL_body_4-64-0" style="padding: 12px 20px;">
                <div class="BeastMaterialModal___content___13wyK">
                    <div class="BeastMaterialModal___tab-wrapper___2v0DO">
                        <div class="BeastMaterialModal___tab___1dQI9">
                            <div class="BeastShowTypeTab___tab-list___1aBAA">
                                <i data-testid="beast-core-icon-all" class="ICN_outerWrapper_4-64-0 ICN_type-all_4-64-0 " style="font-size: 16px; color: rgb(17, 153, 238);">
                                </i>
                                <i data-testid="beast-core-icon-list" class="ICN_outerWrapper_4-64-0 ICN_type-list_4-64-0 " style="font-size: 16px; color: rgb(102, 102, 102); margin: 0px 24px 0px 12px;">
                                </i>
                            </div>
                            <div class="BeastMaterialModal___search___1pW_I">
                                <div data-testid="beast-core-input" class="IPT_outerWrapper_4-64-0 IPT_medium_4-64-0">
                                    <div class="IPT_reunitBlock_4-64-0">
                                        <div class="IPT_inputWrapper_4-64-0">
                                            <div class="IPT_inputBlock_4-64-0">
                                                <div class="IPT_inputBlockCell_4-64-0">
                                                    <input data-testid="beast-core-input-htmlInput" placeholder="请输入图片名称" type="text" class="IPT_input_4-64-0" value="1" data-track-logtag="tagged">
                                                </div>
                                                <div class="IPT_suffixCell_4-64-0 IPT_prefixSuffixCell_4-64-0 IPT_pointerCell_4-64-0" data-testid="beast-core-input-suffix">
                                                    <div class="IPT_suffixWrapper_4-64-0 IPT_divide_4-64-0">
                                                        <div>
                                                            查询
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="BeastMaterialModal___reload___1LPuT">
                                刷新
                            </div>
                            <label class="CBX_outerWrapper_4-64-0 CBX_checkbox_4-64-0 CBX_medium_4-64-0" data-testid="beast-core-checkbox" data-checked="false" data-indeterminate="false" style="margin-left: 12px;">
                                <div class="CBX_squareInputWrapper_4-64-0" data-testid="beast-core-checkbox-checkIcon">
                                    <input mode="checkbox" class="CBX_input_4-64-0" type="checkbox" data-track-logtag="tagged">
                                    <div class="CBX_square_4-64-0 CBX_groupDisabled_4-64-0 CBX_hasCheckSquare_4-64-0">
                                        <i data-testid="beast-core-icon-check" class="ICN_outerWrapper_4-64-0 ICN_type-check_4-64-0  CBX_iconCheck_4-64-0">
                                        </i>
                                    </div>
                                </div>
                                <div class="CBX_textWrapper_4-64-0 CBX_prevCheckSquare_4-64-0">
                                    仅展示可用图片
                                </div>
                            </label>
                        </div>
                        <div class="BeastMaterialModal___upload-btn___X8rBK">
                            <button class="BTN_outerWrapper_4-64-0 BTN_gray_4-64-0 BTN_medium_4-64-0 BTN_outerWrapperBtn_4-64-0" type="button" data-testid="beast-core-button">
                                <i data-testid="beast-core-icon-upload" class="ICN_outerWrapper_4-64-0 ICN_type-upload_4-64-0 " style="font-size: 14px; margin-right: 8px;">
                                </i>
                                <span>
                                    本地上传
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="BeastMaterialModal___content-list___22L6F">
                        <div class="BeastMaterialModal___folder-list___2N-HN">
                            <div class="BeastMaterialModal___folder-list-container___XPr0E">
                                <div class="Tree_treeWrapper_4-64-0 Tree_small_4-64-0" data-testid="beast-core-tree">
                                    <div>
                                        <div class="Tree_treeNode_4-64-0 Tree_treeSelected_4-64-0 Tree_block_4-64-0 Tree_clickable_4-64-0" data-testid="beast-core-tree-treeNode" style="padding-left: 0px;">
                                            <span class="Tree_iconWrapper_4-64-0 Tree_pointerable_4-64-0">
                                                <i data-testid="beast-core-icon-caret-right" class="ICN_outerWrapper_4-64-0 ICN_type-caret-right_4-64-0  Tree_iconArrow_4-64-0 Tree_expand_4-64-0">
                                                </i>
                                            </span>
                                            <div class="Tree_nodeContentWrapper_4-64-0 Tree_treeSelected_4-64-0 Tree_block_4-64-0 Tree_clickable_4-64-0">
                                                <div class="Tree_labelWrapper_4-64-0">
                                                    全部文件
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="Tree_treeNode_4-64-0 Tree_block_4-64-0 Tree_clickable_4-64-0" data-testid="beast-core-tree-treeNode" style="padding-left: 16px;">
                                            <span class="Tree_iconWrapper_4-64-0 Tree_pointerable_4-64-0">
                                                <i data-testid="beast-core-icon-caret-right" class="ICN_outerWrapper_4-64-0 ICN_type-caret-right_4-64-0  Tree_iconArrow_4-64-0">
                                                </i>
                                            </span>
                                            <div class="Tree_nodeContentWrapper_4-64-0 Tree_block_4-64-0 Tree_clickable_4-64-0">
                                                <div class="Tree_labelWrapper_4-64-0">
                                                    1
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="BeastMaterialModal___content-right___ULxiI">
                            <div class="BeastMaterialModal___list___Zq5yT">
                                <div style="text-align: center; height: 100%; background: rgb(249, 249, 249); line-height: 340px;">
                                    该分组暂无可用的图片
                                </div>
                            </div>
                            <div class="BeastMaterialModal___content-bottom___1L3_G">
                                <div class="BeastMaterialModal___tip___1Kkn2">
                                    列表仅展示上传成功的图片
                                </div>
                                <div class="BeastMaterialModal___page___1uqix">
                                    <ul class="PGT_outerWrapper_4-64-0">
                                        <li class="PGT_totalText_4-64-0">
                                            共有 0 条
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection