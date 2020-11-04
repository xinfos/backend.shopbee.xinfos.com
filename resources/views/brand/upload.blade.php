@extends('layouts.dashkit.app')
@section('content')

<link rel="stylesheet" type="text/css" href="/assets/dashkit/libs/upload/dist/sf.upload.css">
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
        </div>
    </div>
</div>
<button type="button" class="sf-btn sf-btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    开始
</button>

<div class="modal fade show" id="exampleModalLong" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-card card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                        图片上传
                        <small class="text-muted">（图片要求：宽高比为1:1，宽高大于480px，单张图片小于3MB）</small>
                        <small class="text-muted"><a href="javascript:void(0);">示例图</a></small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="sf-upload-header">
                        <div class="sf-upload-tab">
                            <div><i class="fe fe-grid i-active"></i></div>
                            <div class="ml-2"><i class="fe fe-list"></i></div>
                        </div>
                        <div class="sf-upload-tab ml-4">
                            <div class="input-group">
                                <input type="text" class="sf-input-sm" placeholder="请输入图片名称" name="images">
                            </div>
                        </div>
                        <div class="sf-upload-tab ml-1">
                            <a class="sf-btn sf-btn-primary sf-upload-search-btn" href="javascript:void(0);">查询</a>
                        </div>
                        <div class="sf-upload-tab sf-upload-fresh">
                            <span class=""><a href="javascript:void(0);">刷新</a></span>
                        </div>
                        <div class="sf-upload-tab sf-upload-local">
                            <button class="sf-btn sf-btn-upload"><i class="fe fe-upload"></i> 本地上传</button>
                        </div>
                    </div>
                    <div class="sf-upload-body">
                        <div class="sf-upload-folder">
                            <div class="sf-upload-folder-list">
                                <div>
                                    <div class="tree-node tree-node-active">
                                        <div class="node-icon">
                                            <i class="fe fe-chevron-down"></i>
                                        </div>
                                        <div class="node-folder-name">
                                            全部文件
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tree-node tree-node-1">
                                        <div class="node-icon">
                                            <i class="fe fe-chevron-down"></i>
                                        </div>
                                        <div class="node-folder-name">
                                            1
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sf-upload-images">
                            <div class="sf-upload-attach-list">
                                <div class="none text-muted"><small>该分组暂无可用的图片</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="sf-btn sf-btn-primary">确认</button>
                <button type="button" class="sf-btn btn-secondary" data-dismiss="modal">取消</button>
            </div> -->
        </div>
    </div>
</div>


@endsection