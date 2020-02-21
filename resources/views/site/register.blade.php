@extends('layouts.dashkit.auth')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/dashkit/libs/spop/dist/spop.min.css">
<div class="row align-items-center">
    <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
        <div class="text-center">
            <img src="/assets/images/site/happiness.svg" alt="..." class="img-fluid">
        </div>
    </div>
    <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5 card" style="border-radius:16px;">
        <h1 class="display-6 text-center mb-3" style="margin-top:55px;">账号注册</h1>
        <p class="text-muted text-center mb-4" style="font-size:12px;">登入后可以免费使用平台各项服务功能.</p>
        <div style="margin-bottom:35px;padding-left:10px;padding-right:10px;" class="sf-token" sf-token="{{ csrf_token() }}">
            <div class="form-group">
                <div class="input-group input-group-merge">
                    <input type="mobile" class="form-control form-control-prepended sf-input-mobile" maxlength="15" placeholder="平台登录使用的手机号" oninput="value=value.replace(/[^\d]/g,'')">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fe fe-smartphone"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge">
                    <input type="mobile" class="form-control form-control-prepended sf-input-smscode" placeholder="请填写6位短信验证码" maxlength="6" oninput="value=value.replace(/[^\d]/g,'')">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fe fe-message-square"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge">
                    <input type="password" class="form-control form-control-prepended sf-input-pwd" placeholder="8-15位字符，必须包含字符和数字">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fe fe-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge">
                    <input type="password" class="form-control form-control-prepended sf-input-pwd-confirm" placeholder="请再次输入密码">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fe fe-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn btn-block btn-primary mb-3 sf-btn-register">确认注册</button>
            <div class="text-center">
                <small class="text-muted text-center">
                    如果您已有账号了? <a href="/login">立即登录</a>.
                </small>
            </div>
        </div>
    </div>
</div>


<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/dashkit/libs/spop/dist/spop.min.js"></script>
<script src="/assets/dashkit/js/site/dist/register.js"></script>

@endsection