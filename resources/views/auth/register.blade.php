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
                <div class="alert alert-danger alert-register-err" role="alert" style="display:none;">
                    <i class="mdi mdi-alert-octagon-outline mr-1"></i><span class="register-err" style="font-size:12px;"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="username">账户名称</label>
                <input class="form-control" type="text" id="username" placeholder="名称不能大于16个字符，不允许有特殊符号" required="">
            </div>
            <div class="form-group">
                <label for="mobile">手机号</label>
                <input class="form-control" type="mobile" id="mobile" required="" placeholder="请输入合法的邮箱地址">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input class="form-control" type="password" required="" id="password" placeholder="请输入密码">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                    <label class="custom-control-label" for="checkbox-signup">请阅读 <a href="#" >平台条款和条件</a></label>
                </div>
            </div>
            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-register"> 注 册 </button>
            </div>
        </div> 
    </div>
    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">如果您已有账户? <a href="/seller/login" class="ml-1"><b>立即登录</b></a></p>
        </div> 
    </div>
</div>
<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    
    const doRegisterURL = "/seller/doRegister";

    $('.btn-register').on('click', function() {
        var data = {
            'username':$('#username').val(),
            'mobile': $('#mobile').val(),
            'password': $('#password').val(),
            '_token':"{{ csrf_token() }}",
        }

        if (IsStringEmpty(data.mobile)) {
            $('.register-err').text("请输入账号!");
            $('.alert-register-err').css({'display':''});
            return false;
        }

        if (IsStringEmpty(data.password)) {
            $('.register-err').text("请输入密码!");
            $('.alert-register-err').css({'display':''});
            return false;
        }
        
        $.ajax({
            type: 'POST',
            url: doRegisterURL,
            dataType: 'json',
            data: data,
            success:function(resp) {
                if (resp.code != 200) {
                    $('.register-err').text(resp.msg);
                    $('.alert-register-err').css({'display':''});
                    return false;
                }

                window.location.href="/seller/registerSuccess";
                
                console.log(resp);
            },
            error: function() {

            }
        });
    });

    function IsStringEmpty(v) {
        if(v == "" || v == null || v == undefined || !v || !$.trim(v)){
            return true;
        }
        return false;
    }
</script>
@endsection