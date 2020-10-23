@extends('layouts.dashkit.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-10">
            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="header-title">店铺信息</h1>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="/shop/info" class="nav-link">基本信息</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link active">联系方式</a>
                                </li>
                                <li class="nav-item">
                                    <a href="account-billing.html" class="nav-link">主体信息</a>
                                </li>
                                <li class="nav-item">
                                    <a href="account-members.html" class="nav-link">品牌资质认证</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">跨境电商认证</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <form class="mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header-title">联系方式</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-5">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>入驻人邮箱：</label>
                                <div class="input-group input-group-merge ml-3 mb-3">
                                    <input type="text" maxlength="30" name="name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fe fe-mail"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>入驻人手机号：</label>
                                <small class="form-text text-muted ml-3">
                                    入驻人手机号即主账号登录手机号，如有更改需求，请直接登录主账号后在右上角账号管理处修改
                                </small>
                                <div class="input-group input-group-merge ml-3 mb-3">
                                    <input type="text" maxlength="30" name="name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fe fe-smartphone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>紧急联系人姓名：</label>
                                <small class="form-text text-muted ml-3">
                                    启用模板后，可在添加商品中使用
                                </small>
                                <div class="input-group input-group-merge ml-3 mb-3">
                                    <input type="text" maxlength="30" name="name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fe fe-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>紧急联系人手机：</label>
                                <small class="form-text text-muted ml-3">
                                    启用模板后，可在添加商品中使用
                                </small>
                                <div class="input-group input-group-merge ml-3 mb-3">
                                    <input type="text" maxlength="30" name="name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fe fe-smartphone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-footer mb-4"></div>
                </div>
                <div class="sf-push-footer">
                    <div class="sf-push-content">
                        <a href="javascript:void(0);" class="sf-btn sf-btn-primary sf-btn-create">保 存</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection