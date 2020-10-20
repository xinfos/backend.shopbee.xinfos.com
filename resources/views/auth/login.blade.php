@extends('layouts.auth')

@section('auth_content')
<div class="col-lg-5">
    <div class="card">
        <div class="card-header pt-4 pb-4 text-center bg-primary">
            <a href="index.html">
                <span><img src="/assets/images/logo.png" alt="" height="60"></span>
            </a>
        </div>
        <div class="card-body p-4">
            <div class="form-group">
                <div class="alert alert-danger alert-login-err" role="alert" style="display:none;">
                    <i class="mdi mdi-alert-octagon-outline mr-1"></i><span class="login-err" style="font-size:12px;"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="mobile">账户</label>
                <input class="form-control" type="mobile" id="mobile" placeholder="邮箱 / 手机号">
            </div>
            <div class="form-group">
                <a href="/seller/forget" class="text-muted float-right"><small>忘记密码?</small></a>
                <label for="password">密码</label>
                <input class="form-control" type="password" id="password" placeholder="输入密码">
            </div>
            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                    <label class="custom-control-label" for="checkbox-signin">记住登录</label>
                </div>
            </div>
            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-login"> 登 录</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">如果您还没有账户，赶紧先注册一个? <a href="/seller/register" class="ml-1">立即注册</a></p>
        </div>
    </div>
</div>
<script type="text/javascript">
    const doLoginURL = "/seller/doLogin"
    $('.btn-login').on('click', function() {
        var data = {
            'mobile': $('#mobile').val(),
            'password': $('#password').val(),
            '_token': "{{ csrf_token() }}",
        }

        if (IsStringEmpty(data.mobile)) {
            $('.login-err').text("请输入账号!");
            $('.alert-login-err').css({
                'display': ''
            });
            return false;
        }

        if (IsStringEmpty(data.password)) {
            $('.login-err').text("请输入密码!");
            $('.alert-login-err').css({
                'display': ''
            });
            return false;
        }

        $.ajax({
            type: 'POST',
            url: doLoginURL,
            dataType: 'json',
            data: data,
            success: function(resp) {
                if (resp.code != 200) {
                    $('.login-err').text(resp.msg);
                    $('.alert-login-err').css({
                        'display': ''
                    });
                    return false;
                }
                window.location.href = "/shop/list";
            },
            error: function() {

            }
        });
    });

    function IsStringEmpty(v) {
        if (v == "" || v == null || v == undefined || !v || !$.trim(v)) {
            return true;
        }
        return false;
    }
</script>
@endsection